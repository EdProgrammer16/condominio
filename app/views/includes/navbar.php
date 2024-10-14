
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="<?= DOC_PAGE; ?>">
            <?= TITULO_SITE; ?>
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
        <li class="nav-item mx-2">
            <a role="link" href="<?= DOC_PAGE; ?>" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                Página Inicial
            </a>
        </li>
        <li class="nav-item mx-2">
            <a role="link" href="<?= DOC_PAGE; ?>condominio" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks">
                Sobre o Condominio
            </a>
        </li>
        <li class="nav-item mx-2">
            <a role="link" href="<?= DOC_PAGE; ?>comunicados" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks">
                Comunicados Publicos
            </a>
        </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= DOC_PAGE; ?>sign-in" class="btn btn-sm  bg-white  mb-0">Sign-In</a>
            </li>
        </ul>
        </div>
    </div>
</nav>