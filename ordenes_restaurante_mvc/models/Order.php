<?php
require_once 'config/database.php';

class Order {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($fecha, $mesa_id, $total, $detalle) {
        // Insertar la orden
        $stmt = $this->conn->prepare("INSERT INTO orders (fecha, mesa_id, total, anulada) VALUES (?, ?, ?, 0)");
        $stmt->execute([$fecha, $mesa_id, $total]);
        $order_id = $this->conn->lastInsertId();

        // Insertar el detalle de la orden
        foreach ($detalle as $item) {
            $stmt = $this->conn->prepare("INSERT INTO order_details (order_id, dish_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
            $stmt->execute([$order_id, $item['dish_id'], $item['cantidad'], $item['precio_unitario']]);
        }

        return $order_id;
    }

    public function cancel($id) {
        // Cambiar el campo 'anulada' a true
        $stmt = $this->conn->prepare("UPDATE orders SET anulada = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAll() {
        // Obtener todas las órdenes
        $stmt = $this->conn->prepare("SELECT o.id, o.fecha, o.total, o.anulada, t.nombre AS mesa FROM orders o JOIN restaurant_tables t ON o.mesa_id = t.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        // Obtener una orden por ID
        $stmt = $this->conn->prepare("SELECT o.id, o.fecha, o.total, o.anulada, t.nombre AS mesa FROM orders o JOIN restaurant_tables t ON o.mesa_id = t.id WHERE o.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderDetails($order_id) {
        // Obtener el detalle de una orden
        $stmt = $this->conn->prepare("SELECT d.descripcion, od.cantidad, od.precio_unitario FROM order_details od JOIN dishes d ON od.dish_id = d.id WHERE od.order_id = ?");
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
