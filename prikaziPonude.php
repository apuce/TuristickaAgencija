<?php

$xmldoc = new DOMDocument();
$xmldoc->load('ponude.xml');

$naziv=$_GET["naziv"];

  $items = $xmldoc->getElementsByTagName('ponuda');
  foreach ($items as $item){
   $node = $item->getElementsByTagName('id')->item(0);
   $node2 = $item->getElementsByTagName('naziv')->item(0);
   if (strpos($node2->nodeValue, $naziv)!==false){
       echo $node2->nodeValue;
   }
}


 ?>
