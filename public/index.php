<?php
// Carrega o autoload
require DOC_ROOT . 'vendor/autoload.php';
// Inicializa o núcleo do aplicativo
$app = new Core\App();
$app->run();