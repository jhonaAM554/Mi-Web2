<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes con chart.js</title>

    <!-- CDN Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        h1{
            text-align: center;
        }
        #myChart{
            margin-top: 20px;
            margin: auto;
            display: block;
            max-width:700px;
        }
    </style> 
</head>

<body>

    <h1>Reportes con chart.js</h1>
    <h3 style="text-align:center;">Asistencia de Estudiantes de ING Sistemas</h3>

    <canvas id="myChart"></canvas>

    <!-- Código JS -->
    <script>
        var xValues = ["Carlos Mamani", "José Sanchez", "Marcos Flores", "Marta Quispe", "Miguel Choque"];
        var yValues = [9, 8, 6, 9, 7];
        var barColors = ["red", "green", "blue", "orange", "black"];

        new Chart("myChart", { 
            type: "bar",
            data: { 
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: { 
                legend: { display: false },
                title: { 
                    display: true, 
                    text: "Asistencia de Estudiantes de ING Sistemas"
                }
            }
        });
    </script>

</body>
</html>
