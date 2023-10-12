<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'products'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listarCategorias   ->         Product.Controller->showCategories();
//products    ->         Product.Controller->showProducts();
//login              ->         Auth.Controller->showLogin();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

$params = explode('/', $action);

switch ($params[0]) {
        // case 'listarCat':
        //     $controller = new ProductController();
        //     $controller->showCategories();
        //     break;
    case 'products':
        $controller = new ProductController();
        $controller->showProducts();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
