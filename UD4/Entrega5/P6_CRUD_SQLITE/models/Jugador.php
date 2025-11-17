<?php
declare(strict_types=1);

class Jugador {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all(): array {
        $stmt = $this->pdo->query("SELECT id, usuario, nombre, apellidos, created_at FROM jugadores ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT id, usuario, nombre, apellidos FROM jugadores WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): array {
        $errors = $this->validate($data);
        if ($errors) { return [false, $errors]; }

        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO jugadores(usuario, nombre, apellidos)
                VALUES(:usuario, :nombre, :apellidos)
            ");
            $stmt->execute([
                ':usuario'   => $data['usuario'],
                ':nombre'    => $data['nombre'],
                ':apellidos' => $data['apellidos']
            ]);
            return [true, []];
        } catch (PDOException $e) {
            if (str_contains($e->getMessage(), 'UNIQUE')) {
                return [false, ['usuario' => 'El usuario ya existe']];
            }
            throw $e;
        }
    }

    public function update(int $id, array $data): array {
        $errors = $this->validate($data, $id);
        if ($errors) { return [false, $errors]; }

        try {
            $stmt = $this->pdo->prepare("
                UPDATE jugadores
                SET usuario = :usuario, nombre = :nombre, apellidos = :apellidos
                WHERE id = :id
            ");
            $stmt->execute([
                ':usuario'   => $data['usuario'],
                ':nombre'    => $data['nombre'],
                ':apellidos' => $data['apellidos'],
                ':id'        => $id
            ]);
            return [true, []];
        } catch (PDOException $e) {
            if (str_contains($e->getMessage(), 'UNIQUE')) {
                return [false, ['usuario' => 'El usuario ya existe']];
            }
            throw $e;
        }
    }

    public function delete(int $id): void {
        $stmt = $this->pdo->prepare("DELETE FROM jugadores WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    private function validate(array $data, ?int $id = null): array {
        $errors = [];
        if ($data['usuario'] === '')   { $errors['usuario']   = 'Usuario obligatorio'; }
        if ($data['nombre'] === '')    { $errors['nombre']    = 'Nombre obligatorio'; }
        if ($data['apellidos'] === '') { $errors['apellidos'] = 'Apellidos obligatorios'; }
        return $errors;
    }
}