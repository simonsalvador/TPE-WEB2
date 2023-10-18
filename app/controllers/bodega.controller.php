<?php

require_once './app/models/bodega.model.php';
require_once './app/views/bodega.view.php';

class BodegaController
{
    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new BodegaModel();
        $this->view = new BodegaView();
    }

    //listar categorias
    public function getCategories()
    {
        // obtengo productos
        $categories = $this->model->getCategory();

        // muestro los productos desde la vista
        $this->view->showCategory($categories);
    }

    public function listProducts()
    {
        // obtengo los nuevos datos del usuario
        $categoryId = $_POST['categoryID'];

        // validaciones
        if (empty($categoryId)) {
            $this->view->showError("Debe elegir una categoria");
            return;
        }

        $products = $this->model->getProductsByCategory($categoryId);
        // Muestra los productos desde la vista.
        $this->view->showProduct($products);
    }
}
