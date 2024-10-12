<?php

namespace Core;

class View {
    private $data = [];

    /**
     * Define os dados que serão passados para a view.
     *
     * @param array $data Dados a serem passados para a view
     * @return $this
     */
    public function with(array $data) {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * Renderiza a view com os dados fornecidos.
     *
     * @param string $view Caminho para o arquivo da view
     * @return void
     */
    public function render($view) {
        $file = DOC_ROOT . 'app/views/' . $view . '.php';

        if (file_exists($file)) {
            extract($this->data); // Extrai os dados para variáveis
            include $file; // Inclui o arquivo da view
        } else {
            throw new \Exception("View file not found: " . $file);
        }
    }

    /**
     * Renderiza a view com o cabeçalho e rodapé.
     *
     * @param string $view Caminho para o arquivo da view
     * @param string $header Caminho para o arquivo do cabeçalho
     * @param string $footer Caminho para o arquivo do rodapé
     * @return void
     */
    public function renderWithLayout($view, $layout, $options = [null, null]) {
        list( $header, $footer ) = $options;
        $layout = DOC_ROOT . '/app/views/layouts/' . $layout . '.php';
        if (file_exists($layout)) {
            extract($this->data); // Extrai os dados para variáveis
            include $layout;
        }
    }
}
