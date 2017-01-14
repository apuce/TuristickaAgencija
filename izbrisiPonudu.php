<?php

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");
$idPosljednje=0;
$rezultat = $veza->query("select id from ponuda");
$rezultat2 = $veza->query("select id,idPonude from slika");
if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
  if (!$rezultat2) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }

foreach($rezultat as $ponuda) {
$idPosljednje=$ponuda["id"];
}

for($i=1; $i<$idPosljednje+1; $i++){
if (isset($_POST["submitObrisi".$i])){

  try {
      $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM slika WHERE idPonude=".$i;
      $veza->exec($sql);

      $sql = "DELETE FROM ponuda WHERE id=".$i;
      $veza->exec($sql);

      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

}

}




/*
$xmldoc = new DOMDocument();
$xmldoc->load('ponude.xml');

$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
$idPosljednje=0;
foreach($xml->ponuda as $ponuda){
  $idPosljednje=$ponuda->id;
}

for($i=1; $i<$idPosljednje+1; $i++){
if (isset($_POST["submitObrisi".$i])){

  $id_ponude=$i;
  $root   = $xmldoc->documentElement;
  $fnode  = $root->firstChild;
  $items = $xmldoc->getElementsByTagName('ponuda');
  foreach ($items as $item){
   $node = $item->getElementsByTagName('id')->item(0);
   if ($node->nodeValue == $i){
       $item->parentNode->removeChild($item);
   }
}

$xml2doc = new DOMDocument();
$xml2doc->load('slike.xml');

$xml2=simplexml_load_file("slike.xml") or die("Error: Cannot create object");
$items2 = $xml2doc->getElementsByTagName('slika');
foreach($items2 as $item2)
{
 $node2 = $item2->getElementsByTagName('idPonude')->item(0);
  if ($node2->nodeValue == $id_ponude){
      $item2->parentNode->removeChild($item2);
  }
}

*/
//$xmldoc->save('ponude.xml');
//$xml2doc->save('slike.xml');
//}
//}

 ?>
