<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejemplo Superglobales PHP</title>
</head>
<body>
  <h1>Ejemplo de Superglobales en PHP</h1>

  <h2>1. $_SERVER</h2>
  <pre><?php print_r( $_SERVER ); ?></pre> <!-- HUECO 1 -->

  <h2>2. $_GET</h2>
  <form method="get">
      <label>Nombre (GET): <input type="text" name="nombre"></label>
      <input type="submit" value="Enviar GET">
  </form>
  <pre><?php print_r( $_GET ); ?></pre> <!-- HUECO 2 -->

  <h2>3. $_POST</h2>
  <form method="post">
      <label>Edad (POST): <input type="number" name="edad"></label>
      <input type="submit" value="Enviar POST">
  </form>
  <pre><?php print_r( $_POST ); ?></pre> <!-- HUECO 3 -->

  <h2>4. $_REQUEST</h2>
  <pre><?php print_r( $_REQUEST ); ?></pre> <!-- HUECO 4 -->

  <h2>5. $_FILES</h2>
  <form method="post" enctype="multipart/form-data">
      <label>Subir archivo: <input type="file" name="archivo"></label>
      <input type="submit" value="Enviar Archivo">
  </form>
  <pre><?php print_r( $_FILES ); ?></pre> <!-- HUECO 5 -->

  <h2>6. $_ENV</h2>
  <pre><?php print_r( $_ENV ); ?></pre> <!-- HUECO 6 -->

  <h2>7. $_GLOBALS</h2>
  <pre><?php print_r( $_GLOBALS ); ?></pre> <!-- HUECO 7 -->

  <h2>8. $_COOKIE</h2>
  <pre><?php print_r( $_COOKIE ); ?></pre> <!-- HUECO 8 -->

  <h2>9. $_SESSION</h2>
  <pre><?php print_r( $_SESSION ); ?></pre> <!-- HUECO 9 -->

</body>
</html>