<?php
// Solo deja pasar a usuarios con rol Administrador (id_rol = 1)
require_once __DIR__ . '/auth_guard.php';

if ($_SESSION['rol'] != 1) {
    header('Location: ../cuenta.php?error=sin_permiso');
    exit;
}
