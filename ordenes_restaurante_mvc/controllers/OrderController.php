<?php
require_once 'models/Order.php';
require_once 'models/Dish.php';
require_once 'models/Table.php';

class OrderController {
    private $model;
    private $dishModel;
    private $tableModel;

    public function __construct() {
        $this->model = new Order();
        $this->dishModel = new Dish();
        $this->tableModel = new Table();
    }

    public function create() {
        $platos = $this->dishModel->getAll();
        $mesas = $this->tableModel->getAll();
        require 'views/orders/create.php';
    }

    public function store() {
        $fecha = $_POST['fecha'];
        $mesa_id = $_POST['mesa_id'];
        $detalle = json_decode($_POST['detalle'], true); // Detalle de los platos
        $total = 0;

        // Calcular el total
        foreach ($detalle as $item) {
            $total += $item['cantidad'] * $item['precio_unitario'];
        }

        // Crear la orden
        $this->model->create($fecha, $mesa_id, $total, $detalle);
        header('Location: /Order/index');
    }

    public function index() {
        $ordenes = $this->model->getAll();
        require 'views/orders/index.php';
    }

    public function cancel() {
        $id = $_GET['id'];
        $this->model->cancel($id);
        header('Location: /Order/index');
    }

    public function details() {
        $id = $_GET['id'];
        $orden = $this->model->getById($id);
        $detalles = $this->model->getOrderDetails($id);
        require 'views/orders/details.php';
    }
}
