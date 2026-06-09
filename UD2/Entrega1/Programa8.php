<?php
// --- Constantes propias ---
const DEPORTE = "Calistenio";
const EQUIPO  = "LZKREW";
const ESTADIO = "Gran Arena";
const AFORO   = 50000;

// --- Constantes predefinidas de PHP ---
$constantes_php = [
    "PHP_VERSION" => PHP_VERSION,
    "PHP_OS"      => PHP_OS,
    "__FILE__"    => __FILE__,
];

// --- Constantes propias en array para analizarlas ---
$constantes_propias = [
    "deporte" => DEPORTE,
    "equipo"  => EQUIPO,
    "estadio" => ESTADIO,
    "aforo"   => AFORO,
];

// --- Variables de ejemplo ---
$jugadores = ["Pedro", "Francisco", "Luis"];  // array
$goles     = 3;                          // entero
$capitan   = "Carlos";                   // string
$esLocal   = true;                       // booleano
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= EQUIPO ?> - <?= DEPORTE ?></title>
  <style>
    table { border-collapse: collapse; margin: 1em 0; }
    th, td { border: 1px solid #999; padding: .4em .8em; }
    th { background: #eee; }
  </style>
</head>
<body>
  <h1><?= EQUIPO ?> (<?= DEPORTE ?>)</h1>
  <p>Estadio: <strong><?= ESTADIO ?></strong></p>
  <p>Aforo máximo: <strong><?= AFORO ?></strong> espectadores</p>

  <h2>Constantes de PHP</h2>
  <table>
    <tr>
      <th>Nombre</th><th>Valor</th><th>gettype</th><th>is_string</th><th>is_int</th>
    </tr>
    <?php foreach ($constantes_php as $nombre => $valor): ?>
    <tr>
      <td><?= $nombre ?></td>
      <td><?= $valor ?></td>
      <td><?= gettype($valor) ?></td>
      <td><?= is_string($valor) ? "sí" : "no" ?></td>
      <td><?= is_int($valor) ? "sí" : "no" ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h2>Constantes propias</h2>
  <table>
    <tr>
      <th>Nombre</th><th>Valor</th><th>gettype</th><th>is_string</th><th>is_int</th>
    </tr>
    <?php foreach ($constantes_propias as $nombre => $valor): ?>
    <tr>
      <td><?= $nombre ?></td>
      <td><?= $valor ?></td>
      <td><?= gettype($valor) ?></td>
      <td><?= is_string($valor) ? "sí" : "no" ?></td>
      <td><?= is_int($valor) ? "sí" : "no" ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h2>Variables de ejemplo</h2>
  <table>
    <tr>
      <th>Nombre</th><th>Valor</th><th>gettype</th><th>is_array</th><th>is_integer</th><th>is_string</th><th>is_bool</th>
    </tr>
    <tr>
      <td>$jugadores</td>
      <td><?= implode(", ", $jugadores) ?></td>
      <td><?= gettype($jugadores) ?></td>
      <td><?= is_array($jugadores) ? "sí" : "no" ?></td>
      <td><?= is_integer($jugadores) ? "sí" : "no" ?></td>
      <td><?= is_string($jugadores) ? "sí" : "no" ?></td>
      <td><?= is_bool($jugadores) ? "sí" : "no" ?></td>
    </tr>
    <tr>
      <td>$goles</td>
      <td><?= $goles ?></td>
      <td><?= gettype($goles) ?></td>
      <td><?= is_array($goles) ? "sí" : "no" ?></td>
      <td><?= is_integer($goles) ? "sí" : "no" ?></td>
      <td><?= is_string($goles) ? "sí" : "no" ?></td>
      <td><?= is_bool($goles) ? "sí" : "no" ?></td>
    </tr>
    <tr>
      <td>$capitan</td>
      <td><?= $capitan ?></td>
      <td><?= gettype($capitan) ?></td>
      <td><?= is_array($capitan) ? "sí" : "no" ?></td>
      <td><?= is_integer($capitan) ? "sí" : "no" ?></td>
      <td><?= is_string($capitan) ? "sí" : "no" ?></td>
      <td><?= is_bool($capitan) ? "sí" : "no" ?></td>
    </tr>
    <tr>
      <td>$esLocal</td>
      <td><?= $esLocal ? "true" : "false" ?></td>
      <td><?= gettype($esLocal) ?></td>
      <td><?= is_array($esLocal) ? "sí" : "no" ?></td>
      <td><?= is_integer($esLocal) ? "sí" : "no" ?></td>
      <td><?= is_string($esLocal) ? "sí" : "no" ?></td>
      <td><?= is_bool($esLocal) ? "sí" : "no" ?></td>
    </tr>
  </table>
</body>
</html>