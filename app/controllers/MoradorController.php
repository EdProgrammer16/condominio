<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Model;

class MoradorController extends Controller {
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
        $moradores = new Model();
        $casas     = new Model();

        $moradores->table = 'moradores';
        $casas->table     = 'casas';

        $lista_de_moradores = [];
        $lista_moradores    = $moradores->find()->execute();
        $lista_casas        = $casas->find()->execute();
        $i = 0;

        foreach($lista_moradores as $morador) {
            foreach($lista_casas as $casa) {
                if ($casa['id'] === $morador['casa_id']) {
                    $lista_de_moradores[$i] = [];
                    $res = $this->find->only([
                        'nome', 
                        'sobrenome', 
                        'email',
                        'identidade',
                        'nivel',
                        'data_nascimento',
                        ])
                        ->where(['id' => $morador['usuario_id']])->execute()[0];
                        $lista_de_moradores[$i] = $res;
                        $lista_de_moradores[$i]['n_casa'] = $casa['nome'];
                        $i++;
                }
            }
        }

        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'moradores',
            'moradores' => $lista_de_moradores,
            'data' => $this->auth->getData(),
            'user' => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('moradores/index', 'sidebarLayout', [null, 'moradores']);
    }
    public function user_moredores($username) {
        $moradores = new Model();
        $casas     = new Model();

        $moradores->table = 'moradores';
        $casas->table     = 'casas';

        $lista_de_moradores = [];
        $listar_moradores = [];
        $lista_moradores    = $moradores->find()->execute();
        $lista_casas        = $casas->find()->execute();
        $i = 0;
        $num_casas = [];
        $user_id = $this->find->only(['id'])
            ->where(['username' => $username])->execute()[0]['id'];

        foreach($lista_casas as $casa) {
            foreach($lista_moradores as $morador) {
                if ($casa['id'] === $morador['casa_id']) {
                    $listar_moradores[$i] = [];
                    $res = $this->find->only([
                        'nome', 
                        'sobrenome', 
                        'username', 
                        'email',
                        'identidade',
                        'nivel',
                        'data_nascimento',
                    ])
                    ->where(['id' => $morador['usuario_id']])->execute()[0];
                    
                    $listar_moradores[$i] = $res;
                    $listar_moradores[$i]['n_casa'] = $casa['nome'];
                    $i++;

                    if($user_id == $morador['usuario_id']) {
                        // echo $id_user .' == '.$morador['usuario_id'].'<br/>';
                        array_push($num_casas, $casa['nome']);
                    }
                }
            }
        }
        foreach($listar_moradores as $listar_morador) {
            foreach($num_casas as $num_casa) {
                if($num_casa == $listar_morador['n_casa'] && $username != $listar_morador['username']){
                    array_push($lista_de_moradores, $listar_morador);
                }
            }
        }
        
        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'moradores',
            'username' => $username,
            'moradores' => $lista_de_moradores,
            'data' => $this->auth->getData(),
            'user' => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('moradores/user_moradores', 'sidebarLayout', [null, 'moradores']);
    }
    public function add() {
        $this->auth->isAdmin($this->user);
        $casas = new Model();
        $casas->table = 'casas';
        $lista_casas = $casas->find()->execute();
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'moradores',
            'data' => $this->auth->getData(),
            'casas' => $lista_casas,
            'user' => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('moradores/add', 'sidebarLayout', [null, 'moradores-add']);
    }
    public function create() {
        $this->auth->isAdmin($this->user);
        $moradores  = new Model();
        $casas      = new Model();
        $user_theme = new Model();

        $moradores->table  = 'moradores';
        $casas->table      = 'casas';
        $user_theme->table = 'user_theme';
        
        extract($_POST);
        extract($_FILES);
        extract($uimagem);
        
        $unome           =  (isset($unome)           && $unome != ''          ) ? filter_var($unome          , FILTER_SANITIZE_STRING) :   '';
        $usobrenome      =  (isset($usobrenome)      && $usobrenome != ''     ) ? filter_var($usobrenome     , FILTER_SANITIZE_STRING) :   '';
        $uusername       =  (isset($uusername)       && $uusername != ''      ) ? filter_var($uusername      , FILTER_SANITIZE_STRING) :   '';
        $uemail          =  (isset($uemail)          && $uemail != ''         ) ? filter_var($uemail         , FILTER_SANITIZE_STRING) :   '';
        $uidentidade     =  (isset($uidentidade)     && $uidentidade != ''    ) ? filter_var($uidentidade    , FILTER_SANITIZE_STRING) :   '';
        $udataNascimento =  (isset($udataNascimento) && $udataNascimento != '') ? filter_var($udataNascimento, FILTER_SANITIZE_STRING) : null;
        $tipo_morador    =  (isset($tipo_morador)    && $tipo_morador != ''   ) ? filter_var($tipo_morador   , FILTER_SANITIZE_STRING) :   '';
        $n_casa          =  (isset($n_casa)          && $n_casa != ''         ) ? filter_var($n_casa         , FILTER_SANITIZE_STRING) :   '';
        $senha           =  (isset($senha)           && $senha != ''          ) ? filter_var($senha          , FILTER_SANITIZE_STRING) : null;
        $reporSenha      =  (isset($reporSenha)      && $reporSenha != ''     ) ? filter_var($reporSenha     , FILTER_SANITIZE_STRING) : null;
        // ===================================================================================================================================
        $name            =  (isset($name)            && $name != ''           ) ? filter_var($name           , FILTER_SANITIZE_STRING) :   '';
        $type            =  (isset($type)            && $type != ''           ) ? filter_var($type           , FILTER_SANITIZE_STRING) :   '';
        $tmp_name        =  (isset($tmp_name)        && $tmp_name != ''       ) ? filter_var($tmp_name       , FILTER_SANITIZE_STRING) :   '';
        $size            =  (isset($size)            && $size != ''           ) ? filter_var($size           , FILTER_SANITIZE_STRING) : null;

        if(isset($uSubmit)){
            $res = $this->find->only([
                'username',
                'email',
                'identidade'
            ])->where([
                'username'   => $uusername,
                'email'      => $uemail,
                'identidade' => $uidentidade
            ],
            ' OR ')->execute();

            if(!$res){
                if($senha !== $reporSenha)
                    header('location: '.DOC_PAGE.'moradores/add/error/password');

                $senha_criptada = password_hash($senha, PASSWORD_BCRYPT);

                $res = $this->model->create([
                    'nome' => $unome,
                    'sobrenome' => $usobrenome,
                    'username' => $uusername,
                    'email' => $uemail,
                    'nivel' => $tipo_morador,
                    'identidade' => $uidentidade,
                    'senha' => $senha_criptada,
                    'data_nascimento' => $udataNascimento
                ]);
                if($res){
                    $res = $this->find->only(['id', 'nivel'])->where(['username' => $uusername])->execute()[0];
                    $res1 = $casas->find()->only(['id'])->where(['nome' => $n_casa])->execute()[0];
                    if($res && $res1) {
                        $res2 = $moradores->create([
                            'usuario_id' => $res['id' ],
                            'casa_id'    => $res1['id']
                        ]);
                        $user_theme->create([
                            'user_id' => $res['id' ]
                        ]);

                        if($res2 && $res['nivel'] == 'Representante') {
                            $res3 = $casas->update(
                                ['rep_id' => $res['id']], 
                                ['nome'   => $n_casa   ]
                            );
                            if($res3) {header('location: '.DOC_PAGE.'moradores/success');}
                            else {header('location: '.DOC_PAGE.'moradores/add/error/RepresentanteCasa');}
                        }else {header('location: '.DOC_PAGE.'moradores/add/error/CriarMorador');}
                    }else {header('location: '.DOC_PAGE.'moradores/add/error/BuscaId');}
                }else {header('location: '.DOC_PAGE.'moradores/add/error/CriarUsuario');}
            }else {header('location: '.DOC_PAGE.'moradores/add/error/usuarioExiste');}
        }else {header('location: '.DOC_PAGE.'moradores/add');}

    }
}