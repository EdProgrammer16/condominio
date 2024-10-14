<body class="bg-gray-200">
    <?php require_once DOC_ROOT.'app/views/includes/navbar.php' ?>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card">
                            <div class="card-header text-center py-0">
                                <div class="mt-n5">
                                    <img class="avatar avatar-xxl shadow-lg" alt="Image placeholder" src="<?= IMG_URL; ?>team-4.jpg">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h4 class="mb-0 font-weight-bolder"><?= $user['nome'].' '.$user['sobrenome'];?></h4>
                                <p class="mb-4">Use apenas a sua Palavra-passe para Logar.</p>
                                <form role="form">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Palavra-passe</label>
                                        <input type="password" class="form-control">
                                    </div>
                                        <div class="text-center">
                                        <button type="button" class="btn btn-lg bg-gradient-dark mt-4 mb-0">Desbloquear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
