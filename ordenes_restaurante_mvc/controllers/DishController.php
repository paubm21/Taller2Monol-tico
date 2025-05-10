<?php
require_once 'models/Dish.php';

class PlatoController {
    private $model;

    public function __construct() {
        $this->model = new Dish();
    }

    public function index() {
        $platos = $this->model->getAll();
        require 'views/platos/index.php';
    }

    public function create() {
        $categorias = $this->model->getCategories();
        require 'views/platos/create.php';
    }

    public function store() {
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['category_id'];
        $this->model->create($descripcion, $precio, $categoria);
        header('Location: /Plato/index');
    }

    public function edit() {
        $id = $_GET['id'];
        $plato = $this->model->getById($id);
        require 'views/platos/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $this->model->update($id, $descripcion, $precio);
        header('Location: /Plato/index');
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: /Plato/index');
    }
}
