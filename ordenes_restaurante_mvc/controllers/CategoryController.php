<?php
require_once 'models/Category.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new Category();
    }

    public function index() {
        $categorias = $this->model->getAll();
        require 'views/categories/index.php';
    }

    public function create() {
        require 'views/categories/create.php';
    }

    public function store() {
        $nombre = $_POST['nombre'];
        $this->model->create($nombre);
        header('Location: /Category/index');
    }

    public function edit() {
        $id = $_GET['id'];
        $categoria = $this->model->getAll(); // Obtener todas para validar el nombre
        require 'views/categories/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $this->model->update($id, $nombre);
        header('Location: /Category/index');
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: /Category/index');
    }
}
