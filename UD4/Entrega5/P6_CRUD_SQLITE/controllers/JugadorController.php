<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Jugador.php';

class JugadorController
{
    private PDO $pdo;
    private Jugador $model;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->model = new Jugador($pdo);
    }

    public function index(): void
    {
        $jugadores = $this->model->all();
        $this->render('jugadores/index', compact('jugadores'));
    }

    public function crear(): void
    {
        $jugador = ['usuario' => '', 'nombre' => '', 'apellidos' => ''];
        $errors  = [];
        $this->render('jugadores/crear', compact('jugador', 'errors'));
    }

    public function store(): void
    {
        $data = [
            'usuario'   => trim($_POST['usuario']   ?? ''),
            'nombre'    => trim($_POST['nombre']    ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? '')
        ];
        [$ok, $errors] = $this->model->create($data);

        if ($ok) {
            header('Location: ?action=index');
            exit;
        }
        $jugador = $data;
        $this->render('jugadores/crear', compact('jugador', 'errors'));
    }

    public function editar(?int $id): void
    {
        if (!$id) {
            $this->badRequest('Falta id');
            return;
        }
        $jugador = $this->model->find($id);
        if (!$jugador) {
            $this->notFound();
            return;
        }
        $errors = [];
        $this->render('jugadores/editar', compact('jugador', 'errors'));
    }

    public function update(?int $id): void
    {
        if (!$id) {
            $this->badRequest('Falta id');
            return;
        }
        $data = [
            'usuario'   => trim($_POST['usuario']   ?? ''),
            'nombre'    => trim($_POST['nombre']    ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? '')
        ];
        [$ok, $errors] = $this->model->update($id, $data);
        if ($ok) {
            header('Location: ?action=index');
            exit;
        }
        $jugador = array_merge(['id' => $id], $data);
        $this->render('jugadores/editar', compact('jugador', 'errors'));
    }

    public function eliminar(?int $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            header('Allow: POST');
            echo 'Método no permitido';
            return;
        }
        if (!$id) {
            $this->badRequest('Falta id');
            return;
        }
        $this->model->delete($id);
        header('Location: ?action=index');
    }

    private function render(string $view, array $vars = []): void
    {
        extract($vars);
        require __DIR__ . '/../views/' . $view . '.php';
    }

    private function badRequest(string $msg): void
    {
        http_response_code(400);
        echo '400 - ' . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo '404 - Jugador no encontrado';
    }
}
