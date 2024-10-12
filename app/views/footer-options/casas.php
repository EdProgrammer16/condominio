<script src="<?= JS_URL; ?>plugins/datatables.js"></script>
<script src="<?= JS_URL; ?>plugins/choices.min.js"></script>
<script src="<?= JS_URL; ?>plugins/multistep-form.js"></script>
<script src="<?= JS_URL; ?>plugins/sweetalert.min.js"></script>
<script>
    if (document.getElementById('choices-state')) {
      var element = document.getElementById('choices-state');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };
    if (document.getElementById('choices-country')) {
      var country = document.getElementById('choices-country');
      const example = new Choices(country);
    }

    var openFile = function(event) {
      var input = event.target;

      // Instantiate FileReader
      var reader = new FileReader();
      reader.onload = function() {
        imageFile = reader.result;

        document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile + '" class="rounded-circle w-100 shadow" />';
      };
      reader.readAsDataURL(input.files[0]);
    };
</script>
<script>
    if (document.getElementById('products-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "material-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
            });
        });
    };
</script>

<script src="<?= JS_URL; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= JS_URL; ?>plugins/jkanban/jkanban.js"></script>
<script src="<?= JS_URL; ?>plugins/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#criar_casa').click(() => {
            nCasa = $('#choices-country').val();
            if(nCasa == '') {
                document.getElementById('nots').innerHTML = '<div class="alert alert-warning text-white" role="alert"><strong>Aviso!</strong> Você precisa escolher um valor para criar uma casa!</div>';
            }else {
                $('#addCasa').modal('hide');
                $.ajax({
                url: '<?= DOC_PAGE; ?>casas/create',
                type: 'post',
                data: {nCasa: nCasa},
                success: function(data) {
                    if(data.status) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: data.message,
                            icon: 'success', // Tipos: success, error, warning, info, question
                            confirmButtonText: 'Ok'
                        });   
                        let dataList = '';

                        data.lista_casas.forEach(casa => {
                            const { id, nome, representante, numero_moradores, data_entrada } = casa;
                            
                            dataList += `
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check my-auto">
                                                <input class="form-check-input" type="checkbox" id="customCheck${id}">
                                            </div>
                                            <h6 class="ms-3 my-auto">${nome}</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm">${representante ? `${representante.nome} ${representante.sobrenome}` : 'Sem Representante'}</td>
                                    <td class="text-sm">${numero_moradores}</td>
                                    <td class="text-sm">${data_entrada || 'Sem Entrada'}</td>
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
                                </tr>`;
                        });

                        // Exemplo: adicionar dataList a um elemento no DOM
                        document.getElementById('listaCasas').innerHTML = dataList;
                    }else {
                        Swal.fire({
                            title: 'Aviso!',
                            text: data.message,
                            icon: 'warning', // Tipos: success, error, warning, info, question
                            confirmButtonText: 'Ok'
                        });
                    }
                },
                error: () => {
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Erro ao enviar dados ao servidor!',
                        icon: 'error', // Tipos: success, error, warning, info, question
                        confirmButtonText: 'Ok'
                    });
                }
            })
            }
        })
    })
</script>