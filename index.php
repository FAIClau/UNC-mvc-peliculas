<?php
require_once __DIR__ . '/controllers/PeliculaController.php';

$controller = new PeliculaController();
$accion = $_GET['action'] ?? 'listar';

switch ($accion) {
    case 'listar':
        $controller->index();
        break;
    case 'detalle':
        $controller->detalle();
        break;
    case 'cienciaFiccion':
        $controller->cienciaFiccion();
        break;
    case 'nueva':
        $controller->nueva();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    default:
        http_response_code(404);
        echo 'Acción no válida';
}
