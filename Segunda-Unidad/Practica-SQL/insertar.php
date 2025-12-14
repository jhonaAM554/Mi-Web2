<?php
require "db.php";

$tabla = $_GET['tabla'];

if ($_POST) {

    if ($tabla == "estudiante") {
        $sql = "INSERT INTO estudiante(nombres, apellidos, fechanac, cursoId)
                VALUES ('{$_POST['nombres']}', '{$_POST['apellidos']}', '{$_POST['fechanac']}', '{$_POST['cursoId']}')";
    }

    if ($tabla == "curso") {
        $sql = "INSERT INTO curso(nombre, credito)
                VALUES ('{$_POST['nombre']}', '{$_POST['credito']}')";
    }

    $conexion->query($sql);
    header("Location: " . $tabla . "s.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insertar</title>
</head>
<body>
<h1>Insertar en <?= ucfirst($tabla) ?></h1>

<form method="POST">

<?php if ($tabla == "estudiante") { ?>

Nombres: <input type="text" name="nombres"><br><br>
Apellidos: <input type="text" name="apellidos"><br><br>
Fecha Nacimiento: <input type="date" name="fechanac"><br><br>
Curso ID: <input type="number" name="cursoId"><br><br>

<?php } ?>

<?php if ($tabla == "curso") { ?>

Nombre: <input type="text" name="nombre"><br><br>
Crédito: <input type="number" name="credito"><br><br>

<?php } ?>

<button type="submit">Guardar</button>

</form>

</body>
</html>
