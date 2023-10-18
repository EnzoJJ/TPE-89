<?php

require_once './app/controllers/pelicula.controller.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listar'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
       case 'listar':
         $controller = new PeliculaController();
         $controller->showPeliculas();
         break;
       case 'login':
         $AuthController = new AuthController();
         $AuthController->showLogin();
         break;
        case 'validate':
         $AuthController = new AuthController();
         $AuthController->auth();
         break;
        case 'logout':
         $AuthController = new AuthController();
         $AuthController->logout();
         break;
        case 'details':
         $controller = new PeliculaController();
         $id_pelicula = $params[1];
         $controller->showDetails($id_pelicula);
         break;
         case 'add' :
        $controller = new PeliculaController();
        $controller->addPelicula();
        break;
        case 'delete':
          $controller = new PeliculaController();
          $id_pelicula = $params[1];
          $controller->removePelicula($id_pelicula);
          break;
        case 'editPelicula':
            $controller = new PeliculaController();
            if(!empty($params[1])){
              $controller->editPelicula($params[1]);
            } else {
              header("Location: ".BASE_URL);
            }
            break;
        default:
         echo "404 Page Not Found"; // corregir esto
         break;
}