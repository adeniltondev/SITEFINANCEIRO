<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
User::logout();
header('Location: login.php');
exit;
