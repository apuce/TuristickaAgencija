<?php

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

}
 ?>
