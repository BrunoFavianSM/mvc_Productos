<?php
//redirecciona
require 'controllers/ProductController.php';
//Instancia llama a ProductController en ProductController.php
$controller = new ProductController();

$accion = $_GET['action'] ?? 'index';


switch($accion){
    case 'crear':
        $controller->crearProducto();
        break;
    default:
    $controller->index();
}
