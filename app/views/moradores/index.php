<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Lista de Moradores</h5>
                                <p class="text-sm mb-0">Exibindo todos os moradores do Condominio.</p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="<?= DOC_PAGE; ?>moradores/add" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Novo Morador</a>
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
                                        <th>Idade</th>
                                        <th>Tipo de Morador</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        // function gerarIdentidade() {
                                        //     $letras = ['LA', 'HZ', 'CO', 'ZN', 'DZ'];
                                        //     $numero = rand(1000000000, 9999999999).$letras[array_rand($letras)].rand(100, 999);
                                            
                                        //     return  $numero;
                                        // }

                                        // // Função para definir tipo de morador aleatoriamente
                                        // function gerarTipoMorador() {
                                        //     $tipos = ['Morador Comum', 'Representante'];

                                        //     return $tipos[array_rand($tipos)];
                                        // }

                                        // // Criando o array de moradores
                                        // $moradores = [];

                                        // for ($i = 1; $i <= 20; $i++) {
                                        //     $moradores[] = [
                                        //         'id' => $i,
                                        //         'nome_completo' => gerarNomeCompleto(),
                                        //         'numero_casa' => gerarNumeroCasa(),
                                        //         'numero_moradores' => gerarIdentidade(), // Número aleatório de moradores na casa (1 a 6)
                                        //         'idade' => rand(18, 65), // Idade aleatória entre 18 e 65 anos
                                        //         'tipo_morador' => gerarTipoMorador()
                                        //     ];
                                        // }
                                    ?>
                                    <?php foreach($moradores as $key): extract($key); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox" id="customCheck<?= $id; ?>">
                                                </div>
                                                <img class="w-5 ms-3 shadow-lg rounded-circle" src="<?= IMG_URL; ?>team-<?= rand(1, 5); ?>.jpg" alt="hoodie">
                                                <h6 class="ms-3 my-auto"><?= $nome.' '.$sobrenome; ?></h6>
                                            </div>
                                        </td>
                                        <td class="text-sm"><?= $n_casa; ?></td>
                                        <td class="text-sm"><?= $identidade ?? 'Desconhecido'; ?></td>
                                        <td class="text-sm">
                                            <?php 
                                            if($data_nascimento){ 
                                                $dataNascimento = new DateTime($data_nascimento);
                                                $dataAtual = new DateTime();
                                                echo $idade = $dataAtual->diff($dataNascimento)->y.' Anos';
                                            }else {
                                                echo 'Desconhecido';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <span 
                                                class="badge <?= ($nivel == 'Representante') ? 'badge-primary': 'badge-success'; ?> badge-sm"
                                            >
                                                <?= $nivel; ?>
                                            </span>
                                        </td>
                                        <td class="text-sm">
                                            <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                            </a>
                                            <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                            </a>
                                            <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                                <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome Completo</th>
                                        <th>N° Casa</th>
                                        <th>Identidade</th>
                                        <th>Idade</th>
                                        <th>Tipo de Morador</th>
                                        <th>Action</th>
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