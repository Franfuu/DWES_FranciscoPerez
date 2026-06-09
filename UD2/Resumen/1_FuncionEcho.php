<?php

//Echo sencillo, mostar en pantalla de navegador 
echo"Hola Mundo";
echo"<br>";

//Usar saltos de linea con echo, para que se vea en el navegador hay que usar la etiqueta <br>, lo otro de \n es para consola
echo "<h3>Ejemplo2 usando br</h3>";
echo "Esta es la primera linea. \n <br>";
echo "Esta es la segunda linea. \n <br>" ;
echo "Esta es la tercera linea. \n <br>";

//Otra forma de mostrar saltos de linea en el navegador es usando la función nl2br que convierte los saltos de linea \n en etiquetas <br>
echo "<h3>Ejemplo3 usando nl2br</h3>";
$textoConSaltos = "Esta es la primera linea. \n Esta es la segunda linea. \n Esta es la tercera linea. \n";
echo nl2br($textoConSaltos);


?>
