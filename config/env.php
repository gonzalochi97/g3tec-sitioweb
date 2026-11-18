<?php
// Lee el archivo .env de la raiz y guarda los datos como constantes
$ruta_env = __DIR__ . '/../.env';

if (!file_exists($ruta_env)) {
    die('Falta el archivo .env. Copiá .env.example como .env y completalo.');
}

$env = parse_ini_file($ruta_env);

define('APP_NAME', $env['APP_NAME']);
define('APP_EMAIL', $env['APP_EMAIL']);
define('APP_TELEFONO', $env['APP_TELEFONO']);
define('APP_WHATSAPP', $env['APP_WHATSAPP']);
define('APP_ENV', $env['APP_ENV']);

$nombre_sitio = APP_NAME;
