<?php
require_once 'fpdf186/fpdf.php';

$contenido = file('notas.txt');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

foreach ($contenido as $linea) {
    //$pdf->Cell(0, 10, utf8_decode(trim($linea)), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding(trim($linea), 'ISO-8859-1', 'UTF-8'), 0, 1);
    //$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1//IGNORE', trim($linea)), 0, 1);
}

$pdf->Output('I', 'notas.pdf');
?>