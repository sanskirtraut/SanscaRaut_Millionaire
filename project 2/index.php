<?php
require_once __DIR__ . '/includes/auth.php';

$lastUser = $_COOKIE['last_user'] ?? '';
$lastScore = $_COOKIE['last_score'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Millionaire Game</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container center-card">
    <div class="card">
        <h1>Who Wants to Be a Millionaire?</h1>
        <p class="subtitle">A PHP-powered game show project</p>

        <?php if (isset($_SESSION['user'])): ?>
            <p>You are logged in as <strong><?= e($_SESSION['user']) ?></strong>.</p>
            <div class="button-group">
                <a class="btn" href="game.php">Go to Game</a>
                <a class="btn secondary" href="leaderboard.php">Leaderboard</a>
                <a class="btn danger" href="logout.php">Logout</a>
            </div>
        <?php else: ?>
            <div class="button-group">
                <a class="btn" href="login.php">Login</a>
                <a class="btn secondary" href="register.php">Register</a>
                <a class="btn secondary" href="leaderboard.php">Leaderboard</a>
            </div>
        <?php endif; ?>

        <?php if ($lastUser !== ''): ?>
            <div class="info-box">
                <p>Last visitor: <strong><?= e($lastUser) ?></strong></p>
                <?php if ($lastScore !== ''): ?>
                    <p>Last saved score: <strong>$<?= e($lastScore) ?></strong></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>