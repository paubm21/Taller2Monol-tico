<?php
require_once 'models/Report.php';

class ReportController {
    private $model;

    public function __construct() {
        $this->model = new Report();
    }

    public function orders() {
        // Mostrar formulario para ingresar fechas
        require 'views/reports/orders_report.php';
    }

    public function generateOrdersReport() {
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];

        // Obtener el reporte de órdenes no anuladas
        $report = $this->model->getOrdersReport($fecha_inicio, $fecha_fin);
        require 'views/reports/orders_report_result.php';
    }

    public function cancelled() {
        // Mostrar formulario para ingresar fechas
        require 'views/reports/cancelled_orders_report.php';
    }

    public function generateCancelledReport() {
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];

        // Obtener el reporte de órdenes anuladas
        $report = $this->model->getCancelledOrdersReport($fecha_inicio, $fecha_fin);
        require 'views/reports/cancelled_orders_report_result.php';
    }
}
