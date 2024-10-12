<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Model;
use DateTime;

class VisitanteController extends Controller {
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

        $visitantes = new Model();
        $visitas    = new Model();
        $casas    = new Model();

        $visitantes->table = 'visitantes';
        $visitas->table    = 'visitas';
        $casas->table      = 'casas';

        $lista_visitantes = $visitantes->find()->execute();
        $lista_visitas    = $visitas->find()->execute();
        $lista_casas      = $casas->find()->execute();
        $lista_de_visitas = [];

        // echo '<pre>';
        $i = 0;
        foreach($lista_visitas as $visita) {
            foreach($lista_casas as $casa) { 
                foreach($lista_visitantes as $visitante) { 
                    if($visita['casa_id'] == $casa['id'] && $visita['visitante_id'] == $visitante['id']) {

                        $lista_de_visitas[$i] = [
                            'nome'         => $visitante['nome'      ],
                            'sobrenome'    => $visitante['sobrenome' ],
                            'numero_casa'  => $casa['nome'           ],
                            'identidade'   => $visitante['identidade'],
                            'telemovel'    => $visitante['telemovel' ],
                            'tipo_operacao'=> $visita['tipo'         ],
                            'data_hora'    => $this->data_hora($visita['data_hora'])
                        ];
                        $i++;
                    }
                }
            }
        }
        // var_dump($lista_de_visitas);

        $data = [
            'title'       => 'Condominio | Visititantes',
            'description' => 'Welcome to the home page of our application.',
            'keywords'    => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'visitantes',
            'data'        => $this->auth->getData(),
            'visitas'     => $lista_de_visitas,
            'user'        => $this->user,
        ];
        // var_dump(func_get_args()[0]);
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('visitantes/index', 'sidebarLayout', [null, 'moradores']);
    }
    public function user_visitantes() {
        $visitantes = new Model();
        $visitas    = new Model();
        $casas    = new Model();

        $visitantes->table = 'visitantes';
        $visitas->table    = 'visitas';
        $casas->table      = 'casas';

        $lista_visitantes = $visitantes->find()->execute();
        $lista_visitas    = $visitas->find()->execute();
        $lista_casas      = $casas->find()->execute();
        $lista_de_visitas = [];

        // echo '<pre>';
        $i = 0;
        foreach($lista_visitas as $visita) {
            foreach($lista_casas as $casa) { 
                foreach($lista_visitantes as $visitante) { 
                    if($visita['casa_id'] == $casa['id'] && $visita['visitante_id'] == $visitante['id']) {

                        $lista_de_visitas[$i] = [
                            'nome'         => $visitante['nome'      ],
                            'sobrenome'    => $visitante['sobrenome' ],
                            'numero_casa'  => $casa['nome'           ],
                            'identidade'   => $visitante['identidade'],
                            'telemovel'    => $visitante['telemovel' ],
                            'tipo_operacao'=> $visita['tipo'         ],
                            'data_hora'    => $this->data_hora($visita['data_hora'])
                        ];
                        $i++;
                    }
                }
            }
        }
        // var_dump($lista_de_visitas);

        $data = [
            'title'       => 'Condominio | Visititantes',
            'description' => 'Welcome to the home page of our application.',
            'keywords'    => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'visitantes',
            'data'        => $this->auth->getData(),
            'visitas'     => $lista_de_visitas,
            'user'        => $this->user,
        ];
        // var_dump(func_get_args()[0]);
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('visitantes/user_visitantes', 'sidebarLayout', [null, 'moradores']);
    }
    public function add() {
        $this->auth->isTecnico($this->user);

        $casas = new Model();
        $casas->table = 'casas';
        $lista_casas = $casas->find()->execute();
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'visitantes',
            'data' => $this->auth->getData(),
            'casas' => $lista_casas,
            'user' => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('visitantes/add', 'sidebarLayout', [null, 'moradores-add']);
    }
    public function create() {
        $this->auth->isTecnico($this->user);
        $visitantes = new Model();
        $visitas    = new Model();
        $automovel  = new Model();
        $casas      = new Model();

        $visitantes->table = 'visitantes';
        $visitas->table    = 'visitas';
        $automovel->table  = 'automovel';
        $casas->table      = 'casas';

        extract($_POST);
        
        $vnome           =  (isset($vnome)           && $vnome != ''          ) ? filter_var($vnome          , FILTER_SANITIZE_STRING) :   '';
        $vsobrenome      =  (isset($vsobrenome)      && $vsobrenome != ''     ) ? filter_var($vsobrenome     , FILTER_SANITIZE_STRING) :   '';
        $vtelemovel      =  (isset($vtelemovel)      && $vtelemovel != ''     ) ? filter_var($vtelemovel     , FILTER_SANITIZE_STRING) :   '';
        $videntidade     =  (isset($videntidade)     && $videntidade != ''    ) ? filter_var($videntidade    , FILTER_SANITIZE_STRING) :   '';
        $vn_casa         =  (isset($vn_casa)         && $vn_casa != ''        ) ? filter_var($vn_casa        , FILTER_SANITIZE_STRING) :   '';
        // ===================================================================================================================================
        $usando_carro =  (isset($usando_carro) && $usando_carro != '') ? filter_var($usando_carro , FILTER_SANITIZE_STRING) :   '';
        $vmarca       =  (isset($vmarca)       && $vmarca != ''      ) ? filter_var($vmarca       , FILTER_SANITIZE_STRING) :   '';
        $vmodelo      =  (isset($vmodelo)      && $vmodelo != ''     ) ? filter_var($vmodelo      , FILTER_SANITIZE_STRING) :   '';
        $vplaca       =  (isset($vplaca)       && $vplaca != ''      ) ? filter_var($vplaca       , FILTER_SANITIZE_STRING) : null;

        if(isset($uSubmit)){
            $res = $find->only(['identidade'])
                ->where(['identidade' => $videntidade])
                    ->execute();

            if(!$res){
                $res = $visitantes->create([
                    'nome' => $vnome,
                    'sobrenome' => $vsobrenome,
                    'identidade' => $videntidade,
                    'telemovel' => $vtelemovel
                ]);
                if($res){
                    $res = $visitantes->find()->only(['id'])->where(['identidade' => $videntidade])->execute()[0];
                    $res1 = $casas->find()->only(['id'])->where(['nome' => $vn_casa])->execute()[0];
                    if($res && $res1) {
                        $res2 = $visitas->create([
                            'tipo'           => 'Entrada',
                            'casa_id'        => $res1['id'],
                            'visitante_id'   => $res['id'],
                            'registrador_id' => $user[0]['id'],
                        ]);

                        if(intval($usando_carro)) {
                            $automovel->create([
                                'visita_id' => $res['id'], 
                                'marca'     => $vmarca, 
                                'modelo'    => $vmodelo, 
                                'matricula' => $vplaca
                            ]);
                        }
                        // -- Remover a chave estrangeira existente
                        // ALTER TABLE visitas DROP FOREIGN KEY visitas_ibfk_1;

                        // -- Adicionar a nova chave estrangeira
                        // ALTER TABLE visitas
                        // ADD CONSTRAINT fk_casa_id FOREIGN KEY (casa_id) REFERENCES casas(id) ON DELETE SET NULL;


                        if($res2) {
                            header('location: '.DOC_PAGE.'visitantes/success');
                        }else {header('location: '.DOC_PAGE.'visitantes/add/error/CriarVisita');}
                    }else {header('location: '.DOC_PAGE.'visitantes/add/error/BuscaId');}
                }else {header('location: '.DOC_PAGE.'visitantes/add/error/CriarUsuario');}
            }else {header('location: '.DOC_PAGE.'visitantes/add/error/identidadeExiste');}
        }else {header('location: '.DOC_PAGE.'visitantes/add');}

    }
    private function data_hora($data_hora) {
        $data = new DateTime($data_hora);
        return $data->format('d/M/Y - H\h:30\m\i\n'); // Saída: 10/10/2023 14h:30min
    }
}