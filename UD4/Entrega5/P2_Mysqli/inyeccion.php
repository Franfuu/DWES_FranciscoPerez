<?php
// conexion_mysqli.php debe proporcionar db()
require_once 'conexion_mysqli.php';
$cn = db();


// Supongamos un formulario que envía $_GET['nombre']
//$nombre = $_GET['nombre'] ?? '';
$nombre= "' OR '1'='1";
//$nombre= "Laura";


// Vulnerable: concatenación directa de usuario en la consulta
$sql = "SELECT id, nombre, cargo, salario FROM ud4_empresa WHERE nombre = '$nombre'";


$res = mysqli_query($cn, $sql);
while ($fila = mysqli_fetch_assoc($res)) {
    echo htmlspecialchars($fila['id']) . ' - ' . htmlspecialchars($fila['nombre']) . "<br>";
}
echo "<br> Se han mostrado todos los empleados si la inyección tuvo éxito.<br>";


// Cierre de conexión
mysqli_close($cn);
?>
