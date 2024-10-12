<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Model;

class CasaController extends Controller {
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
            'username', 
            'email',
            'identidade',
            'nivel',
            'data_nascimento',
            'criado_em'
        ])
        ->where(['username' => $this->auth->getData()['user']])
        ->execute()[0];
    }
    public function index() {
        $this->auth->isTecnico($this->user);
        $casas     = new Model();
        $moradores = new Model();

        $casas->table     = 'casas';
        $moradores->table = 'moradores';
        $lista_casas = $casas->find()->execute();
        $lista_moradores = $moradores->find()->execute();
        $num_moradores = 0;
        $lista_de_casas = [];
        
        foreach($lista_casas as $casa) {
            foreach($lista_moradores as $morador) {
                if($casa['id'] == $morador['casa_id']) {
                    $num_moradores++;
                }
            }
            $casa['numero_moradores'] = $num_moradores;
            $casa['representante'] = $casa['rep_id'] ? $this->find->only(['nome', 'sobrenome', ])
            ->where(['id' => $casa['rep_id']])->execute()[0] : null;

            unset($casa['rep_id']);
            array_push($lista_de_casas, $casa);
            $num_moradores = 0;
        }

        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'casas',
            'casas' => $lista_de_casas,
            'data' => $this->auth->getData(),
            'user' => $this->user,
        ];
        // var_dump($lista_de_casas);
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('casas/index', 'sidebarLayout', [null, 'casas']);
    }
    public function user_casa($username) {
        $casas     = new Model();
        $moradores = new Model();

        $casas->table     = 'casas';
        $moradores->table = 'moradores';
        $lista_casas = $casas->find()->execute();
        $lista_moradores = $moradores->find()->execute();
        $num_moradores = 0;
        $num_casas = [];
        $lista_de_casas = [];

        $id_user = $this->find->only(['id'])
            ->where(['username' => $username])->execute()[0]['id'];

        foreach($lista_casas as $casa) {
            foreach($lista_moradores as $morador) {
                if($casa['id'] == $morador['casa_id']) {
                    // echo $casa['id'] .' == '.$morador['casa_id'].'<br/>';
                    $num_moradores++;
                }
                if($id_user == $morador['usuario_id']) {
                    // echo $id_user .' == '.$morador['usuario_id'].'<br/>';
                    array_push($num_casas, $morador['casa_id']);
                }
            }
            $casa['numero_moradores'] = $num_moradores;
            $casa['representante'] = $casa['rep_id'] ? $this->find->only(['nome', 'sobrenome'])
            ->where(['id' => $casa['rep_id']])->execute()[0] : null;

            unset($casa['rep_id']);
            if($num_casas[0] == $casa['id']) {
                array_push($lista_de_casas, $casa);
            }
            $num_moradores = 0;
            $num_casas = [];
        }

        $data = [
            'title'       => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords'    => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'casas',
            'username'    => $username,
            'casas'       => $lista_de_casas,
            'data'        => $this->auth->getData(),
            'user'        => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('casas/user_casa', 'sidebarLayout', [null, 'casas']);
    }
    public function create() {
        $this->auth->isTecnico($this->user);
        header('Content-Type: application/json'); // Definindo o tipo de resposta como JSON
        $casas     = new Model();
        $moradores = new Model();

        $casas->table     = 'casas';
        $moradores->table = 'moradores';
        $nCasa = (isset($_POST['nCasa']) && $_POST['nCasa'] != '') ? filter_var($_POST['nCasa'], FILTER_SANITIZE_STRING) : null;

        if($nCasa == null) {
            echo json_encode(["message" => 'Valor invalido!', "lista_casas" => []]);
            exit();
        }
        $casas->table = 'casas';
        $res = $casas->create(['setor_id' => 1,'nome' => $nCasa]);

        if($res) {
            $lista_casas = $casas->find()->execute();
            $lista_moradores = $moradores->find()->execute();
            $num_moradores = 0;
            $lista_de_casas = [];
            
            foreach($lista_casas as $casa) {
                foreach($lista_moradores as $morador) {
                    if($casa['id'] == $morador['casa_id']) {
                        $num_moradores++;
                    }
                }
                $casa['numero_moradores'] = $num_moradores;
                $casa['representante'] = $casa['rep_id'] ? $this->find->only(['nome', 'sobrenome', ])
                ->where(['id' => $casa['rep_id']])->execute()[0] : null;
    
                unset($casa['rep_id']);
                array_push($lista_de_casas, $casa);
                $num_moradores = 0;
            }
            echo json_encode(["status" => 1, "message" => 'Casa Criada com Successo!', "lista_casas" => $lista_de_casas]);
        }else {
            echo json_encode(["status" => 0, "message" => 'Erro ao Criar Casa!', "lista_casas" => []]);
        }

    }
}
