<?php

class ProductModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_bodega;charset=utf8', 'root', '');
    }

     /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getProduct() {
        $query = $this->db->prepare('SELECT * FROM bebidas');
        $query->execute();

        // $Product es un arreglo de bebidas
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
}