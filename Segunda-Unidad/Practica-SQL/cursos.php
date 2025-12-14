<?php
require "db.php";

$resultado = $conexion->query("SELECT * FROM curso");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cursos</title>
</head>
<body>
<h1>Listado de Cursos</h1>

<a href="insertar.php?tabla=curso">Insertar nuevo curso</a>
<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Crédito</th>
    <th>Acciones</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()) { ?>
<tr>
    <td><?= $fila['id'] ?></td>
    <td><?= $fila['nombre'] ?></td>
    <td><?= $fila['credito'] ?></td>
    <td>
        <a href="editar.php?tabla=curso&id=<?= $fila['id'] ?>">Editar</a> | 
        <a href="eliminar.php?tabla=curso&id=<?= $fila['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>
</body>
</html>
