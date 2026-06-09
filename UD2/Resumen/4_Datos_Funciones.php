<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Isset, Unset y Isnull</h2>
    <p>
        Las funciones <strong>isset()</strong>, <strong>unset()</strong> e <strong>is_null()</strong> se utilizan en PHP
        para comprobar y gestionar el estado de las variables.
        La función <strong>isset()</strong> determina si una variable está definida y no es <strong>null</strong>;
        <strong>unset()</strong> destruye la variable indicada, liberando su contenido de memoria;
        y <strong>is_null()</strong> comprueba si el valor de una variable es exactamente <strong>null</strong>.
        Estas funciones son muy útiles para controlar el flujo del programa y evitar errores cuando trabajamos con
        variables que pueden o no estar inicializadas.
    </p>

    <h2>Bloque de codigo php que usa las funciones anteriores</h2>

    <?php
    //Declaro variables
    $cadena = "Hola mundo";
    $entero = 25;
    $decimal = 12.34;
    $lista = array("avión", "helicóptero", "dron");
    $nulo = null;

    //Sacamos el tipo de dato con getType
    echo "Tipo de cadena: " . gettype($cadena) . "<br>";
    echo "Tipo de entero: " . gettype($entero) . "<br>";
    echo "Tipo de decimal: " . gettype($decimal) . "<br>";
    echo "Tipo de lista: " . gettype($lista) . "<br>";
    echo "Tipo de nulo: " . gettype($nulo) . "<br><br>";

    if (is_string($cadena)) {
        echo "La variable \$cadena es una cadena<br>";
    }
    if (is_array($lista)) {
        echo "La variable \$lista es un array<br>";
    }
    if (is_float($decimal)) {
        echo "La variable \$decimal es un número decimal<br>";
    }
    if (is_int($entero)) {
        echo "La variable \$entero es un número entero<br>";
    }
    if (is_null($nulo)) {
        echo "La variable \$nulo es null<br>";
    }

    echo "<br>";

    //Cambio de tipo de variable con setType, de decimal a string
    echo "Antes de convertir: " . gettype($decimal) . "<br>";
    settype($decimal, "string");
    echo "Después de convertir: " . gettype($decimal) . "<br><br>";

    if (isset($entero)) {
        echo "La variable \$entero está definida y no es null<br>";
    } else {
        echo "La variable \$entero no está definida o es null<br>";
    }

    unset($entero);
    echo "Después de unset: " . (isset($entero) ? "existe" : "no existe") . "<br><br>";

    echo "Mostramos variable no definida: ";
    @print ($entero);
    ?>


    <h3>------------</h3>

    <h2>Constantes y constantes predefinidas</h2>
    <p>En PHP, las constantes se pueden definir de dos formas principales: usando <strong>const</strong> o
        <strong>define()</strong>.
        La palabra clave <strong>const</strong> se utiliza a nivel global o dentro de clases y es más rápida, ideal
        cuando el valor se conoce desde el inicio del script.
        Por otro lado, <strong>define()</strong> es más flexible y permite crear constantes en cualquier parte del
        código, incluso dentro de funciones o estructuras condicionales.
        Las constantes no llevan el signo <strong>$</strong>, suelen escribirse en <strong>MAYÚSCULAS</strong> y solo
        pueden contener valores de tipo <strong>integer</strong>, <strong>float</strong>, <strong>string</strong>,
        <strong>boolean</strong> o <strong>null</strong>.
    </p>
    <h3>Constantes de php</h3>
    <ul>
        <li><strong>PHP_VERSION</strong>: Muestra la versión actual de PHP que se está utilizando.</li>
        <li><strong>PHP_OS</strong>: Indica el sistema operativo en el que se está ejecutando PHP.</li>
        <li><strong>__FILE__</strong>: Devuelve la ruta y el nombre del archivo PHP actual.</li>
    </ul>
    <h3>Constantes Propias</h3>
    <ul>
        <li><strong>EQUIPO</strong>: Nombre de un equipo, por ejemplo "Los Tigres".</li>
        <li><strong>DEPORTE</strong>: Tipo de deporte, por ejemplo "Fútbol".</li>
        <li><strong>ESTADIO</strong>: Nombre del estadio, por ejemplo "Gran Arena".</li>
        <li><strong>AFORO</strong>: Capacidad máxima del estadio, por ejemplo 50000.</li>
        <li><strong>PI</strong>: Valor de la constante matemática pi, por ejemplo 3.1416.</li>
        <li><strong>IVA</strong>: Porcentaje de IVA aplicado en cálculos, por ejemplo 0.21.</li>
    </ul>

    <h3>------------</h3>

    <h3>Fechas y Horas</h3>

    <table border="1px">
        <tr>
            <th>Formato</th>
            <th>Descripción</th>
            <th>Ejemplo</th>
        </tr>
        <tr>
            <td><strong>d</strong></td>
            <td>Día del mes con dos dígitos</td>
            <td>05</td>
        </tr>
        <tr>
            <td><strong>j</strong></td>
            <td>Día del mes sin ceros iniciales</td>
            <td>5</td>
        </tr>
        <tr>
            <td><strong>z</strong></td>
            <td>Día del año (0-365)</td>
            <td>128</td>
        </tr>
        <tr>
            <td><strong>N</strong></td>
            <td>Día de la semana (1=lunes,7=domingo)</td>
            <td>4</td>
        </tr>
        <tr>
            <td><strong>w</strong></td>
            <td>Día de la semana (0=domingo,6=sábado)</td>
            <td>3</td>
        </tr>
        <tr>
            <td><strong>l</strong></td>
            <td>Nombre completo del día en inglés</td>
            <td>Thursday</td>
        </tr>
        <tr>
            <td><strong>D</strong></td>
            <td>Nombre corto del día en inglés</td>
            <td>Thu</td>
        </tr>
        <tr>
            <td><strong>W</strong></td>
            <td>Número de la semana del año</td>
            <td>18</td>
        </tr>
        <tr>
            <td><strong>m</strong></td>
            <td>Número del mes con dos dígitos</td>
            <td>05</td>
        </tr>
        <tr>
            <td><strong>n</strong></td>
            <td>Número del mes sin ceros iniciales</td>
            <td>5</td>
        </tr>
        <tr>
            <td><strong>t</strong></td>
            <td>Número de días que tiene el mes</td>
            <td>31</td>
        </tr>
        <tr>
            <td><strong>F</strong></td>
            <td>Nombre completo del mes en inglés</td>
            <td>May</td>
        </tr>
        <tr>
            <td><strong>M</strong></td>
            <td>Nombre corto del mes en inglés</td>
            <td>May</td>
        </tr>
        <tr>
            <td><strong>Y</strong></td>
            <td>Año completo (4 dígitos)</td>
            <td>2025</td>
        </tr>
        <tr>
            <td><strong>y</strong></td>
            <td>Año corto (2 dígitos)</td>
            <td>25</td>
        </tr>
        <tr>
            <td><strong>L</strong></td>
            <td>1 si el año es bisiesto, 0 si no</td>
            <td>0</td>
        </tr>
        <tr>
            <td><strong>h</strong></td>
            <td>Hora 12h con ceros</td>
            <td>03</td>
        </tr>
        <tr>
            <td><strong>H</strong></td>
            <td>Hora 24h con ceros</td>
            <td>15</td>
        </tr>
        <tr>
            <td><strong>g</strong></td>
            <td>Hora 12h sin ceros</td>
            <td>3</td>
        </tr>
        <tr>
            <td><strong>G</strong></td>
            <td>Hora 24h sin ceros</td>
            <td>15</td>
        </tr>
        <tr>
            <td><strong>a</strong></td>
            <td>am o pm minúsculas</td>
            <td>pm</td>
        </tr>
        <tr>
            <td><strong>A</strong></td>
            <td>AM o PM mayúsculas</td>
            <td>PM</td>
        </tr>
        <tr>
            <td><strong>r</strong></td>
            <td>Fecha completa RFC 2822</td>
            <td>Thu, 08 May 2025 15:45:30 +0200</td>
        </tr>
    </table>

    <h3>------------</h3>

    <h3>Variables SuperGlobales</h3>
    <p>Las <strong>variables superglobales</strong> son arrays predefinidos que están disponibles en <strong>cualquier
            parte del código</strong>, incluso dentro de funciones o métodos, y permiten acceder a información del
        servidor, formularios, sesiones y cookies.</p>

    <table border="1px">
        <tr>
            <th>Variable</th>
            <th>Descripción</th>
            <th>Ejemplo de uso</th>
        </tr>
        <tr>
            <td><strong>$_SERVER</strong></td>
            <td>Información sobre el servidor y el script en ejecución</td>
            <td>
                <pre>echo $_SERVER['SERVER_NAME'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_GET</strong></td>
            <td>Variables enviadas mediante el método GET en la URL</td>
            <td>
                <pre>echo $_GET['nombre'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_POST</strong></td>
            <td>Variables enviadas mediante el método POST desde formularios</td>
            <td>
                <pre>echo $_POST['edad'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_REQUEST</strong></td>
            <td>Combina $_GET, $_POST y $_COOKIE</td>
            <td>
                <pre>echo $_REQUEST['nombre'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_COOKIE</strong></td>
            <td>Accede a las cookies del cliente</td>
            <td>
                <pre>echo $_COOKIE['usuario'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_SESSION</strong></td>
            <td>Variables de sesión disponibles durante la sesión del usuario</td>
            <td>
                <pre>echo $_SESSION['carrito'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_FILES</strong></td>
            <td>Información sobre archivos subidos mediante formularios</td>
            <td>
                <pre>echo $_FILES['archivo']['name'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$_ENV</strong></td>
            <td>Variables de entorno del servidor</td>
            <td>
                <pre>echo $_ENV['PATH'];</pre>
            </td>
        </tr>
        <tr>
            <td><strong>$GLOBALS</strong></td>
            <td>Accede a todas las variables globales del script</td>
            <td>
                <pre>echo $GLOBALS['variable'];</pre>
            </td>
        </tr>
    </table>



</body>

</html>