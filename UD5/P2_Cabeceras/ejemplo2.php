<?php
/*
header("HTTP/1.1 404 Not Found ");
echo "Página no encontrada ";
*/
header("HTTP/1.1 500 Internal Server Error");
echo "Error interno en el servidor";
?>