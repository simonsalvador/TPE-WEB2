<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/admin.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'products'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listarCategorias   ->         Product.Controller->showCategories();
//products            ->         Product.Controller->showProducts();
//listar items        ->         Admin.Controller->getProducts();
//agregar item         ->         Admin.Controller->addProducts();
//modificar item/:ID       ->         Admin.Controller->updateProducts();
//eliminar item/:ID         ->         Admin.Controller->deleteProducts();
//listar categorias      ->         Admin.Controller->getCategories();
//agregar categoria      ->         Admin.Controller->addCategories();
//modificar categoria/:ID    ->         Admin.Controller->updateCategories();
//eliminar categoria/:ID      ->         Admin.Controller->deleteCategories();           
//login               ->         Auth.Controller->showLogin();
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
    
    case 'admin':
        // if (isset($params[1])) {
        //     switch ($params[1]) {
                // case 'list':
                    $controller = new AdminController();
                    $controller->getProducts();
                    break;
                case 'add':
                    $controller = new AdminController();
                    $controller->addProducts();
                    break;
                case 'update':
                    $controller = new AdminController();
                    $controller->updateProducts($params[1]);
                    break;
                case 'delete':
                    $controller = new AdminController();
                    $controller->deleteProducts($params[1]);
                    break;
                case 'categories':
                    // if (isset($params[2])) {
                    //     switch ($params[2]) {
                    //         case 'list':
                                $controller = new AdminController();
                                $controller->getCategories();
                                break;
                            case 'add':
                                $controller = new AdminController();
                                $controller->addCategories();
                                break;
                            case 'update':
                                $controller = new AdminController();
                                $controller->updateCategories($params[2]);
                                break;
                            case 'delete':
                                $controller = new AdminController();
                                $controller->deleteCategories($params[2]);
                                break;
        //                     default:
        //                         echo "404 Page Not Found";
        //                         break;
        //                 }
        //             }
        //             break;
        //         default:
        //             echo "404 Page Not Found";
        //             break;
        //     }
        // }
        // break;
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
