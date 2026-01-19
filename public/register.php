<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';

$error = '';
csrf_validate();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';
    if ($password !== $confirm) {
        $error = 'As senhas não coincidem.';
    } else {
        $result = User::register($name, $email, $password);
        if ($result === true) {
            header('Location: login.php');
            exit;
        } else {
            $error = $result;
        }
    }
}
include __DIR__ . '/../templates/register.php';
