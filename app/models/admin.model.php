<?php

class AdminModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_bodega;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todos los productos.
     */
    function getProduct()
    {
        $query = $this->db->prepare('SELECT * FROM bebidas');
        $query->execute();

        // $Product es un arreglo de bebidas
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    /**
     * Inserta producto en la base de datos
     */
    function insertProduct($name, $category, $price)
    {
        $query = $this->db->prepare('INSERT INTO bebidas (nombre, tipo, precio)  VALUES(?,?,?)');
        $query->execute([$name, $category, $price]);

        return $this->db->lastInsertId();
    }
    /**
     * modificar producto en la base de datos
     */
    function updateProduct($id, $newName, $newCategory, $newPrice,)
    {
        $query = $this->db->prepare('UPDATE bebidas SET nombre = ?, tipo = ?, precio = ? WHERE id = ?');
        $query->execute([$newName, $newCategory, $newPrice, $id]);
    }

    /**
     * eliminar producto en la base de datos
     */
    function deleteProduct($id)
    {
        $query = $this->db->prepare('DELETE FROM bebidas WHERE id = ?');
        $query->execute([$id]);
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
     * Inserta categoria en la base de datos
     */
    function insertCategory($nameCategory){
        $query = $this->db->prepare('INSERT INTO bebidas (tipo) VALUES (?)');
        $query->execute([$nameCategory]);

        return $this->db->lastInsertId();
    }

    /**
     * modificar categoria en la base de datos
     */
    function updateCategory($id, $newNameCategory)
    {
        $query = $this->db->prepare('UPDATE bebidas SET  tipo = ? WHERE id = ?');
        $query->execute([$newNameCategory, $id]);
    }


     /**
     * eliminar categoria en la base de datos
     */
    function deleteCategory($id)
    {
        $query = $this->db->prepare('DELETE tipo FROM bebidas WHERE id = ?');
        $query->execute([$id]);
    }
}
