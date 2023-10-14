<?php
require_once './app/controllers/pelicula.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/reseña.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showTasks();
// agregar   ->         taskController->addTask();
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new PeliculaController();
        $controller->listarPeliculas();
        break;
    case 'agregar':
        $controller = new PeliculaController();
        $controller->mostrarDetallePelicula();
        break;

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
    case 'listarReseñas':
        $controller =new ReseñaController();
        $controller -> listarReseñas();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}