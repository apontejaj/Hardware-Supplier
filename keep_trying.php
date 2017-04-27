<?php
session_start();

$cell = $_SESSION['cell'];
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

for($x = 0; $x < count($cell); $x++) {
	
	$pdf->Cell(40,10,$cell[$x]);
	$pdf->Ln(10);
	
}


$pdf->Output();
?>
