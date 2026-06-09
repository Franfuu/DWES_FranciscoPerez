<?php
//Tipos de datos en PHP, toda las variables en PHP son de tipo dinámico, no es necesario declarar el tipo de dato
//Todas las variables en PHP empiezan por $ y deben de empezar con _

$_edad = 25; //entero
$_altura = 1.75; //decimal
$_nombre = "Francisco"; //cadena de texto
$_esEstudiante = true; //booleano
$_frutas = array("Manzana", "Banana", "Naranja"); //array, aqui hay que dponer array 
$_vacio = null; //

$nombre = 5; // Se puede cambiar el tipo de dato de una variable, ya que no tiene un tipo fijo un entero puede convertirse 
            // en cadena de texto etc..

class Persona
{
    public $_nombre;
    public $_apellido;
    public function __construct($_nombre, $_apellido){
        $this->nombre = $_nombre;
        $this->apellido = $_apellido;
    }
}



//Ambito de las variables, desde que parte se pueden acceder a las variables

//Globales, se pueden acceder desde cualquier parte del código
$variableGlobal = "Soy una variable global";

//Locales, solo se pueden acceder desde dentro de una función
function miFuncion() {
    $variableLocal = "Soy una variable local";
    echo $variableLocal; 
}

//Estaticas, se mantienen en memoria aunque la función haya terminado, no se pueden declarar fuera de funciones
function contador() {
    static $cuenta = 0; 
    $cuenta++;
    echo "Cuenta: $cuenta <br>";
}
contador(); // Cuenta: 1
contador(); // Cuenta: 2
contador(); // Cuenta: 3


?>