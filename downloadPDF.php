
<?php
require('fpdf\fpdf.php');

$pdf=new FPDF();

$pdf->SetTitle('turisticka agencija "amina."');

$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(1,33,83);

$pdf->AddPage('P');
$pdf->Cell(0, 5, "Izvjestaj o ponudama", 0, 0, 'C');
$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");

$pdf->Ln(20);

foreach($xml->ponuda as $ponuda){
  $pdf->SetFont('Helvetica','B',14);
  $pdf->SetTextColor(1,33,83);
  $pdf->Write(1, 'Naziv ponude: ');
  $pdf->Write(1, $ponuda->naziv);
  $pdf->Ln(10);
  $pdf->SetTextColor(0,171,255);
  $pdf->Write(1, 'Opis: ');
  $pdf->Write(1, $ponuda->opis);
  $pdf->Ln(20);
}

$pdf->Output('izvjestajOponudama.pdf','I');
?>
