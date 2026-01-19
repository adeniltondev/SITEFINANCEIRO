<?php
// Formulário para adicionar/editar transação
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/Transaction.php';

if (!User::isLogged()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$type = $_GET['type'] ?? 'receita';
$editing = false;
$id = $_GET['id'] ?? null;

// Buscar categorias do tipo
$pdo = Database::getConnection();
$stmt = $pdo->prepare('SELECT id, name FROM categories WHERE user_id=? AND type=? ORDER BY name');
$stmt->execute([$userId, $type]);
$categories = $stmt->fetchAll();

csrf_validate();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId = $_POST['category_id'];
    $value = $_POST['value'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    if ($id) {
        Transaction::update($id, $userId, $categoryId, $type, $value, $description, $date);
    } else {
        Transaction::add($userId, $categoryId, $type, $value, $description, $date);
    }
    header('Location: transactions.php?type=' . $type);
    exit;
}

$transaction = null;
if ($id) {
    $transaction = Transaction::getById($id, $userId);
    $editing = true;
}

include __DIR__ . '/../templates/transaction_form.php';
