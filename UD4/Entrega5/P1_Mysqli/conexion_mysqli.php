<?php
// 1. CONEXIÓN con la BBDD:
// "SERVIDOR", "USUARIO", "CONTRASEÑA", "BASE DE DATOS"


try {
    //https://www.php.net/manual/es/function.mysqli-connect.php
    $conexion = mysqli_connect("localhost", "root", "", "dwes");
} catch (Exception $e) {
    echo "<br> 1. Se ha producido el siguiente error: " . $e->getMessage();
    echo "<br> 2. Falló la conexión: " . mysqli_connect_error();
    exit();
}


// 3. CONSULTA A LA BASE DE DATOS
echo "<h3>Listado de usuarios</h3>";
$consulta = "SELECT * FROM `ud4_persona`";
$listaUsuarios = mysqli_query($conexion, $consulta);
print_r($listaUsuarios);
echo "<br>";
// 4. COMPROBAMOS SI EL SERVIDOR NOS HA DEVUELTO RESULTADOS
if ($listaUsuarios) {

    // RECORREMOS CADA RESULTADO QUE NOS DEVUELVE EL SERVIDOR
    foreach ($listaUsuarios as $usuario) {
        echo "
            $usuario[id]
            $usuario[nombre]
            $usuario[apellidos]
            $usuario[telefono]
            <br>
        ";
    }
    mysqli_close($conexion);
}
