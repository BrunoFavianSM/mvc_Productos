<?php
//se conecta a la base de datos
class Product {
    private $db;
    //ejecuta primero
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=bdejemplo", "root", "");
    }


    public function getAllProducts() {
        //query: ejecuta consulta
        $datos_procesados = $this->db->query("select * from productos");
        return $datos_procesados->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insertarRegistroProducto($nombre, $precio){
        $insertarProducto = $this->db->prepare('INSERT INTO productos(nombre, precio) VALUES(?, ?)');
        return $insertarProducto->execute([$nombre, $precio]);
    }
}
