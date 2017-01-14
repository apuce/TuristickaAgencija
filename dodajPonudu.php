<?php

//$xml=new DomDocument("1.0", "ISO-8859-1");
//$xml->load('ponude.xml');

//$rootTag=$xml->documentElement;

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

if (isset($_POST["submit2"])) {
$destinacija=$_POST["destinacijaPonude"];
$naziv=$_POST["nazivPonude"];
$id=$_POST["idPonude"];
$opis=$_POST["opisPonude"];
$cijena=$_POST["cijenaPonude"];
if(empty($destinacija) || empty($naziv)){

  echo '<p style="color:red">Naziv i opis ponude ne mogu biti prazna polja!</p>';

}
else{
$destinacija=htmlentities($destinacija, ENT_COMPAT, 'UTF-8');
$naziv=htmlentities($naziv, ENT_COMPAT, 'UTF-8');
$id=htmlentities($id, ENT_COMPAT, 'UTF-8');

if(preg_match('/^[0-9]+$/', $id) && preg_match('/[A-Ža-ž0-9]+/', $naziv) && preg_match('/[A-Ža-ž0-9]+/', $destinacija) ) {


$uploaddir = 'slike/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
$ImageName=$_FILES['photo']['name'];

if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {

} else {
   echo "Greska sa slikom!";
}

/*
$infoTag=$xml->createElement("ponuda");
$nameTag=$xml->createElement("naziv", $destinacija);
$addTag=$xml->createElement("opis", $naziv);
$slikaTag=$xml->createElement("slika", $ImageName);
$idTag=$xml->createElement("id", $id);
$opisTag=$xml->createElement("detaljanOpis", $opis);
$cijenaTag=$xml->createElement("cijena", $cijena);

$infoTag->appendChild($nameTag);
$infoTag->appendChild($addTag);
$infoTag->appendChild($slikaTag);
$infoTag->appendChild($idTag);
$infoTag->appendChild($opisTag);
$infoTag->appendChild($cijenaTag);

$rootTag->appendChild($infoTag);
$xml->save('ponude.xml');
*/

$ubaci = $veza->query("insert into ponuda (id,naziv,opis,detaljanOpis,slika,cijena)
values ('".$id."', '".$naziv."', '".$destinacija."', '".$opis."','".$ImageName."','".$cijena."')");

    }
}



//druga slika
$uploadfile2 = $uploaddir . basename($_FILES['photo2']['name']);
$ImageName2=$_FILES['photo2']['name'];

if (move_uploaded_file($_FILES['photo2']['tmp_name'], $uploadfile2)) {

} else {
   echo "Greska sa slikom!";
}

//treca slika
$uploadfile3 = $uploaddir . basename($_FILES['photo3']['name']);
$ImageName3=$_FILES['photo3']['name'];

if (move_uploaded_file($_FILES['photo3']['tmp_name'], $uploadfile3)) {

} else {
   echo "Greska sa slikom!";
}

//cetvrta slika
$uploadfile4 = $uploaddir . basename($_FILES['photo4']['name']);
$ImageName4=$_FILES['photo4']['name'];

if (move_uploaded_file($_FILES['photo4']['tmp_name'], $uploadfile4)) {

} else {
   echo "Greska sa slikom!";
}
/*
$xml2=new DomDocument("1.0", "ISO-8859-1");
$xml2->load('slike.xml');

$rootTag2=$xml2->documentElement;

//slika 2
$infoTag2=$xml2->createElement("slika");
$Tag1=$xml2->createElement("idPonude", $id);
$Tag2=$xml2->createElement("naziv", $ImageName2);

$infoTag2->appendChild($Tag1);
$infoTag2->appendChild($Tag2);
$rootTag2->appendChild($infoTag2);
$xml2->save('slike.xml');

//slika 3
$infoTag3=$xml2->createElement("slika");
$Tag3=$xml2->createElement("idPonude", $id);
$Tag4=$xml2->createElement("naziv", $ImageName3);

$infoTag3->appendChild($Tag3);
$infoTag3->appendChild($Tag4);
$rootTag2->appendChild($infoTag3);
$xml2->save('slike.xml');

//slika 4
$infoTag4=$xml2->createElement("slika");
$Tag5=$xml2->createElement("idPonude", $id);
$Tag6=$xml2->createElement("naziv", $ImageName4);

$infoTag4->appendChild($Tag5);
$infoTag4->appendChild($Tag6);
$rootTag2->appendChild($infoTag4);
$xml2->save('slike.xml');
*/

$ubaci = $veza->query("insert into slika (idPonude, naziv)
values ('".$id."', '".$ImageName2."')");
$ubaci = $veza->query("insert into slika (idPonude, naziv)
values ('".$id."', '".$ImageName3."')");
$ubaci = $veza->query("insert into slika (idPonude, naziv)
values ('".$id."', '".$ImageName4."')");
}

 ?>
