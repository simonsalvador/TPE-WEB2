<?php
require_once './app/models/admin.model.php';
require_once './app/views/adminCat.view.php';

class AdminCatController
{
    private $model;
    private $view;

    public function __construct()
    {
        //verifico logueado
        AuthHelper::verify();
        
        $this->model = new AdminModel();
        $this->view = new AdminCatView();
    }

//listar categorias
    public function getCategories()
    {
        // obtengo productos
        $categories = $this->model->getCategory();

        // muestro los productos desde la vista
        $this->view->showCategory($categories);
    }



    public function addCategories(){
         // obtengo los datos del usuario
         $nameCategory = $_POST['nameCategory'];

        if (empty($nameCategory)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertCategory($nameCategory);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
         
    }


     //modificacion de categoria
     public function updateCategories($id) {
        // obtengo los nuevos datos del usuario
        $newNameCategory = $_POST['newNameCategory'];

       // validaciones
       if (empty($newNameCategory)) {
           $this->view->showError("Debe completar todos los campos");
           return;
       }

       $this->model->updateCategory($id, $newNameCategory);
       header('Location: ' . BASE_URL);
   
   }

    function deleteCategories($id)
    {
        $this->model->deleteCategory($id);
        header('Location: ' . BASE_URL);
    }
}