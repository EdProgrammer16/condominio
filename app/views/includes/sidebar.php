<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= DOC_PAGE; ?>">
            <img src="<?= IMG_URL; ?>logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white"><?= TITULO_SITE; ?></span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
                <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false">
                    <img src="<?= IMG_URL; ?>team-3.jpg" class="avatar">
                    <span class="nav-link-text ms-2 ps-1"><?= $user['nome'].' '.$user['sobrenome'];?></span>
                </a>
                <div class="collapse" id="ProfileNav">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= DOC_PAGE.'@'.$data['user']; ?>">
                                <span class="sidenav-mini-icon text-uppercase"> @ </span>
                                <span class="sidenav-normal  ms-3  ps-1"> <?= '@'.$data['user']; ?> </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="<?= DOC_PAGE.'@'.$data['user']; ?>/settings">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-3  ps-1">Configurações </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="<?= DOC_PAGE.'@'.$data['user']; ?>/logout">
                                <span class="sidenav-mini-icon"> <i class="fa fa-power-off text-danger" aria-hidden="true"></i> </span>
                                <span class="sidenav-normal text-danger ms-3  ps-1"> Terminar Sessão </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="horizontal light mt-0">
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>home" class="nav-link text-white <?= ($currentPage == 'home') ? 'bg-gradient-primary active': ''; ?>" aria-controls="dashboardsExamples" role="link">
                    <i class="material-icons-round opacity-10">nat</i>
                    <span class="nav-link-text ms-2 ps-1">Página Inicial</span>
                </a>
            </li>
            <?php if($user['nivel'] === 'Administrador' || $user['nivel'] === 'Tecnico'): ?>
                <li class="nav-item">
                    <a href="<?= DOC_PAGE; ?>dashboard" class="nav-link text-white <?= ($currentPage == 'dashboard') ? 'bg-gradient-primary active': ''; ?>" aria-controls="dashboardsExamples" role="link">
                        <i class="material-icons-round opacity-10">dashboard</i>
                        <span class="nav-link-text ms-2 ps-1">Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a 
                    href="
                    <?php 
                        if($user['nivel'] === 'Representante' || $user['nivel'] === 'Morador Comum'):
                            echo DOC_PAGE.'casas/@'.$user['username']; 
                        else: echo DOC_PAGE.'casas'; 
                        endif;
                    ?>" 
                    class="nav-link text-white <?= ($currentPage == 'casas') ? 'bg-gradient-primary active': ''; ?>" 
                    role="link">
                    <i class="material-icons-round opacity-10">house</i>
                    <span class="nav-link-text ms-2 ps-1">Casas</span>
                </a>
            </li>
            <?php if($user['nivel'] === 'Administrador'): ?>
                <li class="nav-item">
                    <a href="<?= DOC_PAGE; ?>tecnicos" class="nav-link text-white <?= ($currentPage == 'tecnicos') ? 'bg-gradient-primary active': ''; ?>" aria-controls="dashboardsExamples" role="link">
                        <i class="fas fa-user-edit fa-sm opacity-10" style="font-size: 1.33333em;line-height: .75em;vertical-align: -.0667em;"></i>
                        <span class="nav-link-text ms-2 ps-1">Técnicos</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a 
                    href="
                    <?php 
                        if($user['nivel'] === 'Representante' || $user['nivel'] === 'Morador Comum'):
                            echo DOC_PAGE.'moradores/@'.$user['username']; 
                        else: echo DOC_PAGE.'moradores'; 
                        endif;
                    ?>" class="nav-link text-white <?= ($currentPage == 'moradores') ? 'bg-gradient-primary active': ''; ?>" 
                    role="link">
                    <i class="material-icons-round opacity-10">person</i>
                    <span class="nav-link-text ms-2 ps-1">Moradores</span>
                </a>
            </li>
            <li class="nav-item">
                <a 
                    href="
                    <?php 
                        if($user['nivel'] === 'Representante' || $user['nivel'] === 'Morador Comum'):
                            echo DOC_PAGE.'visitantes/@'.$user['username']; 
                        else: echo DOC_PAGE.'visitantes'; 
                        endif;
                    ?>" 
                    class="nav-link text-white <?= ($currentPage == 'visitantes') ? 'bg-gradient-primary active': ''; ?>" 
                    role="link">
                    <i class="material-icons-round opacity-10">person_add</i>
                    <span class="nav-link-text ms-2 ps-1">Visitantes</span>
                </a>
            </li>
            <?php if(false): ?>
            <li class="nav-item mt-3">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">PÁGINAS</h6>
            </li>
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>anuncios" class="nav-link text-white <?= ($currentPage == 'anuncios') ? 'bg-gradient-primary active': ''; ?>" role="link">
                    <i class="material-icons-round ">notifications</i>
                    <span class="nav-link-text ms-2 ps-1">Anúncios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>comunicados" class="nav-link text-white <?= ($currentPage == 'comunicados') ? 'bg-gradient-primary active': ''; ?>" role="link">
                    <i class="material-icons-round ">announcement</i>
                    <span class="nav-link-text ms-2 ps-1">Comunicados</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>denuncias" class="nav-link text-white <?= ($currentPage == 'denuncias') ? 'bg-gradient-primary active': ''; ?>" role="link">
                    <i class="material-icons-round ">report</i>
                    <span class="nav-link-text ms-2 ps-1">Denúncias</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>info" class="nav-link text-white <?= ($currentPage == 'info') ? 'bg-gradient-primary active': ''; ?>"  role="link">
                    <i class="material-icons-round ">info</i>
                    <span class="nav-link-text ms-2 ps-1">Informações</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <hr class="horizontal light" />
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">DOCS</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link text-white " aria-controls="basicExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round ">upcoming</i>
                    <span class="nav-link-text ms-2 ps-1">Regras</span>
                </a>
                <div class="collapse " id="basicExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" href="#gettingStartedExample">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Condutas <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="gettingStartedExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/condutas/moradores" target="_blank">
                                            <span class="sidenav-mini-icon"> CM </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Moradores </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/condutas/visitantes" target="_blank">
                                            <span class="sidenav-mini-icon"> CV </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Visitantes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/condutas/vigilantes" target="_blank">
                                            <span class="sidenav-mini-icon"> CVi </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Vigilantes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/condutas/admin" target="_blank">
                                            <span class="sidenav-mini-icon"> CA </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Administrador </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#foundationExample">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Deveres <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="foundationExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/deveres/moradores" target="_blank">
                                            <span class="sidenav-mini-icon"> DM </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Moradores </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/deveres/visitantes" target="_blank">
                                            <span class="sidenav-mini-icon"> DV </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Visitantes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/deveres/vigilantes" target="_blank">
                                            <span class="sidenav-mini-icon"> DVi </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Vigilantes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="<?= DOC_PAGE; ?>regras/deveres/admin" target="_blank">
                                            <span class="sidenav-mini-icon"> DA </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Administrador </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/creativetimofficial/ct-material-dashboard-pro/blob/master/CHANGELOG.md" target="_blank">
                    <i class="material-icons-round ">receipt_long</i>
                    <span class="nav-link-text ms-2 ps-1">Changelog</span>
                </a>
            </li>
        </ul>
    </div>
</aside>