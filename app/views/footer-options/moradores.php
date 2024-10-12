<script src="<?= JS_URL; ?>plugins/datatables.js"></script>
<script src="<?= JS_URL; ?>plugins/choices.min.js"></script>
<script src="<?= JS_URL; ?>plugins/multistep-form.js"></script>
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