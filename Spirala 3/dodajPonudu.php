<?php

$xml=new DomDocument("1.0", "ISO-8859-1");
$xml->load('ponude.xml');

$rootTag=$xml->documentElement;

if (isset($_POST["submit2"])) {
$destinacija=$_POST["destinacijaPonude"];
$naziv=$_POST["nazivPonude"];
$id=$_POST["idPonude"];

if(empty($destinacija) || empty($naziv)){

  echo '<p style="color:red">Naziv i opis ponude ne mogu biti prazna polja!</p>';

}
else{
$destinacija=htmlentities($destinacija, ENT_COMPAT, 'UTF-8');
$naziv=htmlentities($naziv, ENT_COMPAT, 'UTF-8');
$id=htmlentities($id, ENT_COMPAT, 'UTF-8');

if(preg_match('/^[0-9]+$/', $id) && preg_match('/[A-Ža-ž0-9]+/', $naziv) && preg_match('/[A-Ža-ž0-9]+/', $destinacija) ) {


/*
$ImageName = $_FILES['photo']['name'];
$fileElementName = 'photo';
$path = 'slike/';
$location = $path . $_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'], $location);
*/

$uploaddir = 'slike/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
$ImageName=$_FILES['photo']['name'];

if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {

} else {
   echo "Greska sa slikom!";
}



$infoTag=$xml->createElement("ponuda");
$nameTag=$xml->createElement("naziv", $destinacija);
$addTag=$xml->createElement("opis", $naziv);
$slikaTag=$xml->createElement("slika", $ImageName);
$idTag=$xml->createElement("id", $id);

$infoTag->appendChild($nameTag);
$infoTag->appendChild($addTag);
$infoTag->appendChild($slikaTag);
$infoTag->appendChild($idTag);

$rootTag->appendChild($infoTag);
$xml->save('ponude.xml');

    }
}


}

 ?>
