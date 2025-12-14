<?php
require __DIR__ . '/librerias/vendor/autoload.php';

$pdf = new \TCPDF('P','mm','A4', true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(0, 10, '¡Hola Mundo desde TCPDF en Ubuntu!', 1, 1, 'C');
$pdf->Output('prueba.pdf', 'I');
?>
