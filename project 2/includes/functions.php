<?php
function e($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $location): void
{
    header("Location: $location");
    exit();
}

function ensureSessionArray(string $key, array $default = []): void
{
    if (!isset($_SESSION[$key]) || !is_array($_SESSION[$key])) {
        $_SESSION[$key] = $default;
    }
}

function loadUsers(string $filePath): array
{
    if (!file_exists($filePath)) {
        return [];
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $users = [];

    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if (count($parts) === 2) {
            $users[$parts[0]] = $parts[1];
        }
    }

    return $users;
}

function saveUser(string $filePath, string $username, string $hashedPassword): bool
{
    $line = $username . '|' . $hashedPassword . PHP_EOL;
    return file_put_contents($filePath, $line, FILE_APPEND | LOCK_EX) !== false;
}

function getDifficultyForLevel(int $level): string
{
    if ($level <= 5) {
        return 'easy';
    }
    if ($level <= 10) {
        return 'medium';
    }
    return 'hard';
}

function getQuestionForLevel(array $questionBank, int $level): ?array
{
    $difficulty = getDifficultyForLevel($level);

    if (!isset($questionBank[$difficulty])) {
        return null;
    }

    $usedQuestions = $_SESSION['used_questions'][$difficulty] ?? [];
    $available = [];

    foreach ($questionBank[$difficulty] as $index => $question) {
        if (!in_array($index, $usedQuestions, true)) {
            $available[$index] = $question;
        }
    }

    if (empty($available)) {
        return null;
    }

    $randomIndex = array_rand($available);
    $_SESSION['used_questions'][$difficulty][] = $randomIndex;

    return $available[$randomIndex];
}

function initializeGame(array $questionBank): void
{
    $_SESSION['level'] = 1;
    $_SESSION['score'] = 0;
    $_SESSION['game_over'] = false;
    $_SESSION['won_game'] = false;
    $_SESSION['used_questions'] = [
        'easy' => [],
        'medium' => [],
        'hard' => []
    ];
    $_SESSION['lifelines'] = [
        '5050' => false,
        'hint' => false,
        'skip' => false
    ];

    $_SESSION['current_question'] = getQuestionForLevel($questionBank, 1);
    $_SESSION['answer_feedback'] = '';
}

function requireLogin(): void
{
    if (!isset($_SESSION['user'])) {
        $_SESSION['flash_error'] = 'Please log in to continue.';
        redirect('login.php');
    }
}

function addScoreToLeaderboard(string $username, int $score): void
{
    ensureSessionArray('scores', []);

    $_SESSION['scores'][] = [
        'username' => $username,
        'score' => $score
    ];

    usort($_SESSION['scores'], function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    $_SESSION['scores'] = array_slice($_SESSION['scores'], 0, 10);
}

function getSafeMoney(int $level, array $moneyLadder): int
{
    if ($level >= 10) {
        return $moneyLadder[10];
    }
    if ($level >= 5) {
        return $moneyLadder[5];
    }
    return 0;
}

function getFiftyFiftyChoices(array $question): array
{
    $correct = $question['answer'];
    $wrongKeys = [];

    foreach ($question['choices'] as $key => $choiceText) {
        if ($key !== $correct) {
            $wrongKeys[] = $key;
        }
    }

    shuffle($wrongKeys);
    $keepWrong = $wrongKeys[0];

    return [
        $correct => $question['choices'][$correct],
        $keepWrong => $question['choices'][$keepWrong]
    ];
}
?>