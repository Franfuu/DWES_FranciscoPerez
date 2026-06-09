<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $videojuego = "Zelda";

    $genero = match ($videojuego) {
        "FIFA" => "Deportes",
        "Call of Duty" => "Shooter",
        "Zelda" => "Aventura",
        "Minecraft" => "Sandbox",
        default => "Género desconocido",
    };

    echo "El juego $videojuego pertenece al género: $genero";
    ?>
    <br><br>

    <?php
    $usuario = "Carlos";
    $rol = "admin";

    $mensaje = match ($rol) {
        "admin" => "Hola $usuario, tienes acceso completo al sistema.",
        "editor" => "Hola $usuario, puedes editar contenido.",
        "invitado" => "Hola $usuario, solo puedes ver la información.",
        default => "Rol desconocido para $usuario.",
    };

    echo $mensaje;
    ?>
    <br>
    <?php
    $food = 'cake';

    $return_value = match ($food) {
        'apple' => 'This food is an apple',
        'bar' => 'This food is a bar',
        'cake' => 'This food is a cake',
    };

    var_dump($return_value);
    ?>
</body>

</html>