<?php
/* leer_musica.php — Listado simple con PDO (MySQL/MariaDB) */


$host = 'localhost';
$db   = 'dwes';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


try {
    // Conexión PDO
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);


    // Consulta (lee toda la tabla)
    $sql = "SELECT id, title, artist, genre, release_year, duration, unit_price, quantity_in_stock
            FROM ud4_musica
            ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();


} catch (Throwable $e) {
    http_response_code(500);
    die("Error: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="es">
<meta charset="utf-8">
<title>Listado ud4_musica</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"/>
<body>
<h1>Listado de canciones (ud4_musica)</h1>
<table border="1" cellpadding="6">
  <tr>
    <th>ID</th><th>Title</th><th>Artist</th><th>Genre</th>
    <th>Year</th><th>Duration</th><th>Price</th><th>Stock</th>
  </tr>
  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= htmlspecialchars($r['id']) ?></td>
      <td><?= htmlspecialchars($r['title']) ?></td>
      <td><?= htmlspecialchars($r['artist']) ?></td>
      <td><?= htmlspecialchars($r['genre'] ?? '') ?></td>
      <td><?= htmlspecialchars($r['release_year'] ?? '') ?></td>
      <td><?= htmlspecialchars($r['duration'] ?? '') ?></td>
      <td><?= number_format((float)$r['unit_price'], 2) ?></td>
      <td><?= htmlspecialchars($r['quantity_in_stock']) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>