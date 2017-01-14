<?php
$xml=simplexml_load_file("poruke.xml") or die("Error: Cannot create object");
$xml2=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
$xml3=simplexml_load_file("slike.xml") or die("Error: Cannot create object");
$xml4=simplexml_load_file("rezAnkete.xml") or die("Error: Cannot create object");
$xml5=simplexml_load_file("rezervacije.xml") or die("Error: Cannot create object");

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
     $veza->exec("set names utf8");

//prebacivanje poruka
foreach($xml->poruka as $porukaXML){
  $rezultat = $veza->query("select email, tekst from poruka");
  $postoji=false;
  if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
foreach($rezultat as $poruka) {
if($poruka["email"]==$porukaXML->email && $poruka["tekst"]==$porukaXML->komentar){
  $postoji=true;
}

}

if($postoji==false){
       $ubaci = $veza->query("insert into poruka (email, tekst)
values ('".$porukaXML->email."', '".$porukaXML->komentar."')");
}

}

//prebacivanje ponuda
foreach($xml2->ponuda as $ponudaXML){
  $rezultat = $veza->query("select naziv, opis, detaljanOpis, slika, cijena from ponuda");

  $postoji=false;
  if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
foreach($rezultat as $ponuda) {
if($ponuda['naziv']==$ponudaXML->naziv && $ponuda['opis']==$ponudaXML->opis && $ponuda['detaljanOpis']==$ponudaXML->detaljanOpis){
  $postoji=true;
}

}

if($postoji==false){
  $ubaci = $veza->query("insert into ponuda (id, naziv, opis, detaljanOpis, slika, cijena)
values ('".$ponudaXML->id."', '".$ponudaXML->naziv."', '".$ponudaXML->opis."', '".$ponudaXML->detaljanOpis."', '".$ponudaXML->slika."', '".$ponudaXML->cijena."')");

}

}

//prebacivanje slika
foreach($xml3->slika as $slikaXML){
  $rezultat = $veza->query("select idPonude, naziv from slika where idPonude=".$slikaXML->idPonude);
  $postoji=false;
  if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
  foreach($rezultat as $slika) {
  if($slika['naziv']==$slikaXML->naziv && $slika['idPonude']==$slikaXML->idPonude){
  $postoji=true;
  }

  }

  if($postoji==false){
    $ubaci = $veza->query("insert into slika (idPonude, naziv)
values ('".$slikaXML->idPonude."', '".$slikaXML->naziv."')");
  }

}


//prebacivanje rezultata ankete
$brojacA=0;
foreach($xml4->rezultat as $rezultatXML){
  $brojacA=$brojacA+1;
  }

  $sql = "SELECT count(*) FROM anketa";
  $result = $veza->prepare($sql);
  $result->execute();
  $number_of_rows = $result->fetchColumn();
  $items = array_reverse($xml4->xpath('rezultat'));

  if($brojacA>$number_of_rows){
    $i=0;
    foreach ($items as $item) {
      $ubaci = $veza->query("insert into anketa (ocjena) values ('".$item->ocjena."')");
      $i=$i+1;
      if($i==($brojacA-$number_of_rows))break;
    }
  }


//prebacivanje rezervacija
foreach($xml5->rezervacija as $rezervacijaXML){
  $rezultat = $veza->query("select idPonude, email, ime, prezime, brTelefona from rezervacija where idPonude=".$rezervacijaXML->idPonude);
  $postoji=false;
  if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }
  foreach($rezultat as $rezervacija) {
  if($rezervacija['ime']==$rezervacijaXML->ime && $rezervacija['prezime']==$rezervacijaXML->prezime && $rezervacija['email']==$rezervacijaXML->mail){
  $postoji=true;
  }

  }

  if($postoji==false){
    $ubaci = $veza->query("insert into rezervacija (idPonude, email, ime, prezime, brTelefona)
values ('".$rezervacijaXML->idPonude."', '".$rezervacijaXML->mail."', '".$rezervacijaXML->ime."', '".$rezervacijaXML->prezime."', '".$rezervacijaXML->brTel."')");
  }

}
 ?>
