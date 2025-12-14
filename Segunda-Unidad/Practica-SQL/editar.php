<?php
require "db.php";

$tabla = $_GET['tabla'];
$id = $_GET['id'];

$registro = $conexion->query("SELECT * FROM $tabla WHERE id=$id")->fetch_assoc();

if ($_POST) {

    if ($tabla == "estudiante") {
        $sql = "UPDATE estudiante SET 
                nombres='{$_POST['nombres']}',
                apellidos='{$_POST['apellidos']}',
                fechanac='{$_POST['fechanac']}',
                cursoId='{$_POST['cursoId']}'
                WHERE id=$id";
    }

    if ($tabla == "curso") {
        $sql = "UPDATE curso SET 
                nombre='{$_POST['nombre']}',
                credito='{$_POST['credito']}'
                WHERE id=$id";
    }

    $conexion->query($sql);
    header("Location: " . $tabla . "s.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
</head>
<body>
<h1>Editar <?= ucfirst($tabla) ?></h1>

<form method="POST">

<?php if ($tabla == "estudiante") { ?>

Nombres: <input type="text" name="nombres" value="<?= $registro['nombres'] ?>"><br><br>
Apellidos: <input type="text" name="apellidos" value="<?= $registro['apellidos'] ?>"><br><br>
Fecha Nacimiento: <input type="date" name="fechanac" value="<?= $registro['fechanac'] ?>"><br><br>
Curso ID: <input type="number" name="cursoId" value="<?= $registro['cursoId'] ?>"><br><br>

<?php } ?>

<?php if ($tabla == "curso") { ?>

Nombre: <input type="text" name="nombre" value="<?= $registro['nombre'] ?>"><br><br>
Crédito: <input type="number" name="credito" value="<?= $registro['credito'] ?>"><br><br>

<?php } ?>

<button type="submit">Actualizar</button>

</form>

</body>
</html>

