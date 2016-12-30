<?php

$xml=new DomDocument("1.0", "ISO-8859-1");
$xml->load('poruke.xml');

$rootTag=$xml->documentElement;

if (isset($_GET["submitKomentar"])) {
$mail=$_GET["email"];
$kom=$_GET["area"];

$koment=htmlentities($kom, ENT_COMPAT, 'UTF-8');

if(preg_match('/^\S+@\S+$/', $mail) && !empty($koment)){

$infoTag=$xml->createElement("poruka");
$mailTag=$xml->createElement("email", $mail);
$komTag=$xml->createElement("komentar", $koment);

$infoTag->appendChild($mailTag);
$infoTag->appendChild($komTag);

$rootTag->appendChild($infoTag);
$xml->save('poruke.xml');

}
}
 ?>
