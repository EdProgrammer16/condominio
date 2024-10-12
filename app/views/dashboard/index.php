<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="javascript:;" class="btn btn-icon btn-outline-secondary ms-auto">
                    Exportar
                </a>
                <a href="<?= DOC_PAGE; ?>visitantes/add" class="btn btn-icon bg-gradient-primary ms-3">
                    +&nbsp; Nova Visita
                </a>
                <div class="dropleft ms-3">
                    <button class="btn bg-gradient-dark dropdown-toggle" type="button" id="dropdownImport" data-bs-toggle="dropdown" aria-expanded="false">
                        Hoje
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownImport">
                        <li><a class="dropdown-item" href="javascript:;">Ontem</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Uma Semana Atrás</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Mês Passado</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Ano Passado</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Moradores</p>
                            <h5 class="mb-0"><?= count($moradores); ?></h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person_add</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">visitantes</p>
                            <h5 class="mb-0"><?= count($visitantes); ?></h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">devices</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Visitas</p>
                            <h5 class="mb-0">
                                <?php 
                                    $num_visitas = 0;
                                    foreach($visitas as $visita) {
                                        if($visita['tipo'] == 'Entrada') 
                                            $num_visitas++;
                                    }
                                    echo $num_visitas;
                                ?>
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2% </span>just updated</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">filter_none</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Saídas</p>
                            <h5 class="mb-0">
                                <?php 
                                    $num_visitas = 0;
                                    foreach($visitas as $visita) {
                                        if($visita['tipo'] == 'Saida') 
                                            $num_visitas++;
                                    }
                                    echo $num_visitas;
                                ?>
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than lask month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Grafico de Visitas</h6>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-md badge-dot me-4">
                                <i class="bg-success"></i>
                                <span class="text-dark text-xs">Visitas</span>
                            </span>
                            <span class="badge badge-md badge-dot me-4">
                                <i class="bg-danger"></i>
                                <span class="text-dark text-xs">Saídas</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                        <h6 class="mb-0">Percentagem por Semana</h6>
                        <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="See which websites are sending traffic to your website">
                        <i class="material-icons text-sm">priority_high</i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-5 col-12 text-center">
                                <div class="chart mt-5">
                                    <canvas id="chart-doughnut" class="chart-canvas" height="200"></canvas>
                                </div>
                                <a class="btn btn-sm bg-gradient-secondary mt-4">Ver mais detalhes</a>
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="bg-gradient-primary py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Domingo</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 25% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="bg-gradient-secondary py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Segunda-Feira</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                        <span class="bg-gradient-success py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Terça-Feira</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 12% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                        <span class="bg-gradient-warning py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Quarta-Feira</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 37% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="bg-gradient-info py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Quinta-Feira</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="bg-gradient-danger py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Sexta-Feira</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="bg-gradient-dark py-1 rounded-circle me-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Sabado</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-5 mb-md-0">
            <div class="col-sm-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Casas Mais Visitas</h6>
                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="See how much traffic do you get from social media">
                                <i class="material-icons text-sm">priority_high</i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2 text-lg fw-bold text-capitalize ms-2">D4</span>
                                        <span class="ms-auto text-sm font-weight-normal">40%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2 text-lg fw-bold text-capitalize ms-2">B4</span>
                                        <span class="ms-auto text-sm font-weight-normal">18%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-20" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2 text-lg fw-bold text-capitalize ms-2">H13</span>
                                        <span class="ms-auto text-sm font-weight-normal">13%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-15" role="progressbar" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2 text-lg fw-bold text-capitalize ms-2">C7</span>
                                        <span class="ms-auto text-sm font-weight-normal">10%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2 text-lg fw-bold text-capitalize ms-2">A1</span>
                                        <span class="ms-auto text-sm font-weight-normal">5%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-5" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card h-100 mt-4 mt-md-0">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6>Visitas Mais Recentes</h6>
                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 ms-2 d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visualizar Lista completa.">
                                <i class="material-icons">visibility</i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nome do Visitante</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Casa de Visita</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de Visita</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hora da Visita</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado da Visita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold mb-0">João Carlos</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">D4</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">Hoje</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">06h:17min</p>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visita em curso...">
                                                <i class="material-icons text-sm">cached</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold mb-0">João Carlos</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">D4</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">Hoje</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-normal mb-0">06h:17min</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0">
                                                <button type="button" class="btn btn-icon-only btn-rounded btn-outline-success mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visita Terminada.">
                                                    <i class="material-icons text-sm">task_alt</i>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once DOC_ROOT.'app/views/includes/logged_footer.php' ?>
    </div>
</div>