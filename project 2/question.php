<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();

if (
    !isset($_SESSION['level'], $_SESSION['score']) ||
    !isset($_SESSION['current_question']) ||
    !is_array($_SESSION['current_question'])
) {
    redirect('game.php');
}

$currentQuestion = $_SESSION['current_question'];
$feedback = '';
$error = '';
$displayChoices = $currentQuestion['choices'];

if (isset($_SESSION['reduced_choices']) && is_array($_SESSION['reduced_choices'])) {
    $displayChoices = $_SESSION['reduced_choices'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['use_lifeline'])) {
        $lifeline = (string) filter_input(INPUT_POST, 'use_lifeline', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!isset($_SESSION['lifelines'][$lifeline])) {
            $error = 'Invalid lifeline.';
        } elseif ($_SESSION['lifelines'][$lifeline] === true) {
            $error = 'That lifeline has already been used.';
        } else {
            if ($lifeline === '5050') {
                $_SESSION['lifelines']['5050'] = true;
                $_SESSION['reduced_choices'] = getFiftyFiftyChoices($currentQuestion);
            } elseif ($lifeline === 'hint') {
                $_SESSION['lifelines']['hint'] = true;
                $feedback = 'Hint: ' . $currentQuestion['hint'];
            } elseif ($lifeline === 'skip') {
                $_SESSION['lifelines']['skip'] = true;
                $_SESSION['level']++;

                if ($_SESSION['level'] > 15) {
                    $_SESSION['won_game'] = true;
                    $_SESSION['game_over'] = true;
                    $_SESSION['score'] = $moneyLadder[15];
                    redirect('result.php');
                }

                $_SESSION['score'] = $moneyLadder[$_SESSION['level'] - 1];

                $nextQuestion = getQuestionForLevel($questionBank, $_SESSION['level']);

                if ($nextQuestion === null) {
                    $_SESSION['won_game'] = true;
                    $_SESSION['game_over'] = true;
                    redirect('result.php');
                }

                $_SESSION['current_question'] = $nextQuestion;
                unset($_SESSION['reduced_choices']);
                redirect('question.php');
            }
        }

        $displayChoices = $_SESSION['reduced_choices'] ?? $displayChoices;
    }

    if (isset($_POST['submit_answer'])) {
        $selected = (string) filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($selected === '') {
            $error = 'Please select an answer before submitting.';
        } else {
            $correctAnswer = $currentQuestion['answer'];

            if ($selected === $correctAnswer) {
                $_SESSION['score'] = $moneyLadder[$_SESSION['level']];

                if ($_SESSION['level'] >= 15) {
                    $_SESSION['won_game'] = true;
                    $_SESSION['game_over'] = true;
                    redirect('result.php');
                }

                $_SESSION['level']++;
                $nextQuestion = getQuestionForLevel($questionBank, $_SESSION['level']);

                if ($nextQuestion === null) {
                    $_SESSION['won_game'] = true;
                    $_SESSION['game_over'] = true;
                    redirect('result.php');
                }

                $_SESSION['current_question'] = $nextQuestion;
                unset($_SESSION['reduced_choices']);
                redirect('question.php');
            } else {
                $safeMoney = getSafeMoney($_SESSION['level'] - 1, $moneyLadder);
                $_SESSION['score'] = $safeMoney;
                $_SESSION['game_over'] = true;
                $_SESSION['won_game'] = false;
                $_SESSION['wrong_answer'] = $selected;
                $_SESSION['correct_answer'] = $correctAnswer;
                redirect('result.php');
            }
        }
    }

    if (isset($_POST['walk_away'])) {
        $_SESSION['game_over'] = true;
        $_SESSION['won_game'] = false;
        $_SESSION['walked_away'] = true;
        redirect('result.php');
    }
}

$currentQuestion = $_SESSION['current_question'];
$displayChoices = $_SESSION['reduced_choices'] ?? $currentQuestion['choices'];
$level = $_SESSION['level'];
$score = $_SESSION['score'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question <?= e($level) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="top-bar">
        <span>Player: <strong><?= e($_SESSION['user']) ?></strong></span>
        <nav>
            <a href="leaderboard.php">Leaderboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <div class="layout">
        <div class="card main-panel">
            <p class="level-badge">Level <?= e($level) ?></p>
            <h2><?= e($currentQuestion['question']) ?></h2>

            <?php if ($feedback !== ''): ?>
                <p class="message success"><?= e($feedback) ?></p>
            <?php endif; ?>

            <?php if ($error !== ''): ?>
                <p class="message error"><?= e($error) ?></p>
            <?php endif; ?>

            <form method="post" action="question.php">
                <div class="answers">
                    <?php foreach ($displayChoices as $key => $choiceText): ?>
                        <label class="answer-option">
                            <input type="radio" name="answer" value="<?= e($key) ?>">
                            <span><strong><?= e($key) ?>:</strong> <?= e($choiceText) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="button-group">
                    <button class="btn" type="submit" name="submit_answer" value="1">Submit Answer</button>
                    <button class="btn secondary" type="submit" name="walk_away" value="1">Walk Away</button>
                </div>
            </form>

            <div class="lifeline-row">
                <form method="post" action="question.php">
                    <button class="btn small <?= $_SESSION['lifelines']['5050'] ? 'disabled' : '' ?>" type="submit" name="use_lifeline" value="5050" <?= $_SESSION['lifelines']['5050'] ? 'disabled' : '' ?>>
                        50:50
                    </button>
                </form>

                <form method="post" action="question.php">
                    <button class="btn small <?= $_SESSION['lifelines']['hint'] ? 'disabled' : '' ?>" type="submit" name="use_lifeline" value="hint" <?= $_SESSION['lifelines']['hint'] ? 'disabled' : '' ?>>
                        Hint
                    </button>
                </form>

                <form method="post" action="question.php">
                    <button class="btn small <?= $_SESSION['lifelines']['skip'] ? 'disabled' : '' ?>" type="submit" name="use_lifeline" value="skip" <?= $_SESSION['lifelines']['skip'] ? 'disabled' : '' ?>>
                        Skip
                    </button>
                </form>
            </div>
        </div>

        <div class="card side-panel">
            <h3>Current Score</h3>
            <p class="money">$<?= e($score) ?></p>

            <h3>Money Ladder</h3>
            <ol class="ladder">
                <?php for ($i = 15; $i >= 1; $i--): ?>
                    <li class="<?= $i === $level ? 'active' : '' ?>">
                        <?= $i ?> — $<?= e($moneyLadder[$i]) ?>
                    </li>
                <?php endfor; ?>
            </ol>
        </div>
    </div>
</div>
</body>
</html>
