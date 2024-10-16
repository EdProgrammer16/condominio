<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= IMG_URL; ?>bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $user['nome'].' '.$user['sobrenome']; ?>
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            <?= $user['nivel']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="material-icons text-lg position-relative">email</i>
                                    <span class="ms-1">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row mt-3">
                    <div class="col-12 col-md-6 col-xl-4 position-relative">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Configurações de Platforma</h6>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder">Conta</h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Ocultar Perfil do Public</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Permitir que outros usuarios me enviem SMS</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Permitir anuncios na minha Feed</label>
                                        </div>
                                    </li>
                                </ul>
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">Notificar se houver nova visita</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Sempre Notificar sobre Comunicados.</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0 pb-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Notificar se visita sair</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="vertical dark">
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4 position-relative">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Informações Do Usuário</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="<?= DOC_PAGE.'@'.$data['user']; ?>/edit">
                                            <i class="fas fa-user-edit fa-2x text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                                </p>
                                <hr class="horizontal gray-light my-4">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome Completo:</strong> 
                                        &nbsp; 
                                        <?= ($user['nome'] != '' && $user['sobrenome'] != '') ? $user['nome'].' '.$user['sobrenome'] : 'Indisponivél'; ?>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Telemovél:</strong> 
                                        &nbsp;
                                        Indisponivél
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> 
                                        &nbsp; 
                                        <a href="">
                                            <?= ($user['email'] != '') ? $user['email'] : 'Indisponivél'; ?>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 pb-0">
                                        <strong class="text-dark text-sm">Redes Sociais:</strong> &nbsp;
                                        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-facebook fa-lg"></i>
                                        </a>
                                        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-twitter fa-lg"></i>
                                        </a>
                                        <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-instagram fa-lg"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="vertical dark">
                    </div>
                    <div class="col-12 col-xl-4 mt-xl-0 mt-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">
                                    <?php if($user['nivel'] == 'Administrador' || $user['nivel'] == 'Técnico'){
                                        echo 'Técnicos';
                                    }else {
                                            echo 'Membros da Casa';
                                        } ?>
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                        <div class="avatar me-3">
                                            <img src="<?= IMG_URL; ?>kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Sophie B.</h6>
                                            <p class="mb-0 text-xs">Hi! I need more information..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Ver Perfil</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="<?= IMG_URL; ?>marie.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Anne Marie</h6>
                                            <p class="mb-0 text-xs">Awesome work, can you..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Ver Perfil</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="<?= IMG_URL; ?>ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Ivanna</h6>
                                            <p class="mb-0 text-xs">About files I can..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Ver Perfil</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="<?= IMG_URL; ?>team-4.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Peterson</h6>
                                            <p class="mb-0 text-xs">Have a great afternoon..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Ver Perfil</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                                        <div class="avatar me-3">
                                            <img src="<?= IMG_URL; ?>team-3.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                            <p class="mb-0 text-xs">Hi! I need more information..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Ver Perfil</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once DOC_ROOT.'app/views/includes/logged_footer.php' ?>
</div>
