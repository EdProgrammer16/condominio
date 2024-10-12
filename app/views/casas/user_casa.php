<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Lista de Casas</h5>
                                <p class="text-sm mb-0">Exibindo todas as casas que <span class="fw-bold"><?= $username; ?></span> Pertence.</p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                        Importar
                                    </button>
                                    <?php require_once DOC_ROOT.'app/views/includes/modals/import.php' ?>
                                    <?php require_once DOC_ROOT.'app/views/includes/modals/addCasa.php' ?>
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
                                        <th class="text-center">N° Casa</th>
                                        <th class="text-center">Representante</th>
                                        <th class="text-center">N° Moradores</th>
                                        <th class="text-center">Data de Entrada</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="listaCasas">
                                    <?php
                                        // Função para gerar nomes aleatórios
                                        // function gerarNomeCompleto() {
                                        //     $nomes = ['João', 'Maria', 'Carlos', 'Ana', 'Pedro', 'Lucas', 'Fernanda', 'José', 'Juliana', 'Ricardo', 'Mariana', 'Gabriel', 'Larissa', 'Tiago', 'Rafaela'];
                                        //     $sobrenomes = ['Silva', 'Souza', 'Pereira', 'Oliveira', 'Lima', 'Costa', 'Almeida', 'Ribeiro', 'Fernandes', 'Barbosa'];

                                        //     return $nomes[array_rand($nomes)] . ' ' . $sobrenomes[array_rand($sobrenomes)];
                                        // }

                                        // // Função para gerar número da casa (Ex: C2, H13)
                                        // function gerarNumeroCasa() {
                                        //     $letras = ['C', 'H', 'A', 'B', 'D'];
                                        //     $numero = rand(1, 20);
                                            
                                        //     return $letras[array_rand($letras)] . $numero;
                                        // }


                                        // // Função para gerar número da casa (Ex: C2, H13)
                                        // function gerarTempoEntrada() {
                                        //     $dia = rand(1, 31); $dia = $dia < 10 ? intval('0').$dia : $dia;
                                        //     $mes = rand(1, 12); $mes = $mes < 10 ? intval('0').$mes : $mes;
                                        //     $ano = rand(2009, 2024);
                                            
                                        //     return $dia.'/'.$mes.'/'.$ano;
                                        // }

                                        // // Criando o array de moradores
                                        // $casas = [];

                                        // for ($i = 1; $i <= 20; $i++) {
                                        //     $casas[] = [
                                        //         'id' => $i,
                                        //         'numero_casa' => gerarNumeroCasa(),
                                        //         'nome_completo' => gerarNomeCompleto(),
                                        //         'numero_moradores' => rand(1, 6), // Número aleatório de moradores na casa (1 a 6)
                                        //         'tempo_entrada' => gerarTempoEntrada(), // Idade aleatória entre 18 e 65 anos
                                        //     ];
                                        // }
                                    ?>
                                    <?php foreach($casas as $key): extract($key); ?>
                                    <tr>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox" id="customCheck<?= $id; ?>">
                                                </div>
                                                <h6 class="ms-2 my-auto"><?= $nome; ?></h6>
                                            </div>
                                        </td>
                                        <td class="text-sm text-center"><?= $representante ? $representante['nome'].' '.$representante['sobrenome'] : 'Sem Representante'; ?></td>
                                        <td class="text-sm text-center"><?= $numero_moradores; ?></td>
                                        <td class="text-sm text-center"><?= $data_entrada ?? 'Sem Entrada'; ?></td>
                                        <td class="text-center">
                                            <a href="javascript:;" class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Ver Mais Detalhes">
                                                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                            </a>
                                            <?php if($user['nivel'] !== 'Morador Comum'): ?>
                                            <a href="javascript:;" class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Deletar Casa">
                                                <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">N° Casa</th>
                                        <th class="text-center">Representante</th>
                                        <th class="text-center">N° Moradores</th>
                                        <th class="text-center">Data de Entrada</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
                            document.write(new Date().getFullYear())
                            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
            </div>
            </div>
            <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
            </li>
            </ul>
            </div>
            </div>
            </div>
        </footer>
    </div>
</div>