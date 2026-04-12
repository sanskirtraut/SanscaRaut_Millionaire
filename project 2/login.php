<?php
require_once __DIR__ . '/includes/auth.php';

$username = '';
$error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = (string)filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } else {
        $users = loadUsers($usersFile);

        if (!isset($users[$username]) || !password_verify($password, $users[$username])) {
            $error = 'Invalid username or password.';
        } else {
            $_SESSION['user'] = $username;
            setcookie('last_user', $username, time() + 3600, '/');
            redirect('game.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container center-card">
    <div class="card form-card">
        <h1>Login</h1>

        <?php if ($error !== ''): ?>
            <p class="message error"><?= e($error) ?></p>
        <?php endif; ?>

        <form method="post" action="login.php" novalidate>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="<?= e($username) ?>">

            <label for="password">Password</label>
            <input id="password" name="password" type="password">

            <button class="btn" type="submit">Login</button>
        </form>

        <p class="small-text">Need an account? <a href="register.php">Register here</a></p>
        <p class="small-text"><a href="index.php">Back to Home</a></p>
    </div>
</div>
</body>
</html>