<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Actualizar persona</title>
</head>

<body>
    <div class="container mt-4">

        <h1 class="mb-4">Actualizar datos</h1>

        <form method="POST" action="<?= base_url('actualizar') ?>">

            <input type="hidden" name="idNombre" value="<?= $datos['id_nombre'] ?>">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control"
                   value="<?= $datos['nombre'] ?>" required>

            <label for="paterno">Apellido paterno</label>
            <input type="text" name="paterno" class="form-control"
                   value="<?= $datos['paterno'] ?>" required>

            <label for="materno">Apellido materno</label>
            <input type="text" name="materno" class="form-control"
                   value="<?= $datos['materno'] ?>" required>

            <button class="btn btn-primary mt-3">Actualizar</button>
            <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">Cancelar</a>

        </form>
    </div>
</body>
</html>
