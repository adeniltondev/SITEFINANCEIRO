<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/Category.php';

if (!User::isLogged()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Excluir categoria se solicitado
if (isset($_GET['delete'])) {
    $deleteId = (int)$_GET['delete'];
    Category::delete($deleteId, $userId);
    header('Location: categories.php');
    exit;
}

$categories = Category::getAll($userId);

include __DIR__ . '/../templates/categories.php';
