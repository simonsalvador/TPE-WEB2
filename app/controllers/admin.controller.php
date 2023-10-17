<?php
require_once './app/models/admin.model.php';
require_once './app/views/admin.view.php';

class AdminController
{
    private $model;
    private $view;

    public function __construct()
    {
        //verifico logueado
         AuthHelper::verify();

        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    public function getProducts()
    {
        // obtengo productos
        $products = $this->model->getProduct();

        // muestro los productos desde la vista
        $this->view->showProduct($products);
    }

    public function addProducts()
    {

        // obtengo los datos del usuario
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        // validaciones
        if (empty($name) || empty($category)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertProduct($name, $category, $price);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }
    
    //modificacion de productos
    public function updateProducts($id) {
         // obtengo los nuevos datos del usuario
         $newName = $_POST['newName'];
         $newCategory = $_POST['newCategory'];
         $newPrice = $_POST['newPrice'];

        // validaciones
        if (empty($newName) || empty($newCategory)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
 
        $this->model->updateProduct($id, $newName, $newCategory, $newPrice);
        header('Location: ' . BASE_URL);
    
    }

    function deleteProducts($id)
    {
        $this->model->deleteProduct($id);
        header('Location: ' . BASE_URL);
    }

    //listar categorias
    public function getCategories()
    {
        // obtengo productos
        $categories = $this->model->getCategory();

        // muestro los productos desde la vista
        $this->view->showProduct($categories);
    }



    // public function addCategories(){
    //      // obtengo los datos del usuario
    //      $nameCategory = $_POST['nameCategory'];

    //     if (empty($nameCategory)) {
    //         $this->view->showError("Debe completar todos los campos");
    //         return;
    //     }

    //     $id = $this->model->insertCategory($nameCategory);
    //     if ($id) {
    //         header('Location: ' . BASE_URL);
    //     } else {
    //         $this->view->showError("Error al insertar la tarea");
    //     }
         
    // }
}
