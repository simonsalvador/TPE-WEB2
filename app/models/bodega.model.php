<?php

class BodegaModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_bodega;charset=utf8', 'root', '');
    }
 

    //obtengo categorias de la base de datos
    function getCategory()
    {
        $query = $this->db->prepare('SELECT id, tipo FROM bebidas');
        $query->execute();

        // $Product es un arreglo de bebidas
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }
    
    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getProduct($tipo = null)
    {
        if ($tipo !== null) {
            $query = $this->db->prepare('SELECT * FROM bebidas WHERE tipo = ?');
            $query->execute([$tipo]);
        } else {
            $query = $this->db->prepare('SELECT * FROM bebidas');
            $query->execute();
        }

        // $Product es un arreglo de bebidas
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

   
}
