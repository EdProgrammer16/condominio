<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;

class ErrorController extends Controller {
    public function index() {
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Home Page',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'home, page, mvc, php'
        ];

        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('index', 'default', [null, 'index']);
    }

    public function error403() {
        // list($id, $user) = array_values($auth->getData());
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Acesso Proibido!',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'home, page, mvc, php',
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('error/403', 'error');

    }
}
