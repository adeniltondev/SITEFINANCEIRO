// Entry point for the application
require_once __DIR__ . '/../src/bootstrap.php';

<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';

if (!User::isLogged()) {
	header('Location: login.php');
	exit;
}

$userName = $_SESSION['user_name'];

// Dados fictícios para exibição inicial
$saldo = 0.00;
$receitas = 0.00;
$despesas = 0.00;

include __DIR__ . '/../templates/dashboard.php';
