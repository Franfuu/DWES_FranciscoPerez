
<?php 
session_start();

$_SESSION['usuario'] = 'FranciscoPerez';

echo "Sesión iniciada. Usuario: " . $_SESSION['usuario'];
?>