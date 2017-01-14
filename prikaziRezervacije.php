<?php

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

$rezultat2 = $veza->query("select id, naziv, opis from ponuda");

foreach($rezultat2 as $ponuda){
$br_rezervacija=0;
echo '<h2> Rezervacije za ponudu "'.$ponuda["naziv"].'" - "'.$ponuda["opis"].'": </h2>';

$rezultat = $veza->query("select email, ime, prezime, brTelefona from rezervacija where idPonude=".$ponuda["id"]);
foreach ($rezultat as $rezervacija) {
  echo '<h4>'.$rezervacija["ime"].' '.$rezervacija["prezime"].'</h4>';
  echo '<h5>'.$rezervacija["email"].' - '.$rezervacija["brTelefona"].'</h5>';
  $br_rezervacija=$br_rezervacija+1;
}

if($br_rezervacija==0){
  echo '<h4> Nema rezervacija ! </h4>';
}

}
 ?>
