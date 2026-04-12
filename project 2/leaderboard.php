<?php
require_once __DIR__ . '/includes/auth.php';

$scores = $_SESSION['scores'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="top-bar">
        <span>Millionaire Leaderboard</span>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="game.php">Game</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="card">
        <h1>Top Players</h1>

        <?php if (empty($scores)): ?>
            <p class="message">No scores yet — be the first to play!</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($scores as $index => $entry): ?>
                        <tr>
                            <td><?= e($index + 1) ?></td>
                            <td><?= e($entry['username']) ?></td>
                            <td>$<?= e($entry['score']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
</body>
</html>