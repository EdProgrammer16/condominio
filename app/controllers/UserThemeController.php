<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;

class UseThemeController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }
    // ALTER TABLE `user_theme` CHANGE `sidenav_mini` `sidenav_mini` ENUM('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'false';
    public function index() {
        $auth = new Auth();
        $find = $this->model->find();
        $user = $find->only([
            'nome', 
            'sobrenome', 
            'email',
            'identidade',
            'nivel',
            'data_nascimento',
            'criado_em'
        ])
        ->where([
            'username' => $auth->getData()['user']
        ])
        ->execute();
        // list($id, $user) = array_values($auth->getData());
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Perfil do Usuário | @'.$auth->getData()['user'],
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Perfil, Usuário, mvc, php',
            'data' => $auth->getData(),
            'user' => $user[0],
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('profile/index', 'sidebarLayout', [null, 'sibebarOption']);
    }

    public function sidebarColors() {}
    public function sidenavType  () {}
    public function navbarFixed  () {}
    public function sidenavMini  () {}
    public function darkMode     () {}
    
}