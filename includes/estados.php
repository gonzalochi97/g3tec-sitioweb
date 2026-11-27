<?php
// Estados de pedidos y reparaciones, y la barra de avance que se muestra al cliente

$pasos_reparacion = [
    'recibido' => 'Recibido',
    'en revision' => 'En revisión',
    'en reparacion' => 'En reparación',
    'listo para retirar' => 'Listo para retirar',
    'entregado' => 'Entregado',
];

function pasos_pedido($tipo)
{
    $pasos = [];

    if ($tipo == 'especial') {
        $pasos['pendiente'] = 'Pendiente de revisión';
        $pasos['aprobado'] = 'Aprobado';
    } else {
        $pasos['confirmado'] = 'Confirmado';
    }

    $pasos['en preparacion'] = 'En preparación';
    $pasos['enviado'] = 'Enviado / listo para retirar';
    $pasos['entregado'] = 'Entregado';

    return $pasos;
}

function numero_orden($id)
{
    return 'G3-' . str_pad($id, 4, '0', STR_PAD_LEFT);
}

function barra_estado($pasos, $estado)
{
    if ($estado == 'rechazado') {
        return '<span class="badge text-bg-danger">Rechazado</span>';
    }

    $claves = array_keys($pasos);
    $posicion = array_search($estado, $claves);

    if ($posicion === false) {
        return '<span class="badge text-bg-secondary">' . ucfirst($estado) . '</span>';
    }

    $porcentaje = round(($posicion + 1) * 100 / count($claves));

    return '<div class="small fw-semibold mb-1">' . $pasos[$estado] . '</div>'
        . '<div class="progress" style="height: 6px" role="progressbar" aria-label="Avance"'
        . ' aria-valuenow="' . $porcentaje . '" aria-valuemin="0" aria-valuemax="100">'
        . '<div class="progress-bar" style="width: ' . $porcentaje . '%; background: var(--g3-neon)"></div>'
        . '</div>';
}
