<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Intestazione tabella
$pdf->Cell(40, 10, 'ID', 1, 0, 'C');
$pdf->Cell(80, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(40, 10, 'Prezzo', 1, 1, 'C');

// Righe della tabella
$pdf->SetFont('Arial', '', 12);
$prodotti = [
    [1, 'Prodotto A', '10€'],
    [2, 'Prodotto B', '15€'],
    [3, 'Prodotto C', '20€']
];

foreach ($prodotti as $prodotto) {
    $pdf->Cell(40, 10, $prodotto[0], 1, 0, 'C');
    $pdf->Cell(80, 10, $prodotto[1], 1, 0, 'C');
    $pdf->Cell(40, 10, $prodotto[2], 1, 1, 'C');
}

$pdf->Output();
?>
