<?php
$url = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($url, '/');
$url = explode('/', $url);

$controller = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
$method = isset($url[1]) ? $url[1] : 'index';

$controllerPath = '../controllers/' . $controller . '.php';

if(file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerInstance = new $controller();
    if(method_exists($controllerInstance, $method)) {
        $controllerInstance->$method();
    } else {
        echo "Método no encontrado.";
    }
} else {
    echo "Controlador no encontrado.";
}
