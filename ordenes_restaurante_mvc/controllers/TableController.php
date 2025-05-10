<?php
require_once 'models/Table.php';

class TableController {
    private $model;

    public function __construct() {
        $this->model = new Table();
    }

    public function index() {
        $mesas = $this->model->getAll();
        require 'views/tables/index.php';
    }

    public function create() {
        require 'views/tables/create.php';
    }

    public function store() {
        $nombre = $_POST['nombre'];
        $this->model->create($nombre);
        header('Location: /Table/index');
    }

    public function edit() {
        $id = $_GET['id'];
        $mesa = $this->model->getAll(); // Obtener todas para validar el nombre
        require 'views/tables/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $this->model->update($id, $nombre);
        header('Location: /Table/index');
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: /Table/index');
    }
}
