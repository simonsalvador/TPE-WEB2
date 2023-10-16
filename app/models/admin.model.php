<?php

class AdminModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_bodega;charset=utf8', 'root', '');
    }

     /**
     * Obtiene y devuelve de la base de datos todos los productos.
     */
    function getProduct() {
        $query = $this->db->prepare('SELECT * FROM bebidas');
        $query->execute();

        // $Product es un arreglo de bebidas
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    /**
     * Inserta producto en la base de datos
     */
    function insertProduct($name, $category, $price) {
        $query = $this->db->prepare('INSERT INTO bebidas (nombre, tipo, precio)  VALUES(?,?,?)');
        $query->execute([$name, $category, $price]);

        return $this->db->lastInsertId();
    }
    /**
     * modificar producto en la base de datos
     */

    // Obtener un producto por su ID
    public function getProductById($id) {
        $query = $this->db->prepare('SELECT * FROM bebidas WHERE id = ?');
        $query->execute([$id]);

        $product= $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    // function updateProduct($id, $name, $category, $price) {    
    //     $query = $this->db->prepare('UPDATE bebidas SET (nombre, tipo, precio) VALUES(?,?,?) WHERE id = ?');
    //     $query->execute([$name, $category, $price, $id]);
    // }
    /**
     * eliminar producto en la base de datos
     */
    function deleteProduct($id) {
        $query = $this->db->prepare('DELETE FROM bebidas WHERE id = ?');
        $query->execute([$id]);
    }
}