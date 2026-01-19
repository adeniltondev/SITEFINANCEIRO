<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';

$error = '';
csrf_validate();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (User::login($email, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $error = 'E-mail ou senha inválidos.';
    }
}
include __DIR__ . '/../templates/login.php';
