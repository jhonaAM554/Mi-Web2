<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Reporte Alumnos - HTML</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="noprint">Reporte de Alumnos (Versión Web)</h1>
  <h1 class="print">Reporte de Alumnos (Para Imprimir)</h1>

  <table id="tabla-alumnos">
    <thead>
      <tr>
        <th>ID</th><th>Nombre</th><th>Edad</th><th>Matricula</th><th>Correo</th>
      </tr>
    </thead>
    <tbody>
      <!-- rows from PHP -->
      <?php
      require __DIR__ . '/conexion.php';
      $sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
      $res = $mysqli->query($sql);
      while ($f = $res->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$f['id']}</td>";
          echo "<td>{$f['nombre']}</td>";
          echo "<td>{$f['edad']}</td>";
          echo "<td>{$f['matricula']}</td>";
          echo "<td>{$f['correo']}</td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <div class="noprint actions" style="margin-top:12px;">
    <button onclick="window.print()">Imprimir</button>
    <a href="reporteBDpdf.php" target="_blank">Ver/Descargar PDF</a>
    <a href="Reporte_Excel_BD.php">Descargar Excel</a>
    <a href="Reporte_CSV_BD.php">Descargar CSV</a>
    <a href="Chart_DB.php">Ver Gráfico</a>
  </div>
</body>
</html>
