<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {

    header('Location: login.php?error=acceso_denegado');
    exit;
}