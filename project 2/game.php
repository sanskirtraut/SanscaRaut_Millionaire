<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_game'])) {
    initializeGame($questionBank);
    redirect('question.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Hub</title>
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

    <div class="card">
        <h1>Welcome to Millionaire</h1>
        <p>Answer questions correctly, use your lifelines wisely, and climb the money ladder.</p>

        <div class="info-grid">
            <div class="info-box">
                <h3>Rules</h3>
                <p>Questions 1-5 are easy, 6-10 are medium, and 11–15 are hard.</p>
            </div>
            <div class="info-box">
                <h3>Lifelines</h3>
                <p>50:50, Hint, and Skip can each be used once per game.</p>
            </div>
            <div class="info-box">
                <h3>Scoring</h3>
                <p>Your score is based on the highest level reached safely.</p>
            </div>
        </div>

        <form method="post" action="game.php">
            <button class="btn" type="submit" name="start_game" value="1">Start New Game</button>
        </form>
    </div>
</div>
</body>
</html>