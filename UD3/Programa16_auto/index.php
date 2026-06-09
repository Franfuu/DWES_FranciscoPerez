<?php 
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

$u = new User();
$p = new Product();


?>