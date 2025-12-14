<?php
$mysqli = new mysqli("localhost", "usuarioajax", "12345", "estudiantes");

if ($mysqli->connect_errno) {
    die("Error de conexión: " . $mysqli->connect_error);
}


