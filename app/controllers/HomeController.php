<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;

class HomeController extends Controller {
    protected $auth;
    protected $user;
    protected $find;

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
        $this->auth = new Auth();
        if($this->auth->getData()) {
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
    }
    public function index() {
        if($this->auth->getData()) {
            header('location: '.DOC_PAGE.'home');
        }
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Home Page',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'home, page, mvc, php'
        ];

        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('index', 'default', [null, 'index']);
    }

    public function home() {
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Perfil do Usuário | @'.$this->auth->getData()['user'],
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'Perfil, Usuário, mvc, php',
            'currentPage' => 'home',
            'data' => $this->auth->getData(),
            'user' => $this->user,
        ];
        // var_dump($this->user['nivel']);
        // Carrega a visão para a página inicial
        $this->view->with($data)->renderWithLayout('home/index', 'sidebarLayout', [null, 'sibebarOption']);
    }

    public function contasAteARiqueza() {
        // Dados que você deseja passar para a visão
        $data = [
            'title' => 'Home Page',
            'description' => 'Welcome to the home page of our application.',
            'keywords' => 'home, page, mvc, php'
        ];

        $emprestimo = 540000;
        $juros_dia = 0.001;
        $dias_pagar = 180;
        $divida = $emprestimo;
        echo '<h1>Etapa de Emprestimo</h1>';
        echo "Emprestimo: $emprestimo Kz";echo "<br>";
        echo 'Juros diarios: '.($juros_dia*100) .'%';
        echo "<br>";echo "<br>";

        for ($i=1; $i <= $dias_pagar; $i++) { 
            $divida += ($divida*$juros_dia);
            // if( $i % 5 === 0 ){
            //     echo "<br>";echo "<br>";
            // }
            // echo "Dia $i => $divida Kz <<<<=>>>> ";
            // if( $i % 30 === 0 ){
            //     echo "<hr/>";
            //     $j = 0;
            // }
        }

        echo 'TOTAL: '.intval($divida);echo "<br>";echo "<br>";
        echo 'DIFERENCIAL: '.intval(($divida - $emprestimo));echo "<br>";echo "<br>";


        // =============================================================================
        // =============================================================================
        echo "<hr/>";
        echo '<h1>Etapa de Investimento</h1>';
        $investimento = 300;
        $cent_mao = 0.015;
        $taxa_mao = 0.83;
        $mao = 0;
        $ganho_mao = 0;
        $ganho_dia = 0;
        $ganho_10_dia = 0;
        $ganho_20_dia = 0;
        $ganho_26_dia = 0;

        for ($j=1; $j <= ($dias_pagar / 30); $j++) { 
            echo '<h2>Mês '.$j.'</h2>';
            for ($i=1; $i <= 26; $i++) { 
                $mao = intval(( $cent_mao * $investimento )) > 1000 ? 1000 : intval(( $cent_mao * $investimento ));
                $ganho_mao = ( $mao * $taxa_mao );
                $ganho_dia = intval(( $ganho_mao * 10 ));
                $ganho_10_dia += $ganho_dia;

                if( $i === 10 ){
                    echo "<br>";echo "<br>";
                    echo "Investimento: ".$investimento."$";echo "<br>";
                    echo "Taxa Por Mão: ".($taxa_mao*100)."%";echo "<br>";
                    echo "Percentual Por Mão: ".($cent_mao*100)."%";echo "<br>";
                    echo "Mão: ".$mao."$";echo "<br>";
                    echo "Ganho Por Mão: ".$ganho_mao."$";echo "<br>";
                    echo "Ganho Diario: ".$ganho_dia."$";echo "<br>";
                    echo "Ganho em 10 Dias: ".$ganho_10_dia."$";echo "<br>";
                    
                    $investimento = intval(($ganho_10_dia+$investimento));
                    echo "TOTAL: ".$investimento."$";echo "<br>";
                }
                if( $i === 20 ){
                    echo "<br>";echo "<br>";
                    echo "Investimento: ".$investimento."$";echo "<br>";
                    echo "Taxa Por Mão: ".($taxa_mao*100)."%";echo "<br>";
                    echo "Percentual Por Mão: ".($cent_mao*100)."%";echo "<br>";
                    echo "Mão: ".$mao."$";echo "<br>";
                    echo "Ganho Por Mão: ".$ganho_mao."$";echo "<br>";
                    echo "Ganho Diario: ".$ganho_dia."$";echo "<br>";
                    echo "Ganho em 10 Dias: ".$ganho_10_dia."$";echo "<br>";
                    $investimento = intval(($ganho_10_dia+$investimento));
                    echo "TOTAL: ".$investimento."$";echo "<br>";
                }
                if( $i === 26 ){
                    echo "<br>";echo "<br>";
                    echo "Investimento: ".$investimento."$";echo "<br>";
                    echo "Taxa Por Mão: ".($taxa_mao*100)."%";echo "<br>";
                    echo "Percentual Por Mão: ".($cent_mao*100)."%";echo "<br>";
                    echo "Mão: ".$mao."$";echo "<br>";
                    echo "Ganho Por Mão: ".$ganho_mao."$";echo "<br>";
                    echo "Ganho Diario: ".$ganho_dia."$";echo "<br>";
                    echo "Ganho em 6 Dias: ".$ganho_10_dia."$";echo "<br>";
                    
                    $investimento = intval(($ganho_10_dia+$investimento));
                    echo "TOTAL: ".$investimento."$";echo "<br>";
                    $investimento -= intval(($investimento*0.30));
                    echo "TOTAL -30%: ".$investimento."$";echo "<br>";
                }
                if( $i % 10 === 0 || $i % 26 === 0 ){
                    echo "<hr/>";
                }
            }
        }

    }
}
