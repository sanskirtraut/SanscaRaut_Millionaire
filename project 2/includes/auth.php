<?php
session_start();

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data.php';

$usersFile = __DIR__ . '/../data/users.txt';

ensureSessionArray('scores', []);