<?php
require_once './app/controllers/product.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listarItems'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listarCategorias   ->         Product.Controller->showCategories();
//listarProductos    ->         Product.Controller->showProducts();

$params = explode('/', $action);

switch ($params[0]) {
    // case 'listarCat':
    //     $controller = new ProductController();
    //     $controller->showCategories();
    //     break;
    case 'listarItems':
        $controller = new ProductController();
        $controller->showProducts();
        break;
    }
?>