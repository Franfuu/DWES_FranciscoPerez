<?php
//Definir constantes con define 
define("PI", 3.14);
print "<p>El valor de pi es " . PI . "</p>\n";

define("AUTOR", "Echiro Oda");
print "<p>Autor: " . AUTOR . "</p>\n";

define("LIBRO", ["One Piece", "Echiro Oda", 1995]);
print "<p>" . LIBRO[1] . " escribió " . LIBRO[0] . " en " . LIBRO[2] . ".</p>\n";


//Definir constantes con const
const PIconst = 3.14;
print "<p>El valor de pi es " . PI . "</p>\n";

const AUTORconst = "Echiro Oda";
print "<p>Autor: " . AUTOR . "</p>\n";

const LIBROconst = ["One Piece", "Echiro Oda", 1995];
print "<p>" . LIBRO[1] . " escribió " . LIBRO[0] . " en " . LIBRO[2] . ".</p>\n";

define("PI", 3.14);
print "<p>El valor de pi es PI</p>\n";         // El valor NO se sustituye
print "<p>El valor de pi es {PI}</p>\n";       // El valor NO se sustituye
print "<p>El valor de pi es " . PI . "</p>\n"; // El valor SÍ se sustituye

define("PI", 3.14);
define("pi", 3.141592);
print "<p>El valor de pi es " . PI . "</p>";
print "<p>El valor de pi es " . pi . "</p>";

define("PI", 3.14);
define("PI", 3.141592);
print "<p>El valor de pi es " . PI . "</p>";


$decimales = 6;
if ($decimales == 6) {
    define("PI", 3.141592);
} else {
    define("PI", 3.14);
}
print "<p>El valor de pi es " . PI . "</p>\n";

echo "<pre>\n";
echo "Número de constantes definidas: " . count(get_defined_constants()) . "\n";
echo "</pre>\n";

/*
$decimales = 6;

if ($decimales == 6) {
    const PI = 3.141592;
} else {
    const PI = 3.14;
}

print "<p>El valor de pi es " . PI . "</p>\n";

$a = 5;
const CINCO = $a;
print "<p>CINCO es " . CINCO . "</p>\n";
*/
?>