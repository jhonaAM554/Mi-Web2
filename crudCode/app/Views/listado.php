<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CRUD CodeIgniter</title>
</head>

<body>
    <div class="container mt-4">

        <h1 class="mb-4">CRUD con CodeIgniter 4</h1>

        <!-- FORMULARIO DE REGISTRO -->
        <form method="POST" action="<?= base_url('crear') ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>

            <label for="paterno">Apellido paterno</label>
            <input type="text" name="paterno" class="form-control" required>

            <label for="materno">Apellido materno</label>
            <input type="text" name="materno" class="form-control" required>

            <button class="btn btn-primary mt-3">Guardar</button>
        </form>

        <hr>

        <h2>Listado de personas</h2>

        <table class="table table-bordered mt-3">
            <tr>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            <?php foreach ($datos as $item): ?>
            <tr>
                <td><?= $item['nombre'] ?></td>
                <td><?= $item['paterno'] ?></td>
                <td><?= $item['materno'] ?></td>
                <td>
                    <a href="<?= base_url('obtenerNombre/' . $item['id_nombre']) ?>"
                       class="btn btn-warning btn-sm">Editar</a>
                </td>
                <td>
                    <a href="<?= base_url('eliminar/' . $item['id_nombre']) ?>"
                       class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php if (isset($mensaje)): ?>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                let mensaje = "<?= $mensaje ?>";

                switch (mensaje) {
                    case '1': swal("Éxito", "Agregado con éxito", "success"); break;
                    case '0': swal("Error", "Error al agregar", "error"); break;
                    case '2': swal("Éxito", "Actualizado con éxito", "success"); break;
                    case '3': swal("Error", "Error al actualizar", "error"); break;
                    case '4': swal("Éxito", "Eliminado con éxito", "success"); break;
                    case '5': swal("Error", "Error al eliminar", "error"); break;
                }
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
