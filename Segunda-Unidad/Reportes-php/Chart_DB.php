<?php
require __DIR__ . '/conexion.php';

// Consulta a la base de datos
$sql = "SELECT edad, COUNT(*) AS total FROM alumnos GROUP BY edad ORDER BY edad ASC";
$res = $mysqli->query($sql);

// Convertimos resultados para Chart.js
$labels = [];
$data = [];

while ($row = $res->fetch_assoc()) {
    $labels[] = $row['edad'];
    $data[] = (int)$row['total'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Gráfico desde BD</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body{
            font-family: Arial;
            padding: 20px;
        }
        h1{
            text-align: center;
        }
        #myChart{
            max-width: 700px;
            margin: auto;
        }
    </style>
</head>

<body>

<h1>Reporte de Alumnos por Edad (Base de Datos)</h1>

<canvas id="myChart"></canvas>

<script>
    const labels = <?php echo json_encode($labels); ?>;
    const data = <?php echo json_encode($data); ?>;

    new Chart(document.getElementById("myChart"), {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Total de alumnos",
                data: data,
                backgroundColor: "rgba(54, 162, 235, 0.6)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });
</script>

</body>
</html>

