<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Lista de Visitantes</h5>
                                <p class="text-sm mb-0">Exibindo todos os visitantes da Casa.</p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                        Importar
                                    </button>
                                    <?php require_once DOC_ROOT.'app/views/includes/modals/import.php' ?>
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Exportar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="products-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nome Completo</th>
                                        <th>N° Casa</th>
                                        <th>Identidade</th>
                                        <th>Telemovél</th>
                                        <th>Tipo de Operação</th>
                                        <th>Data e Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Função para gerar nomes aleatórios
                                        function gerarNomeCompleto() {
                                            $nomes = ['João', 'Maria', 'Carlos', 'Ana', 'Pedro', 'Lucas', 'Fernanda', 'José', 'Juliana', 'Ricardo', 'Mariana', 'Gabriel', 'Larissa', 'Tiago', 'Rafaela'];
                                            $sobrenomes = ['Silva', 'Souza', 'Pereira', 'Oliveira', 'Lima', 'Costa', 'Almeida', 'Ribeiro', 'Fernandes', 'Barbosa'];

                                            return $nomes[array_rand($nomes)] . ' ' . $sobrenomes[array_rand($sobrenomes)];
                                        }

                                        // Função para gerar número da casa (Ex: C2, H13)
                                        function gerarNumeroCasa() {
                                            $letras = ['C', 'H', 'A', 'B', 'D'];
                                            $numero = rand(1, 20);
                                            
                                            return $letras[array_rand($letras)] . $numero;
                                        }

                                        // Função para gerar número da casa (Ex: C2, H13)
                                        function gerarIdentidade() {
                                            $letras = ['LA', 'HZ', 'CO', 'ZN', 'DZ'];
                                            $numero = rand(1000000000, 9999999999).$letras[array_rand($letras)].rand(100, 999);
                                            
                                            return  $numero;
                                        }

                                        // Função para definir tipo de morador aleatoriamente
                                        function gerarTipoMorador() {
                                            $tipos = ['Entrada', 'Saída'];

                                            return $tipos[array_rand($tipos)];
                                        }

                                        // Criando o array de visitantes
                                        // $visitantes = [];

                                        // for ($i = 1; $i <= 20; $i++) {
                                        //     $visitantes[] = [
                                        //         'id' => $i,
                                        //         'nome_completo' => gerarNomeCompleto(),
                                        //         'numero_casa' => gerarNumeroCasa(),
                                        //         'numero_visitantes' => gerarIdentidade(), // Número aleatório de visitantes na casa (1 a 6)
                                        //         'idade' => rand(915000000, 950000000), // Idade aleatória entre 18 e 65 anos
                                        //         'tipo_morador' => gerarTipoMorador()
                                        //     ];
                                        // }
                                    ?>
                                    <?php foreach($visitas as $key): extract($key); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox" id="customCheck<?= $id; ?>">
                                                </div>
                                                <h6 class="ms-3 my-auto"><?= $nome.' '.$sobrenome; ?></h6>
                                            </div>
                                        </td>
                                        <td class="text-sm"><?= $numero_casa; ?></td>
                                        <td class="text-sm"><?= $identidade; ?></td>
                                        <td class="text-sm"><?= $telemovel; ?></td>
                                        <td>
                                            <span 
                                                class="badge <?= ($tipo_operacao == 'saida') ? 'badge-primary': 'badge-success'; ?> badge-sm"
                                            >
                                                <?= $tipo_operacao; ?>
                                            </span>
                                        </td>
                                        <td class="text-sm">
                                            <?= $data_hora; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome Completo</th>
                                        <th>N° Casa</th>
                                        <th>Identidade</th>
                                        <th>Telemovél</th>
                                        <th>Tipo de Operação</th>
                                        <th>Data e Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once DOC_ROOT.'app/views/includes/logged_footer.php' ?>
    </div>
</div>