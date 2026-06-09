<head>
<meta charset="utf-8">
<title>Login 2</title>
</head>

<body>
<?php

//PARTE 2
    session_start();  //PARTE2

    print "<h1>Zona Usuarios Registrados </h1><br>";


    // AMPLIA este ejercicio mostrando el nombre del usuario registrado

    print "<h2> Hola, muestra aquí el nombre del usuario registrado </h2>";


    print "<br> Info importante de tu sesión ..." ;

    print "<br> Usuario: " . $_SESSION["usuario"] . "<br>";
    print "<br> ID Sesión: " . session_id() . "<br>";
    print "<br> Fecha y hora de acceso: " . date("d/m/Y H:i:s") . "<br>";


?>




</body>
</html>