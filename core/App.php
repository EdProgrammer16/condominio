<?php

namespace Core;

use Core\Route;

class App {
    protected $router;

    public function __construct() {
        // Inicializa o roteador
        $this->router = new Route();
        
        // Configura as rotas (este é apenas um exemplo, você pode definir suas rotas em outro arquivo)
        $this->setupRoutes();
    }

    protected function setupRoutes() {
        // Configuração de rotas
        $this->router->GET('/', 'HomeController@index');
        $this->router->GET('contasAteARiqueza', 'HomeController@contasAteARiqueza');
        // Configuração da rota sign-in
        $this->router->GET('sign-in', 'AuthController@sign_in');
        $this->router->POST('sign-in/auth', 'AuthController@auth');
        $this->router->GET('sign-in/@{username}', 'AuthController@logged_out');

        // Configuração de rotas Protegidas
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        $this->router->GET('home', 'HomeController@home', function(){return 'JWT';});
        $this->router->GET('dashboard', 'DashboardController@index', function(){return 'JWT';});
        
        // Perfil
        $this->router->GET('@{username}', 'ProfileController@index', function(){return 'JWT';});
        $this->router->GET('@{username}/edit/{id}', 'ProfileController@edit', function(){return 'JWT';});
        $this->router->POST('@{username}/edit/{id}', 'ProfileController@update', function(){return 'JWT';});
        $this->router->POST('@{username}/delete/{id}', 'ProfileController@delete', function(){return 'JWT';});
        $this->router->GET('@{username}/logout', 'AuthController@logout', function(){return 'JWT';});

        // Tecnicos
        $this->router->GET('tecnicos', 'TecnicoController@index', function(){return 'JWT';});
        $this->router->GET('tecnicos/add', 'TecnicoController@add', function(){return 'JWT';});
        $this->router->GET('tecnicos/{message}', 'TecnicoController@index', function(){return 'JWT';});
        $this->router->POST('tecnicos/create', 'TecnicoController@create', function(){return 'JWT';});
        $this->router->GET('tecnicos/edit/{id}', 'TecnicoController@edit', function(){return 'JWT';});
        $this->router->POST('moradores/edit/{id}', 'TecnicoController@update', function(){return 'JWT';});
        $this->router->POST('tecnicos/delete/{id}', 'TecnicoController@delete', function(){return 'JWT';});

        // Moradores
        $this->router->GET('moradores', 'MoradorController@index', function(){return 'JWT';});
        $this->router->GET('moradores/add', 'MoradorController@add', function(){return 'JWT';});
        $this->router->GET('moradores/{message}', 'MoradorController@index', function(){return 'JWT';});
        $this->router->GET('moradores/@{username}', 'MoradorController@user_moredores', function(){return 'JWT';});
        $this->router->POST('moradores/create', 'MoradorController@create', function(){return 'JWT';});
        $this->router->GET('moradores/edit/{id}', 'MoradorController@edit', function(){return 'JWT';});
        $this->router->POST('moradores/edit/{id}', 'MoradorController@update', function(){return 'JWT';});
        $this->router->POST('moradores/delete/{id}', 'MoradorController@delete', function(){return 'JWT';});

        // Visitantes
        $this->router->GET('visitantes', 'VisitanteController@index', function(){return 'JWT';});
        $this->router->GET('visitantes/add', 'VisitanteController@add', function(){return 'JWT';});
        $this->router->GET('visitantes/{parametro}', 'VisitanteController@index', function(){return 'JWT';});
        $this->router->GET('visitantes/@{username}', 'VisitanteController@user_visitantes', function(){return 'JWT';});
        $this->router->POST('visitantes/create', 'VisitanteController@create', function(){return 'JWT';});
        $this->router->GET('visitantes/edit/{id}', 'VisitanteController@edit', function(){return 'JWT';});
        $this->router->POST('visitantes/edit/{id}', 'VisitanteController@update', function(){return 'JWT';});
        $this->router->POST('visitantes/delete/{id}', 'VisitanteController@delete', function(){return 'JWT';});

        // Casas
        $this->router->GET('casas', 'CasaController@index', function(){return 'JWT';});
        $this->router->GET('casas/add', 'CasaController@add', function(){return 'JWT';});
        $this->router->GET('casas/@{username}', 'CasaController@user_casa', function(){return 'JWT';});
        $this->router->POST('casas/create', 'CasaController@create', function(){return 'JWT';});
        $this->router->GET('casas/edit/{id}', 'CasaController@edit', function(){return 'JWT';});
        $this->router->POST('casas/edit/{id}', 'CasaController@update', function(){return 'JWT';});
        $this->router->POST('casas/delete/{id}', 'CasaController@delete', function(){return 'JWT';});

        // Sectores
        $this->router->GET('sectores', 'SectorController@index', function(){return 'JWT';});
        $this->router->GET('sectores/add', 'SectorController@add', function(){return 'JWT';});
        $this->router->POST('sectores/add', 'SectorController@create', function(){return 'JWT';});
        $this->router->GET('sectores/edit/{id}', 'SectorController@edit', function(){return 'JWT';});
        $this->router->POST('sectores/edit/{id}', 'SectorController@update', function(){return 'JWT';});
        $this->router->POST('sectores/delete/{id}', 'SectorController@delete', function(){return 'JWT';});
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
    }

    public function run() {
        // Roteia a solicitação atual
        $this->router->dispatch();
    }
}
