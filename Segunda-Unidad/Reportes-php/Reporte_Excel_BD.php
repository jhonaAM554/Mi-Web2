<?php
require __DIR__ . '/conexion.php';
require __DIR__ . '/librerias/PHPSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
$resultado = $mysqli->query($sql);

$excel = new Spreadsheet();
$hoja = $excel->getActiveSheet();
$hoja->setTitle("Alumnos");

$hoja->getColumnDimension('A')->setWidth(10);
$hoja->getColumnDimension('B')->setWidth(40);
$hoja->getColumnDimension('C')->setWidth(10);
$hoja->getColumnDimension('D')->setWidth(20);
$hoja->getColumnDimension('E')->setWidth(40);

$hoja->setCellValue('A1', 'ID');
$hoja->setCellValue('B1', 'Nombre');
$hoja->setCellValue('C1', 'Edad');
$hoja->setCellValue('D1', 'Matricula');
$hoja->setCellValue('E1', 'Correo');

$fila = 2;

while ($row = $resultado->fetch_assoc()) {
    $hoja->setCellValue('A'.$fila, $row['id']);
    $hoja->setCellValue('B'.$fila, $row['nombre']);
    $hoja->setCellValue('C'.$fila, $row['edad']);
    $hoja->setCellValue('D'.$fila, $row['matricula']);
    $hoja->setCellValue('E'.$fila, $row['correo']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Alumnos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>
