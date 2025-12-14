<?php
require "db.php";

$resultado = $conexion->query("SELECT * FROM estudiante");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estudiantes</title>
</head>
<body>
<h1>Listado de Estudiantes</h1>

<a href="insertar.php?tabla=estudiante">Insertar nuevo estudiante</a>
<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Fecha Nacimiento</th>
    <th>Curso ID</th>
    <th>Acciones</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()) { ?>
<tr>
    <td><?= $fila['id'] ?></td>
    <td><?= $fila['nombres'] ?></td>
    <td><?= $fila['apellidos'] ?></td>
    <td><?= $fila['fechanac'] ?></td>
    <td><?= $fila['cursoId'] ?></td>
    <td>
        <a href="editar.php?tabla=estudiante&id=<?= $fila['id'] ?>">Editar</a> | 
        <a href="eliminar.php?tabla=estudiante&id=<?= $fila['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>
</body>
</html>
