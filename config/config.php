<?php

// Determina o protocolo (http ou https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// Determina o host (domínio ou IP)
define('HOST', $_SERVER['HTTP_HOST']);

// Determina o caminho da aplicação (subdiretório, se houver)
$scriptName = $_SERVER['SCRIPT_NAME'];
$baseDir = dirname($scriptName);
if ($baseDir === '/' || $baseDir === '\\') {
    $baseDir = '';
} else {
    $baseDir = str_replace('\\', '/', $baseDir); // Normaliza barras
}

// Define a URL base
define('BASE_URL', $protocol . '://' . HOST . $baseDir. '/');

// Caminho absoluto para a pasta do documento
define('DOC_PAGE', '/');
// NOME DO SITE
define('TITULO_SITE', 'Condominio Website');

// Caminho absoluto para a raiz do documento
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . DOC_PAGE);

// URL de recursos estáticos (JavaScript, CSS, imagens, vídeos)
define('ASSETS', BASE_URL . 'public/assets/');
define('JS_URL', BASE_URL . 'public/assets/js/');
define('CSS_URL', BASE_URL . 'public/assets/css/');
define('IMG_URL', BASE_URL . 'public/assets/img/');
define('ARQ_URL', BASE_URL . 'public/assets/arquivos/');
define('VIDEO_URL', BASE_URL . 'public/assets/videos/');

// Configurações da Base de Dados
define('DB_HOST', 'sql210.infinityfree.com');
define('DB_USER', 'if0_37501277');
define('DB_NAME', 'if0_37501277_condominio');
define('DB_PASSWORD', 'uLhXM2jDPSQB5F7');

// Configurações de E-mail
define('EMAIL_HOST', 'smtp.example.com');
define('EMAIL_PORT', 587);
define('EMAIL_USERNAME', 'user@example.com');
define('EMAIL_PASSWORD', 'password');
define('EMAIL_FROM', 'no-reply@example.com');
define('EMAIL_FROM_NAME', 'Your Application Name');

// Outras Configurações
define('JWT_SECRET', 'JWT_KEY_HS256');
define('APP_ENV', 'development'); // Ambiente da aplicação: development, production, etc.
define('APP_DEBUG', true); // Habilita ou desabilita o modo debug

?>
