<?php
// Modelo para transações (receitas/despesas)
class Transaction {
    public static function add($userId, $categoryId, $type, $value, $description, $date) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO transactions (user_id, category_id, type, value, description, date) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$userId, $categoryId, $type, $value, $description, $date]);
    }
    public static function update($id, $userId, $categoryId, $type, $value, $description, $date) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('UPDATE transactions SET category_id=?, type=?, value=?, description=?, date=? WHERE id=? AND user_id=?');
        $stmt->execute([$categoryId, $type, $value, $description, $date, $id, $userId]);
    }
    public static function delete($id, $userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM transactions WHERE id=? AND user_id=?');
        $stmt->execute([$id, $userId]);
    }
    public static function getAll($userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT t.*, c.name as category FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id=? ORDER BY t.date DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    public static function getById($id, $userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM transactions WHERE id=? AND user_id=?');
        $stmt->execute([$id, $userId]);
        return $stmt->fetch();
    }
}
