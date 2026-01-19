<?php
// Listagem de receitas ou despesas
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/Transaction.php';

if (!User::isLogged()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$type = $_GET['type'] ?? 'receita';

// Excluir transação se solicitado
if (isset($_GET['delete'])) {
    $deleteId = (int)$_GET['delete'];
    Transaction::delete($deleteId, $userId);
    header('Location: transactions.php?type=' . $type);
    exit;
}

$transactions = Transaction::getAll($userId);

include __DIR__ . '/../templates/transactions.php';
