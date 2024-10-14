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
                        <span>Informação do Visitante</span>
                      </button>
                      <button class="multisteps-form__progress-btn" type="button" title="Address">Informações de Morador</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form class="multisteps-form__form" action="<?= DOC_PAGE; ?>visitantes/create" method="POST" enctype="multipart/form-data">
                    <div class="multisteps-form__panel border-radius-xl bg-white js-active" data-animation="FadeIn">
                      <h5 class="font-weight-bolder mb-0">Sobre o Visitante</h5>
                      <p class="mb-0 text-sm">informações Obrigatórias</p>
                      <div class="multisteps-form__content">
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Nome</label>
                              <input class="multisteps-form__input form-control"  name="vnome" type="text" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Sobrenome</label>
                              <input class="multisteps-form__input form-control" name="vsobrenome" type="text" />
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Identidade (BI / Passaport)</label>
                              <input class="multisteps-form__input form-control" name="videntidade" type="text" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Telemovél</label>
                              <input class="multisteps-form__input form-control" name="vtelemovel" type="text" />
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-12 mt-4 mt-sm-0 text-start">
                              <label class="form-label mb-0 ms-0">Casa a Visitar</label>
                              <select class="form-control" name="vn_casa" id="choices-country">
                                <option value="">Escolha uma opção</option>
                                <?php foreach($casas as $key): extract($key); ?>
                                  <option value="<?= $nome; ?>"><?= $nome; ?></option>
                                <?php endforeach; ?>
                              </select>
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
                          <h5 class="font-weight-bold mb-0">Sobre o Veículo</h5>
                          <p class="mb-0 text-sm">Informações Opcionais</p>
                        </div>
                      </div>
                      <div class="multisteps-form__content">
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <select class="form-control" name="usando_carro" id="choices-state">
                              <option value="0">Usando Carro: Não</option>
                              <option value="1">Usando Carro: Sim</option>
                            </select>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Marca do Carro</label>
                              <input class="multisteps-form__input form-control" name="vmarca" type="text" />
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Modelo do Carro</label>
                              <input class="multisteps-form__input form-control" name="vmodelo" type="text" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Placa do Carro</label>
                              <input class="multisteps-form__input form-control" name="vplaca" type="text" />
                            </div>
                          </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                          <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" name="uSubmit" title="Send">Send</button>
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
  </div>
</div>