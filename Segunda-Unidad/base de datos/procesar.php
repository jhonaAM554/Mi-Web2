<?php
// Indicamos que vamos a devolver JSON
header('Content-Type: application/json; charset=utf-8');

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "usuarioajax", "12345", "ajaxbd");

// Verificar conexión
if ($mysqli->connect_errno) {
    echo json_encode(["error" => "Error al conectar a MySQL: " . $mysqli->connect_error]);
    exit();
}

// Configurar charset UTF-8
$mysqli->set_charset("utf8mb4");

// Verificar que se recibieron los datos
if (isset($_POST['nombres']) && isset($_POST['apellidos'])) {
    // Escapar los datos para evitar inyección SQL
    $nombres = $mysqli->real_escape_string($_POST['nombres']);
    $apellidos = $mysqli->real_escape_string($_POST['apellidos']);

    // Consulta para insertar
    $sql = "INSERT INTO personas (nombres, apellidos) VALUES ('$nombres', '$apellidos')";

    if ($mysqli->query($sql)) {
        echo json_encode(["success" => "Guardado con éxito", "id" => $mysqli->insert_id]);
    } else {
        echo json_encode(["error" => "Error al guardar: " . $mysqli->error]);
    }
} else {
    echo json_encode(["error" => "Faltan datos: nombres y apellidos"]);
}

// Cerrar conexión
$mysqli->close();
?>
