<script>
    if (document.getElementsByClassName('page-header')) {
      window.onscroll = debounce(function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var oVal = (window.scrollY / 3);
        bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
      }, 6);
    }
  </script>

<script src="<?= JS_URL; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= JS_URL; ?>plugins/jkanban/jkanban.js"></script>