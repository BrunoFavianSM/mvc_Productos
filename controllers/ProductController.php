<?php
require 'models/product.php';
class ProductController {
    private $modelo;

    public function __construct(){
        $this->modelo = new Product();
    }

    public function index() {
        $products = $this->modelo->getAllProducts();
        require 'views/product_view.php';
    }

    public function crearProducto(){
        header('Content-Type: application/json');
        try{
            $nombre = $_POST['txt_producto'];//cuando usamos js(ajax) trabaja con el id de los controles
            $precio = $_POST['txt_precio'];
            $resultado = $this->modelo->insertarRegistroProducto($nombre, $precio);
            echo json_encode(['success' => $resultado]);
        }catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
