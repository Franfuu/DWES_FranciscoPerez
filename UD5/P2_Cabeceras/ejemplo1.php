<?php
    header('Content-Type: application/json');

    $data = [
        "nombre" => "Francisco",
        "edad" => 25,
        "ciudad" => "Madrid"
    ];


    echo json_encode($data);
?>
