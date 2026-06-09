<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Procesar datos en la misma página que el formulario -->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Desarrollo Web</title>
</head>

<body>
    <?php

    //Se muestrta solo si se ha pulsado el botón ENVIAR (isset)
    // COMPROBACIÓN 1
    // Compruebo que se haya seleccionado al menos un módulo y que el nombre NO esté vacío para MOSTRAR los datos, 
    // antes comprobabamos solo si se había pulsado enviar
    if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $modulos = $_POST['modulos'];
        print "Nombre: " . $nombre . "<br />";
        foreach ($modulos as $modulo) {  //Warning key undefined
            print "Modulo: " . $modulo . "<br />";
        }
    } else {
        ?> <!-- ACTION: le indicamos PHP_SELF ya que se va a REDIRIGIR a este mismo archivo -->
        <form name="input" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            Nombre del alumno:
            <!-- COMPROBACION 2: Si pulsas botón enviar con el nombre, te lo mantiene en el formulario-->
            <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']))
                echo $_POST['nombre']; ?>" />

            <?php
            //COMPROBACION 3: En este caso, se ha pulsado el botón ENVIAR pero no se ha introducido un nombre: 
            if (isset($_POST['enviar']) && empty($_POST['nombre']))
                //Imprimo el error en PHP
                echo "<span style='color:red'> <-- Debe introducir un nombre!!</span>";
            ?>

            <p>Módulos que cursa:</p>

            <?php // Muestro Error Si no están vacias tras pulsar el botón enviar
                //COMPROBACION 4: Si pulsamos enviar sin escoger algún módulo (vacio): imprimo el ERROR 
                if (isset($_POST['enviar']) && empty($_POST['modulos']))
                    echo "<span style='color:red'> <-- Debe escoger al menos uno!!</span>"
                        ?>
                <input type="checkbox" name="modulos[]" value="DWES" />
                <?php
                //COMPROBACIÓN 5: Si hemos seleccionado algún módulo, buscamos si este primer módulo fue seleccionado para marcarlo
                if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos']))
                    echo 'checked="checked"';
                ?>
            Desarrollo web en entorno servidor<br />
            <input type="checkbox" name="modulos[]" value="DWEC" />
            <?php
            //COMPROBACIÓN 6: Si hemos seleccionado algún módulo, buscamos si este primer módulo fue seleccionado para marcarlo
        
            if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos']))
                echo 'checked="checked"';

            ?>
            Desarrollo web en entorno cliente<br />
            <br />

            <!-- Ahora el botón submit tiene un atributo name "boton_enviar" -->
            <input type="submit" value="Enviar" name="boton_enviar" />
        </form>
        <?php
    }
    ?>
</body>

</html>