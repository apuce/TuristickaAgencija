<?php
$xml=simplexml_load_file("rezAnkete.xml") or die("Error: Cannot create object");

$brJedan=0;
$brDva=0;
$brTri=0;
$brCetiri=0;
$brPet=0;

foreach($xml->rezultat as $rezultat){
  if($rezultat->ocjena=='jedan')$brJedan=$brJedan+1;
  else if($rezultat->ocjena=='dva')$brDva=$brDva+1;
  else if($rezultat->ocjena=='tri')$brTri=$brTri+1;
  else if($rezultat->ocjena=='cetiri')$brCetiri=$brCetiri+1;
  else if($rezultat->ocjena=='pet')$brPet=$brPet+1;
}

echo '<h2> Posjetioci su ocijenili agenciju sljedecim ocjenama: </h2>';
echo '<h3> Ocjena 1: '.$brJedan.' x </h3>';
echo '<h3> Ocjena 2: '.$brDva.' x </h3>';
echo '<h3> Ocjena 3: '.$brTri.' x </h3>';
echo '<h3> Ocjena 4: '.$brCetiri.' x </h3>';
echo '<h3> Ocjena 5: '.$brPet.' x </h3>';
 ?>
