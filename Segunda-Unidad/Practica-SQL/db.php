<?php
$conexion = new mysqli("localhost", "usuarioajax", "12345", "practica_sql");

if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
