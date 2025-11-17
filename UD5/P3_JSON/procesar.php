<?php
// Verificar si se han enviado datos a través de POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos enviados a través del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;


    // Comprobar si ambos campos han sido enviados
    if ($nombre && $email) {
        // Crear un array con los datos para la respuesta
        $respuesta = [
            'status' => 'success',
            'mensaje' => 'Datos recibidos correctamente.',
            'datos' => [
                'nombre' => $nombre,
                'email' => $email
            ]
        ];
    } else {
        // Responder con un error si los datos no están completos
        $respuesta = [
            'status' => 'error',
            'mensaje' => 'Faltan datos en la solicitud.'
        ];
    }


    // Establecer la cabecera Content-Type a application/json
    header('Content-Type: application/json');


    // Enviar la respuesta en formato JSON
    echo json_encode($respuesta);
}
?>
