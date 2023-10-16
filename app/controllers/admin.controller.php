<?php
require_once './app/models/admin.model.php';
require_once './app/views/admin.view.php';

class AdminController
{
    private $model;
    private $view;

    public function __construct()
    {
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

    function updateProducts($id) {
        // Obtén el producto que se va a modificar
        $product = $this->model->getProductById($id);

        // Verifica si el producto existe
        if (!$product) {
            // Producto no encontrado, muestra un mensaje de error o redirige a una página de error
            $this->view->showError("Producto no encontrado");
            return;
        }

        $this->view->showUpdate($product);

        // $this->model->updateProduct($id, $name, $category, $price);
        //  header('Location: ' . BASE_URL);
    }

    function deleteProducts($id)
    {
        $this->model->deleteProduct($id);
        header('Location: ' . BASE_URL);
    }
}
