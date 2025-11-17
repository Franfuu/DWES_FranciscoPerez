<?php
require_once 'fpdf186/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Ejemplo de exportacion PDF', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Generado con PHP + FPDF', 0, 1, 'L');

$pdf->Output('I', 'demo.pdf'); // I: Ver en navegador, D: Descargar
?>