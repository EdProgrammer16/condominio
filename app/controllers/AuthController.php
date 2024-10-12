<?php

namespace App\Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Core\Controller;
class AuthController extends Controller {
    protected $view;
    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    public function index(){}

    public function sign_in() {
        // Obtém todos os usuários do modelo
        $users = $this->model->find()->execute();
        
        // Passa os dados e metadados para a view
        $this->view->with([
            'title' => 'Iniciar Sessão | Condominio',
            'description' => 'Página de Sign-in, Iniciar Sessão no Condominio',
            'keywords' => 'Sign-in, Iniciar Sessão, Iniciar Sessão no Condominio, Condominio, Sessão no Condominio'
        ])->renderWithLayout('sign-in/index', 'sign', [null, 'sign']);
    }

    public function logged_out($username) {
        // Obtém todos os usuários do modelo
        $user = $this->model->find()->only(['nome', 'sobrenome'])->where(['username' => $username])->execute();
        
        // Passa os dados e metadados para a view
        $this->view->with([
            'title' => 'Condominio | Reiniciar Sessão',
            'description' => 'Página de Sign-in, Iniciar Sessão no Condominio',
            'keywords' => 'Sign-in, Iniciar Sessão, Iniciar Sessão no Condominio, Condominio, Sessão no Condominio',
            'user' => $user[0]
        ])->renderWithLayout('sign-in/loggedOut', 'sign', [null, 'sign']);
    }

    public function auth() {
        echo "<pre>";
        extract($_POST);
        
        if(!isset($btn_submit)) header('location: '.DOC_PAGE.'sign-in/error/submit');

        $email = isset($email) ? filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $pass  = isset($pass ) ? filter_var($pass , FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $rem   = isset($rem  ) ? filter_var($rem  , FILTER_SANITIZE_SPECIAL_CHARS) : null;

        // Obtém o usuário do modelo pelo email
        $userByUsername = $this->model->find()->where(['username' => $email])->execute();
        $userByEmail = $this->model->find()->where(['email' => $email])->execute();
        
        $user = !empty($userByUsername) ? $userByUsername 
                : (!empty($userByEmail) ? $userByEmail : null);

        extract($user[0]);

        if ($user && password_verify($pass, $senha)) {
            // Credenciais válidas, gerar o token JWT
            $payload = [
                'iss' => HOST,                  // Emissor do token
                'aud' => HOST,                 // Público
                'iat' => time(),              // Hora de emissão
                'exp' => time() + (60 * 30), // Expiração (1 hora)
                'data'=> [
                    'id'   => $id,       // ID do usuário
                    'user' => $username // Nome do usuário
                ]
            ];

            $jwt = JWT::encode($payload, JWT_SECRET, 'HS256');

            setcookie('TOKEN', $jwt, [
                'expires'  => $payload['exp'], // Expiração em 1 hora
                'path'     => '/',            // Disponível em todo o site
                // 'secure'   => true,       // Somente em conexões HTTPS
                'httponly' => true,         // Inacessível via JavaScript
                'samesite' => 'Strict'     // Proteção contra CSRF
            ]);

            header('location: '.DOC_PAGE.'home');

        } else {
            // Credenciais inválidas
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }
    public function logout($username) {
        // Exemplo de destruição de um cookie de autenticação
        if (isset($_COOKIE['TOKEN'])) {
            // Para destruir o cookie, defina o tempo de expiração no passado
            setcookie('TOKEN', '', time() - 3600, '/');
            // Remover o valor do cookie também do array $_COOKIE
            unset($_COOKIE['TOKEN']);
        }

        header('location: '.DOC_PAGE.'sign-in/@'.$username);
    }
}
