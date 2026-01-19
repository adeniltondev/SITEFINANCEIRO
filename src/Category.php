<?php
// Modelo para categorias
class Category {
    public static function add($userId, $name, $type) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO categories (user_id, name, type) VALUES (?, ?, ?)');
        $stmt->execute([$userId, $name, $type]);
    }
    public static function update($id, $userId, $name, $type) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('UPDATE categories SET name=?, type=? WHERE id=? AND user_id=?');
        $stmt->execute([$name, $type, $id, $userId]);
    }
    public static function delete($id, $userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM categories WHERE id=? AND user_id=?');
        $stmt->execute([$id, $userId]);
    }
    public static function getAll($userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE user_id=? ORDER BY type, name');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    public static function getById($id, $userId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE id=? AND user_id=?');
        $stmt->execute([$id, $userId]);
        return $stmt->fetch();
    }
}
