<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Default Title', ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description ?? 'Default description', ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords ?? 'default, keywords', ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= IMG_URL; ?>apple-icon.png">
    <link rel="icon" type="image/png" href="<?= IMG_URL; ?>img/favicon.png">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="<?= CSS_URL; ?>nucleo-icons.css" rel="stylesheet" />
    <link href="<?= CSS_URL; ?>nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="<?= CSS_URL; ?>material-dashboard.min.css?v=3.0.6" rel="stylesheet" />
    <link rel="stylesheet" href="<?= CSS_URL; ?>style.css">
    <?php 
        if( $header !== null )
            include DOC_ROOT . 'app/views/header-options/'. $header .'.php'; // Inclui as opções de cabeçalho 
        
    ?>
</head>

<?php $this->render($view); ?>
    <script src="<?= JS_URL; ?>core/popper.min.js"></script>
    <script src="<?= JS_URL; ?>core/bootstrap.min.js"></script>
    <script src="<?= JS_URL; ?>plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= JS_URL; ?>plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= JS_URL; ?>plugins/parallax.min.js"></script>
    <script src="<?= JS_URL; ?>script.js"></script>
    <?php 
        if($footer !== null) 
            include DOC_ROOT . 'app/views/footer-options/'. $footer .'.php'; // Inclui as opções de Rodapé
    ?>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="<?= JS_URL; ?>material-dashboard.min.js?v=3.0.6"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"80adceb1afe577d9","version":"2023.8.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>
</body>
</html>