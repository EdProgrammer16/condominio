<?php

namespace Core;

use PDO;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth {
    private $pdo;
    private $jwtKey;
    private $tempoLogado = 3600 * 24;
    private $algorithm = 'HS256'; // Algoritmo de assinatura

    public function __construct() {
        $this->pdo = \Config\Connector::connectToDatabase();
    }

    /**
     * Verifica se o usuário está autenticado via JWT.
     *
     * @return bool
     */
    public function isAuthenticatedWithJWT() {
        if (isset($_COOKIE['TOKEN'])) {
            $token = $_COOKIE['TOKEN'];
            try {
                $decoded = JWT::decode($token, new Key(JWT_SECRET, $this->algorithm));
                return [
                    'status' => true,
                    'message' => '',
                    'user' => $decoded
                ];
            } catch (\Exception $e) {
                return [
                    'status' => false,
                    'message' => '',
                    'user' => null
                ];
            }
        }
        return [
            'status' => false,
            'message' => '',
            'user' => null
        ];
    }

    public function isAdmin($user) {
        if($user['nivel'] !== 'Administrador'){
            header('location: '.DOC_PAGE.'error/permition');
            exit();
        }
    }
    public function isTecnico($user) {
        // var_dump($user['nivel']);
        if($user['nivel'] !== 'Administrador'){
            if($user['nivel'] !== 'Tecnico') {
                header('location: '.DOC_PAGE.'error/permition');
                exit();
            }
        }
    }

    /**
     * Cria um token JWT e o retorna.
     *
     * @param int $userId ID do usuário
     * @return string Token JWT
     */
    private function createJWT($userId) {
        $payload = [
            'iss' => HOST,
            'iat' => time(),
            'exp' => time() + $this->tempoLogado, // 1 hora de validade
            'user_id' => $userId
        ];
        return JWT::encode($payload, $this->jwtKey, $this->algorithm);
    }

    /**
     * Faz logout do usuário atual.
     */
    public function logout() {
        unset($_SESSION['user_id']);
    }

    /**
     * Obtém o ID do usuário autenticado.
     *
     * @return int|null Retorna o ID do usuário autenticado ou null se não estiver autenticado
     */
    public function getData() {
        $auth = $this->isAuthenticatedWithJWT()['user'];
        if(!$auth) { return $auth; }
        $auth->data = get_object_vars($auth->data);
        return $auth->data ?? null;
    }
}
