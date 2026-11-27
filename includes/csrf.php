<?php
// Token CSRF: los formularios POST solo se aceptan si traen el token de la sesion
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

function campo_csrf()
{
    return '<input type="hidden" name="token" value="' . $_SESSION['token'] . '" />';
}

function verificar_csrf()
{
    if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
        http_response_code(403);
        exit('La sesión expiró o el formulario no es válido. Volvé atrás, recargá la página e intentá de nuevo.');
    }
}
