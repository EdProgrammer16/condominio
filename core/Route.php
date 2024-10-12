<?php

namespace Core;

class Route {
    private $routes = [];

    /**
     * Define uma rota GET.
     *
     * @param string $route O caminho da rota
     * @param string $handler O controlador e método a serem chamados
     * @param callable|null $before Função para ser executada antes da rota
     */
    public function GET($route, $handler, $before = null) {
        $this->routes['GET'][$route] = ['handler' => $handler, 'before' => $before];
    }

    /**
     * Define uma rota POST.
     *
     * @param string $route O caminho da rota
     * @param string $handler O controlador e método a serem chamados
     * @param callable|null $before Função para ser executada antes da rota
     */
    public function POST($route, $handler, $before = null) {
        $this->routes['POST'][$route] = ['handler' => $handler, 'before' => $before];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = isset($_GET['url']) ? $_GET['url'] : '/'; // Obtém a URL da requisição
    
        // Verifica se a rota exige autenticação via JWT ou OAuth2
        $requiresAuth = false;
        $authType = null;
        foreach ($this->routes[$method] as $routePattern => $route) {
            if ($this->matchesRoute($routePattern, $url)) {
                if (isset($route['before'])) {
                    $authResult = $route['before']();
                    $authType = $authResult;
                    if ($authType == null) {
                        http_response_code(403);
                        echo 'Forbidden';
                        return;
                    }else {
                        $requiresAuth = true;
                    }
                }
    
                if ($requiresAuth && $authType === 'JWT') {
                    $auth = new Auth();
                    // echo "<pre>";
                    // var_dump($auth->isAuthenticatedWithJWT());
                    // exit();
                    if (!$auth->isAuthenticatedWithJWT()['status']) {
                        $controllerClass = "App\\Controllers\\ErrorController";
                        $controller = new $controllerClass();

                        http_response_code(403);
                        call_user_func_array([$controller, 'error403'], []);
                        exit();
                    }
                } elseif ($requiresAuth && $authType === 'OAuth2') {
                    // Lógica de autenticação OAuth2
                    // Exemplo de verificação pode variar dependendo da implementação
                    // e geralmente envolveria um provedor de OAuth2
                    // $oauth2Provider = new OAuth2Provider();
                    // $token = $_GET['access_token'] ?? '';
                    // if (empty($token) || !$oauth2Provider->validateToken($token)) {
                    //     http_response_code(403);
                    //     echo 'Forbidden';
                    //     return;
                    // }
                    http_response_code(403);
                    echo 'Forbidden';
                    return;
                }
    
                // Se passou pela autenticação, executa o controlador
                $handler = $route['handler'];
                list($controllerName, $methodName) = explode('@', $handler);
    
                $controllerClass = "App\\Controllers\\$controllerName";
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $methodName)) {
                        $params = $this->extractParams($routePattern, $url);
                        call_user_func_array([$controller, $methodName], $params);
                    } else {
                        echo "Método não encontrado: " . $methodName;
                    }
                } else {
                    echo "Controlador não encontrado: " . $controllerClass;
                }
                return;
            }
        }
        exit();
        http_response_code(404);
        echo 'Not Found';
    }
    
    /**
     * Verifica se a URL corresponde ao padrão da rota.
     *
     * @param string $routePattern O padrão de rota
     * @param string $url A URL da requisição
     * @return bool Retorna true se a URL corresponder ao padrão
     */
    private function matchesRoute($routePattern, $url) {
        $routeRegex = $this->convertRouteToRegex($routePattern);
        return preg_match($routeRegex, $url);
    }
    

    /**
     * Converte um padrão de rota para uma expressão regular.
     *
     * @param string $routePattern O padrão de rota
     * @return string A expressão regular correspondente
     */
    private function convertRouteToRegex($routePattern) {
        // Substitui {param} por (.+) para capturar parâmetros
        $routePattern = preg_replace('/{(\w+)}/', '([a-zA-Z0-9_.]+)', $routePattern);
        // Adiciona delimitadores e âncoras
        return '#^' . $routePattern . '$#';
    }

    /**
     * Extrai os parâmetros da URL com base no padrão da rota.
     *
     * @param string $routePattern O padrão de rota
     * @param string $url A URL da requisição
     * @return array Parâmetros extraídos
     */
    private function extractParams($routePattern, $url) {
        $routeRegex = $this->convertRouteToRegex($routePattern);
        preg_match($routeRegex, $url, $matches);
        array_shift($matches); // Remove o primeiro elemento que é o URL completo

        // Retorna apenas os parâmetros relevantes
        return $matches;
    }
}
