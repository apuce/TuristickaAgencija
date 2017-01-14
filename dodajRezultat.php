<?php


$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

if (isset($_POST["submitAnketa"])) {
$rez=$_POST["vote"];

$ubaci = $veza->query("insert into anketa (ocjena)
values ('".$rez."')");

}

/*
$xml=new DomDocument("1.0", "ISO-8859-1");
$xml->load('rezAnkete.xml');  ///kreiraj ga ako ne postoji???

$rootTag=$xml->documentElement;

if (isset($_POST["submitAnketa"])) {
$rez=$_POST["vote"];

$infoTag=$xml->createElement("rezultat");
$nameTag=$xml->createElement("ocjena", $rez);

$infoTag->appendChild($nameTag);

$rootTag->appendChild($infoTag);

$xml->save('rezAnkete.xml');

}*/
 ?>
