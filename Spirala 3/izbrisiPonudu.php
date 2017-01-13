<?php

$xmldoc = new DOMDocument();
$xmldoc->load('ponude.xml');

$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
$idPosljednje=0;
foreach($xml->ponuda as $ponuda){
  $idPosljednje=$ponuda->id;
}

for($i=1; $i<$idPosljednje+1; $i++){
if (isset($_POST["submitObrisi".$i])){

  $root   = $xmldoc->documentElement;
  $fnode  = $root->firstChild;
  $items = $xmldoc->getElementsByTagName('ponuda');
  foreach ($items as $item){
   $node = $item->getElementsByTagName('id')->item(0);
   if ($node->nodeValue == $i){
       $item->parentNode->removeChild($item);
   }
}
$xmldoc->save('ponude.xml');
}
}

 ?>
