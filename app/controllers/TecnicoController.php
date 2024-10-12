<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Model;

class TecnicoController extends Controller {
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

        $lista_tecnicos    = $this->find->where(['nivel' => 'Tecnico'])->execute();

        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'tecnicos',
            'tecnicos' => $lista_tecnicos,
            'data' => $this->auth->getData(),
            'user' => $this->user,
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('tecnicos/index', 'sidebarLayout', [null, 'moradores']);
    }
    public function add() {
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
        if($user[0]['nivel'] !== 'Administrador'){
            header('location: '.DOC_PAGE.'error/permition');
            exit();
        }
        $casas = new Model();
        $casas->table = 'casas';
        $lista_casas = $casas->find()->execute();
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Condominio | Dashboard',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Condominio, Dashboard, mvc, php',
            'currentPage' => 'tecnicos',
            'data' => $auth->getData(),
            'casas' => $lista_casas,
            'user' => $user[0],
        ];
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('tecnicos/add', 'sidebarLayout', [null, 'tecnicos-add']);
    }
    public function create() {
        $tecnicos  = new Model();
        $casas      = new Model();
        $user_theme = new Model();

        $tecnicos->table  = 'tecnicos';
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
                    header('location: '.DOC_PAGE.'tecnicos/add/error/password');

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
                        $res2 = $tecnicos->create([
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
                            if($res3) {header('location: '.DOC_PAGE.'tecnicos/success');}
                            else {header('location: '.DOC_PAGE.'tecnicos/add/error/RepresentanteCasa');}
                        }else {header('location: '.DOC_PAGE.'tecnicos/add/error/CriarMorador');}
                    }else {header('location: '.DOC_PAGE.'tecnicos/add/error/BuscaId');}
                }else {header('location: '.DOC_PAGE.'tecnicos/add/error/CriarUsuario');}
            }else {header('location: '.DOC_PAGE.'tecnicos/add/error/usuarioExiste');}
        }else {header('location: '.DOC_PAGE.'tecnicos/add');}

    }
}