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
<script src="<?= JS_URL; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= JS_URL; ?>plugins/jkanban/jkanban.js"></script>