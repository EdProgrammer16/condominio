<div class="modal fade" id="addCasa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Criar Nova Casa</h5>
                <i class="material-icons ms-3">file_upload</i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Você pode Navegar por um arquivo no computador.</p>
                <div>
                    <label class="form-label mb-0 ms-0">N° Da Casa</label>
                    <select class="form-control" name="choices-country" id="choices-country">
                        <option value="">Selecione uma Opção</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="B4">B4</option>
                        <option value="B5">B5</option>
                        <option value="C6">C6</option>
                        <option value="C7">C7</option>
                        <option value="E8">E8</option>
                        <option value="E9">E9</option>
                        <option value="E10">E10</option>
                        <option value="F11">F11</option>
                        <option value="F12">F12</option>
                        <option value="H13">H13</option>
                        <option value="H14">H14</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value id="importCheck" checked>
                    <label class="custom-control-label" for="importCheck">Aceito os termos e condições</label>
                </div>
                <div id="nots"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                <button type="button" id="criar_casa" class="btn bg-gradient-primary btn-sm">Criar Casa</button>
            </div>
        </div>
    </div>
</div>
