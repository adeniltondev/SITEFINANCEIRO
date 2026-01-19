<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/Category.php';

if (!User::isLogged()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$editing = false;
$id = $_GET['id'] ?? null;

csrf_validate();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    if ($id) {
        Category::update($id, $userId, $name, $type);
    } else {
        Category::add($userId, $name, $type);
    }
    header('Location: categories.php');
    exit;
}

$category = null;
if ($id) {
    $category = Category::getById($id, $userId);
    $editing = true;
}

include __DIR__ . '/../templates/category_form.php';
