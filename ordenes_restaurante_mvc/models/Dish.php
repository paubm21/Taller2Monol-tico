<?php
require_once 'config/database.php';

class Dish {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("
            SELECT d.id, d.descripcion, d.precio, c.nombre AS categoria 
            FROM dishes d 
            JOIN categories c ON d.category_id = c.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM dishes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($descripcion, $precio, $category_id) {
        $stmt = $this->conn->prepare("INSERT INTO dishes (descripcion, precio, category_id) VALUES (?, ?, ?)");
        return $stmt->execute([$descripcion, $precio, $category_id]);
    }

    public function update($id, $descripcion, $precio) {
        $stmt = $this->conn->prepare("UPDATE dishes SET descripcion = ?, precio = ? WHERE id = ?");
        return $stmt->execute([$descripcion, $precio, $id]);
    }

    public function delete($id) {
        // Verifica si el plato está en uso
        $check = $this->conn->prepare("SELECT COUNT(*) FROM order_details WHERE dish_id = ?");
        $check->execute([$id]);
        if ($check->fetchColumn() > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("DELETE FROM dishes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
