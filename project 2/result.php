<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();

if (!isset($_SESSION['game_over']) || $_SESSION['game_over'] !== true) {
    redirect('game.php');
}

$username = $_SESSION['user'];
$score = (int)($_SESSION['score'] ?? 0);

addScoreToLeaderboard($username, $score);
setcookie('last_score', (string)$score, time() + 3600, '/');

$wonGame = $_SESSION['won_game'] ?? false;
$walkedAway = $_SESSION['walked_away'] ?? false;
$wrongAnswer = $_SESSION['wrong_answer'] ?? '';
$correctAnswer = $_SESSION['correct_answer'] ?? '';

unset(
    $_SESSION['game_over'],
    $_SESSION['won_game'],
    $_SESSION['walked_away'],
    $_SESSION['wrong_answer'],
    $_SESSION['correct_answer']
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Result</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container center-card">
    <div class="card">
        <?php if ($wonGame): ?>
            <h1>You Won the Game!</h1>
            <p class="message success">Amazing job, <?= e($username) ?>. You reached $1,000,000.</p>
        <?php elseif ($walkedAway): ?>
            <h1>You Walked Away</h1>
            <p class="message success">Smart move. You kept your winnings.</p>
        <?php else: ?>
            <h1>Game Over</h1>
            <p class="message error">That was not the correct answer.</p>
            <?php if ($wrongAnswer !== '' && $correctAnswer !== ''): ?>
                <p>You chose <strong><?= e($wrongAnswer) ?></strong>, but the correct answer was <strong><?= e($correctAnswer) ?></strong>.</p>
            <?php endif; ?>
        <?php endif; ?>

        <p class="money">Final Score: $<?= e($score) ?></p>

        <div class="button-group">
            <a class="btn" href="game.php">Play Again</a>
            <a class="btn secondary" href="leaderboard.php">View Leaderboard</a>
            <a class="btn danger" href="logout.php">Logout</a>
        </div>
    </div>
</div>
</body>
</html>