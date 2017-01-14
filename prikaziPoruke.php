<?php
$xml=simplexml_load_file("poruke.xml") or die("Error: Cannot create object");

echo '<h1>Poruke posjetioca stranice: </h1>';
/*
foreach($xml->poruka as $poruka){
  echo '<h2> email:  ' . $poruka->email . '</h2>';
  echo '<h4> poruka:  ' . $poruka->komentar . '</h4><br>';
}*/

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

$rezultat = $veza->query("select email,tekst from poruka");

foreach($rezultat as $poruka)
{
  echo '<h2> email:  ' . $poruka["email"] . '</h2>';
  echo '<h4> poruka:  ' . $poruka["tekst"] . '</h4><br>';
}
 ?>
