<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    // En AuthController.php

    public function auth() {
        // Obtener el nombre de usuario y contraseña del formulario
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
    
        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }
    
        // Buscar el usuario por nombre de usuario
        $user = $this->model->getByUsername($username);
    
        // Verificar si es el usuario especial con permisos de administrador
        if ($username === 'webadmin' && $password === 'admin') {
            // Otorgar permisos de administrador
            $user = new stdClass();
            $user->username = $username;
            $user->isAdmin = true;
        }
    
        if ($user && password_verify($password, $user->contraseña)) {
            // Usuario autenticado
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }
    
}

  