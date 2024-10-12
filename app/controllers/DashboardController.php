<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Model;

class DashboardController extends Controller {
    protected $auth;
    protected $user;
    protected $find;

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
        $this->auth = new Auth();
        $this->find = $this->model->find();
        
        $this->user = $this->find->only([
            'nome', 
            'sobrenome', 
            'email',
            'identidade',
            'nivel',
            'data_nascimento',
            'criado_em'
        ])
        ->where(['username' => $this->auth->getData()['user']])
        ->execute()[0];
        $this->auth->isTecnico($this->user);
    }
    public function index() {
        $moradores  = new Model();
        $visitantes = new Model();
        $visitas    = new Model();

        $moradores->table  = 'moradores';
        $visitantes->table = 'visitantes';
        $visitas->table    = 'visitas';
        
        $lista_moradores  = $moradores->find()->execute();
        $lista_visitantes = $visitantes->find()->execute();
        $lista_visitas    = $visitas->find()->execute();

        // Dados que você deseja passar para a visão
        $data = [
            'title'       => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords'    => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'dashboard',
            'moradores'   => $lista_moradores,
            'visitantes'  => $lista_visitantes,
            'visitas'     => $lista_visitas,
            'data'        => $this->auth->getData(),
            'user'        => $this->user,
        ];
        
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('dashboard/index', 'sidebarLayout', [null, 'dashboard']);
    }
}
