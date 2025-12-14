<?php
require __DIR__ . '/conexion.php';
require __DIR__ . '/librerias/PHPSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
$resultado = $mysqli->query($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Alumnos');

$sheet->setCellValue('A1','ID');
$sheet->setCellValue('B1','Nombre');
$sheet->setCellValue('C1','Edad');
$sheet->setCellValue('D1','Matricula');
$sheet->setCellValue('E1','Correo');

$rowNum = 2;
while ($row = $resultado->fetch_assoc()) {
    $sheet->setCellValue('A'.$rowNum, $row['id']);
    $sheet->setCellValue('B'.$rowNum, $row['nombre']);
    $sheet->setCellValue('C'.$rowNum, $row['edad']);
    $sheet->setCellValue('D'.$rowNum, $row['matricula']);
    $sheet->setCellValue('E'.$rowNum, $row['correo']);
    $rowNum++;
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Alumnos.csv');
$writer = IOFactory::createWriter($spreadsheet, 'Csv');
$writer->setDelimiter(',');
$writer->save('php://output');
exit;
?>
