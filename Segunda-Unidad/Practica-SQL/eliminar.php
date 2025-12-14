<?php
require "db.php";

$tabla = $_GET['tabla'];
$id = $_GET['id'];

$conexion->query("DELETE FROM $tabla WHERE id = $id");

header("Location: " . $tabla . "s.php");
exit;
?>
