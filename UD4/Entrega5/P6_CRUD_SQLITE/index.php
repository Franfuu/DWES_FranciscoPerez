<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/controllers/JugadorController.php';

$controller = new JugadorController($pdo);

$action = $_GET['action'] ?? 'index';
$id     = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

switch ($action) {
  case 'index':    $controller->index(); break;
  case 'crear':    $controller->crear(); break;
  case 'store':    $controller->store(); break;
  case 'editar':   $controller->editar($id); break;
  case 'update':   $controller->update($id); break;
  case 'eliminar': $controller->eliminar($id); break;
  default:
    http_response_code(404);
    echo '404 - Acción no encontrada';
}