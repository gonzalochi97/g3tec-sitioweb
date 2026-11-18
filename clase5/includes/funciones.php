<?php
// Limpia un dato recibido del formulario antes de usarlo o mostrarlo
function limpiar($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    return htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
}
