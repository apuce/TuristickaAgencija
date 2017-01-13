
<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("ponude.xml");
$x=$xmlDoc->getElementsByTagName('ponuda');

$q=$_GET["q"];

  $numHints=0;

if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $id=$x->item($i)->getElementsByTagName('id');
    $y=$x->item($i)->getElementsByTagName('naziv');
    $z=$x->item($i)->getElementsByTagName('opis');

    if ($y->item(0)->nodeType==1) {
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue, $q)) {
        if ($hint=="") {
          $nazivPonude=$y->item(0)->nodeValue;

          $hint='<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
        else {
          $nazivPonude=$y->item(0)->nodeValue;

          $hint=$hint . '<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }

      }

      else if(stristr($z->item(0)->childNodes->item(0)->nodeValue, $q))
      {
        if ($hint=="") {

          $nazivPonude=$y->item(0)->nodeValue;

          $hint='<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
        else {
          $nazivPonude=$y->item(0)->nodeValue;

          $hint=$hint . '<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
      }

    }

    if($numHints==10)break;
  }
}

if ($hint=="") {
  $response="nema rezultata";
} else {
  $response=$hint;
}

echo $response;

?>
