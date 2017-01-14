
<?php
require('./fpdf/fpdf.php');

$pdf=new FPDF();

$pdf->SetTitle('turisticka agencija "amina."');

$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(1,33,83);

$pdf->AddPage('P');
$pdf->Cell(0, 5, "Izvjestaj o ponudama", 0, 0, 'C');
$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");

$pdf->Ln(20);

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

$rezultat = $veza->query("select id,naziv,opis,detaljanOpis,slika,cijena from ponuda");

foreach($rezultat as $ponuda)
{
  $pdf->SetFont('Helvetica','B',14);
  $pdf->SetTextColor(1,33,83);
  $pdf->Write(1, 'Naziv ponude: ');
  $pdf->Write(1, $ponuda["naziv"]);
  $pdf->Ln(10);
  $pdf->SetTextColor(0,171,255);
  $pdf->Write(1, 'Opis: ');
  $pdf->Write(1, $ponuda["opis"]);
  $pdf->Ln(10);
  $pdf->Write(1, 'Detaljan opis: ');
  $pdf->Write(1, $ponuda["detaljanOpis"]);
  $pdf->Ln(10);
  $pdf->Write(1, 'Cijena: ');
  $pdf->Write(1, $ponuda["cijena"]);
  $pdf->Ln(20);
}
/*
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
}*/



$pdf->Output('izvjestajOponudama.pdf','I');
?>
