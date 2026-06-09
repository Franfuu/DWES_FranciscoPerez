<?php
class ClaseSencilla
{
    public $numero = '10';

    public function mostrarVar() {
        echo ("Francisco va a sacar ") . $this->numero . " en PHP";
    }
}

$obj = new ClaseSencilla();
$obj->mostrarVar(); 
?>