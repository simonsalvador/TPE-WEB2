<?php
require_once './app/controllers/bodega.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/admin.controller.php';
require_once './app/controllers/adminCat.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'products'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}



$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new BodegaController();
        if (isset($params[1])) {
            if ($params[1] === 'add') {
                $controller->addProducts();
            } else if ($params[1] === 'list') {
                $controller->listProducts($params[2]);
            } else if ($params[1] === 'delete') {
                $controller->deleteProducts($params[2]);
            }
        } else {
            $controller->getCategories();
        }
        break;
        case 'products':
            $controller = new AdminController();
            if (isset($params[1])) {
                if ($params[1] === 'add') {
                    $controller->addProducts();
                } else if ($params[1] === 'update') {
                    $controller->updateProducts($params[2]);
                } else if ($params[1] === 'delete') {
                    $controller->deleteProducts($params[2]);
                } else {
                    $controller->getProducts();
                }
            } else {
                $controller->getProducts();
            }
            break;
          
                case 'categories':
                    $controller = new AdminCatController();
                    if (isset($params[1])) {
                        if ($params[1] === 'add') {
                            $controller->addCategories();
                        } else if ($params[1] === 'update') {
                            $controller->updateCategories($params[2]);
                        } else if ($params[1] === 'delete') {
                            $controller->deleteCategories($params[2]);
                        } else {
                            $controller->getCategories();
                        }
                    } else {
                        $controller->getCategories();
                    }
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
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;
    default:
        echo "404 Page Not Found";
        break;
}
