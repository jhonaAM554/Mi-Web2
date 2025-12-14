<?php
require __DIR__ . '/conexion.php';
require __DIR__ . '/librerias/vendor/autoload.php';

$pdf = new \TCPDF('P','mm','A4', true, 'UTF-8', false);
$pdf->SetTitle('Reporte de Alumnos');
$pdf->AddPage();
$pdf->SetFont('helvetica','',12);

$html = '<h2 style="text-align:center;">Reporte de Alumnos</h2>';

$html .= '
<table border="1" cellpadding="5">
<tr style="background-color:#f2f2f2;">
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Matricula</th>
    <th>Correo</th>
</tr>';

$sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
$resultado = $mysqli->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    $html .= '<tr>
        <td>'.$fila['id'].'</td>
        <td>'.$fila['nombre'].'</td>
        <td>'.$fila['edad'].'</td>
        <td>'.$fila['matricula'].'</td>
        <td>'.$fila['correo'].'</td>
    </tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte.pdf', 'I');

