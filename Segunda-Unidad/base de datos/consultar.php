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

// Consulta
$query = "SELECT * FROM personas";
$datos = [];

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        // Guardamos los datos como objetos con nombre de campo
        $datos[] = [
            "id" => $row["id"],
            "nombres" => $row["nombres"],
            "apellidos" => $row['apellidos']
        ];
    }
    $result->free();
} else {
    echo json_encode(["error" => "Error en la consulta: " . $mysqli->error]);
    exit();
}

// Devolver JSON
echo json_encode($datos, JSON_UNESCAPED_UNICODE);

// Cerrar conexión
$mysqli->close();
?>

