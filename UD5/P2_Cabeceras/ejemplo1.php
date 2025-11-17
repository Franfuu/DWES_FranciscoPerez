<?php
header('Content-Type: text/plain');


$data = [
    "nombre" => "Juan",
    "edad" => 25,
    "ciudad" => "Madrid"
];


echo json_encode($data);
