<?php

require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
/*
function showCategories() {
    $c1 = new stdClass();
    $c1->titulo = 'vinos';
    $c1->contenido = 'categoria completa de los vinos disponibles en la bodega';
    $c1->imagen = '';
    
    $c2 = new stdClass();
    $c2->titulo = 'cervezas';
    $c2->contenido = 'categoria completa de las cervezas disponibles en la bodega';
    $c2->imagen = '';
    
    $c3 = new stdClass();
    $c3->titulo = 'whisky';
    $c3->contenido = 'categoria completa de los whisky disponibles en la bodega';
    $c3->imagen = '';
    
    $c4 = new stdClass();
    $c4->titulo = 'gin';
    $c4->contenido = 'categoria completa de los gin disponibles en la bodega';
    $c4->imagen = '';

    $c5 = new stdClass();
    $c5->titulo = "vodka";
    $c5->contenido = "categoria completa de los vodka disponibles en la bodega";
    $c5->imagen = "";
    
    $c6 = new stdClass();
    $c6->titulo = "espumantes";
    $c6->contenido = "categoria completa de los espumantes disponibles en la bodega";
    $c6->imagen = "";

    $categoria = [$c1, $c2, $c3, $c4, $c5,  $c6];
    return $categoria;
}

/**
 * Obtiene la noticia segun un id pasado como parametro
 */
/*function getcategoriaById($id) {
    $categoria = getcategoria();
    return $categoria[$id];
}
*/

class ProductController{
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        //AuthHelper::verify();

        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function showProducts() {
        // obtengo tareas del controlador
        $products = $this->model->getProduct();
        
        // muestro las tareas desde la vista
        $this->view->showProduct($products);
    }
}
?>


