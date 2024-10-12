<?php

namespace Core;

use Core\View;

abstract class Controller {
    protected $view;
    protected $model;

    public function __construct() {
        $this->view = new View();
    }

    /**
     * Carrega um modelo e o atribui à propriedade $model.
     *
     * @param string $model Nome do modelo (sem o sufixo 'Model')
     * @return void
     */
    protected function loadModel($model) {
        $modelName = 'App\\Models\\' . $model . 'Model';
        if (class_exists($modelName)) {
            $this->model = new $modelName();
        } else {
            throw new \Exception("Model class $modelName not found");
        }
    }

    /**
     * Renderiza uma view com dados.
     *
     * @param string $view Nome da view
     * @param array $data Dados a serem passados para a view
     * @return void
     */
    // protected function render($view, array $data = []) {
    //     $this->view->with($data)->render($view);
    // }

    /**
     * Renderiza uma view com layout.
     *
     * @param string $view Nome da view
     * @param string $header Nome do arquivo do cabeçalho
     * @param string $footer Nome do arquivo do rodapé
     * @param array $data Dados a serem passados para a view
     * @return void
     */
    // protected function renderWithLayout($view, $header = 'header', $footer = 'footer', array $data = []) {
    //     $this->view->with($data)->renderWithLayout($view, $header, $footer);
    // }

    /**
     * Método padrão a ser sobrescrito em controladores específicos.
     *
     * @return void
     */
    abstract public function index();
}
