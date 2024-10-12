<div class="main-content position-relative max-height-vh-100 h-100">
    <?php require_once DOC_ROOT.'app/views/includes/navbarSidebar.php' ?>
<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="multisteps-form mb-9">
  <div class="row">
    <div class="col-12 col-lg-8 mx-auto my-5">
    </div>
  </div>

<div class="row">
<div class="col-12 col-lg-8 m-auto">
<div class="card">
  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
      <div class="multisteps-form__progress">
        <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
          <span>Informação do Usuário</span>
        </button>
        <button class="multisteps-form__progress-btn" type="button" title="Address">Informações de Morador</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form class="multisteps-form__form" action="<?= DOC_PAGE; ?>moradores/create" method="POST" enctype="multipart/form-data">
      <div class="multisteps-form__panel border-radius-xl bg-white js-active" data-animation="FadeIn">
        <h5 class="font-weight-bolder mb-0">Sobre o Usuário</h5>
        <p class="mb-0 text-sm">informações Obrigatórias</p>
        <div class="multisteps-form__content">
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Nome</label>
                <input class="multisteps-form__input form-control"  name="unome" type="text" />
              </div>
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Nome Completo</label>
                <input class="multisteps-form__input form-control" name="usobrenome" type="text" />
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Nome de Usuário</label>
                <input class="multisteps-form__input form-control" name="uusername" type="text" />
              </div>
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <div class="input-group input-group-dynamic">
                <label class="form-label">E-mail</label>
                <input class="multisteps-form__input form-control" name="uemail" type="email" />
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Identidade (BI / Passaport)</label>
                <input class="multisteps-form__input form-control" name="uidentidade" type="text" />
              </div>
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <div class="input-group input-group-dynamic focused is-focused">
                <label class="form-label">Data de Nascimento</label>
                <input class="multisteps-form__input form-control" name="udataNascimento" type="date" />
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Palavra-Passe</label>
                <input class="multisteps-form__input form-control" type="password" />
              </div>
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Repetir Palavra-Passe</label>
                <input class="multisteps-form__input form-control" type="password" />
              </div>
            </div>
          </div>
          <div class="button-row d-flex mt-4">
            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
          </div>
        </div>
      </div>

      <div class="multisteps-form__panel" data-animation="FadeIn">
        <div class="row">
          <div class="col-12">
            <h5 class="font-weight-bold mb-0">Sobre o Morador</h5>
            <p class="mb-0 text-sm">Informações Obrigatórias</p>
          </div>
        </div>
        <div class="multisteps-form__content">
          <div class="row mt-3">
            <div class="col-12 col-sm-4 text-center">
              <div class="avatar avatar-xxl position-relative">
                <img src="<?= IMG_URL; ?>team-2.jpg" class="border-radius-md" alt="team-2">
                <input type="file" id="uimagem" name="uimagem" hidden />
                <label for="uimagem" class="btn btn-icon-only bg-gradient-primary position-absolute bottom-0 end-0 mb-n2 me-n2">
                  <span class="material-icons top-0 mt-n2" data-bs-toggle="tooltip" data-bs-placement="top" title aria-hidden="true" data-bs-original-title="Carregar Imagem" aria-label="Carregar Imagem">
                    upload
                  </span>
                </label>
              </div>
            </div>
            <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start">
              <div>
                <label class="form-label mb-0 ms-0">TIpo de Morador</label>
                <select class="form-control" name="choices-state" id="choices-state">
                  <option value="Asia" selected>Morador Comum</option>
                  <option value="America">Representante</option>
                </select>
              </div>
              <div>
                <label class="form-label mb-0 ms-0">Casa Pertencente</label>
                <select class="form-control" name="choices-country" id="choices-country">
                  <option value="Argentina">A1</option>
                  <option value="Albania">B4</option>
                  <option value="Algeria">C7</option>
                  <option value="Andorra">H13</option>
                  <option value="Angola">F12</option>
                  <option value="Brasil">E8</option>
                </select>
              </div>
            </div>
          </div>
            <div class="button-row d-flex mt-4">
              <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
              <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
            </div>
          </div>
      </div>

<div class="multisteps-form__panel border-radius-xl bg-white" data-animation="FadeIn">
<h5 class="font-weight-bolder mb-0">Socials</h5>
<p class="mb-0 text-sm">Please provide at least one social link</p>
<div class="multisteps-form__content">
<div class="row mt-3">
<div class="col-12">
<div class="input-group input-group-dynamic">
<label class="form-label">Twitter Handle</label>
<input class="multisteps-form__input form-control" type="text" />
</div>
</div>
<div class="col-12 mt-3">
<div class="input-group input-group-dynamic">
<label class="form-label">Facebook Account</label>
<input class="multisteps-form__input form-control" type="text" />
</div>
</div>
<div class="col-12 mt-3">
<div class="input-group input-group-dynamic">
<label class="form-label">Instagram Account</label>
<input class="multisteps-form__input form-control" type="text" />
</div>
</div>
</div>
<div class="row">
<div class="button-row d-flex mt-4 col-12">
<button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
<button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
</div>
</div>
</div>
</div>

<div class="multisteps-form__panel border-radius-xl bg-white h-100" data-animation="FadeIn">
<h5 class="font-weight-bolder mb-0">Profile</h5>
<p class="mb-0 text-sm">Optional informations</p>
<div class="multisteps-form__content mt-3">
<div class="row">
<div class="col-12 mt-3">
<div class="input-group input-group-dynamic">
<textarea class="multisteps-form__textarea form-control" rows="5" placeholder="Say a few words about who you are or what you're working on."></textarea>
</div>
</div>
</div>
<div class="button-row d-flex mt-4">
<button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
<button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php require_once DOC_ROOT.'app/views/includes/logged_footer.php'; ?>
</div>
</div>