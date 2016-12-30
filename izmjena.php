<?php
$xmldoc = new DOMDocument();
$xmldoc->load('ponude.xml');

$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
$idPosljednje=0;
foreach($xml->ponuda as $ponuda){
  $idPosljednje=$ponuda->id;
}

for($i=1; $i<$idPosljednje+1; $i++){
if (isset($_POST["submitIzmijeni".$i])){

         $items = $xmldoc->getElementsByTagName('ponuda');
          foreach ($items as $item){
           $node = $item->getElementsByTagName('id')->item(0);
           $node2 = $item->getElementsByTagName('naziv')->item(0);
           $node3 = $item->getElementsByTagName('opis')->item(0);


           if ($node->nodeValue == $i){
               $naziv=$node2->nodeValue;
               $destinacija=$node3->nodeValue;
               $id=$i;
           }
         }

        $xmldoc->save('ponude.xml');


echo '
<form action="" method="post">
<input type="text" value="'.$naziv.'" name="noviNaziv">
<input type="text" value="'.$destinacija.'" name="novaDestinacija">
<input type="submit" value="Izmijeni" name="submitIz'.$id.'">
<a href="profile.php"><input type="button" value="Odustani"></a>
</form>'
;
}
}


for($i=1; $i<$idPosljednje+1; $i++){
if (isset($_POST["submitIz".$i])){

  $naziv=$_POST["noviNaziv"];
  $destinacija=$_POST["novaDestinacija"];

  if(empty($destinacija) || empty($naziv)){

    echo '<p style="color:red">Naziv i opis ponude ne mogu biti prazna polja!</p>';

  }
  else{

  $destinacija=htmlentities($destinacija, ENT_COMPAT, 'UTF-8');
  $naziv=htmlentities($naziv, ENT_COMPAT, 'UTF-8');

  if(preg_match('/[A-Ža-ž0-9]+/', $naziv) && preg_match('/[A-Ža-ž0-9]+/', $destinacija)){
  $items = $xmldoc->getElementsByTagName('ponuda');
  foreach ($items as $item){
   $node = $item->getElementsByTagName('id')->item(0);
   $node2 = $item->getElementsByTagName('naziv')->item(0);
   $node3 = $item->getElementsByTagName('opis')->item(0);

   if ($node->nodeValue == $i){
       $node2->nodeValue=$naziv;
       $node3->nodeValue=$destinacija;
   }
 }

$xmldoc->save('ponude.xml');
}
}
}
}
?>
