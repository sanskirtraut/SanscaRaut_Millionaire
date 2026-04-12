<?php
require_once __DIR__ . '/includes/auth.php';

$username = '';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = (string)filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    $confirmPassword = (string)filter_input(INPUT_POST, 'confirm_password', FILTER_UNSAFE_RAW);

    if ($username === '' || $password === '' || $confirmPassword === '') {
        $error = 'All fields are required.';
    } elseif (strlen($username) < 3) {
        $error = 'Username must be at least 3 characters.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $users = loadUsers($usersFile);

        if (isset($users[$username])) {
            $error = 'That username already exists.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if (saveUser($usersFile, $username, $hashedPassword)) {
                $success = 'Registration successful. You can now log in.';
                $username = '';
            } else {
                $error = 'Unable to save user. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container center-card">
    <div class="card form-card">
        <h1>Register</h1>

        <?php if ($error !== ''): ?>
            <p class="message error"><?= e($error) ?></p>
        <?php endif; ?>

        <?php if ($success !== ''): ?>
            <p class="message success"><?= e($success) ?></p>
        <?php endif; ?>

        <form method="post" action="register.php" novalidate>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="<?= e($username) ?>">

            <label for="password">Password</label>
            <input id="password" name="password" type="password">

            <label for="confirm_password">Confirm Password</label>
            <input id="confirm_password" name="confirm_password" type="password">

            <button class="btn" type="submit">Create Account</button>
        </form>

        <p class="small-text">Already have an account? <a href="login.php">Login here</a></p>
        <p class="small-text"><a href="index.php">Back to Home</a></p>
    </div>
</div>
</body>
</html>