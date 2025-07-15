<?php
require('fpdf/fpdf.php'); 
$riassunto = $_POST['riassunto'] ?? '';
$nome = $_POST['nome'] ?? 'Studente';

if (empty(trim($riassunto))) {
    die('⚠️ Nessun riassunto da generare.');
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20, 20, 20); 


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Riassunto della Lezione'), 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode('Studente: ') . utf8_decode($nome), 0, 1);
$pdf->Ln(5);


$pdf->SetFont('Arial', '', 11);
$riassunto_formattato = str_replace(["\\n", "\\r", "\\"], ["\n", "", ""], $riassunto);
$pdf->MultiCell(0, 8, utf8_decode($riassunto_formattato));


$filename = 'riassunto_' . preg_replace('/[^a-zA-Z0-9]/', '_', $nome) . '.pdf';


$pdf->Output('D', $filename);
