
<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("ponude.xml");
$x=$xmlDoc->getElementsByTagName('ponuda');

$q=$_GET["q"];

  $numHints=0;

if (strlen($q)>0) {
  $hint="";

  $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
  $veza->exec("set names utf8");

  $rezultat = $veza->query("select * from ponuda");

  $qa = $veza->prepare("SELECT * FROM ponuda");
//  $qa->bindParam(':level', $_SESSION['level']); // bind it
  $qa->execute();
  // fetch the results
  $rezultat = $qa->fetchAll(PDO::FETCH_ASSOC);
  $i=0;
  foreach($rezultat as $ponuda)
  {

  //for($i=0; $i<($x->length); $i++) {
  $id=$rezultat[$i]["id"];//  $id=$x->item($i)->getElementsByTagName('id');
  $y=$rezultat[$i]["naziv"];//  $y=$x->item($i)->getElementsByTagName('naziv');
  $z=$rezultat[$i]["opis"];//  $z=$x->item($i)->getElementsByTagName('opis');

  //  if ($y->item(0)->nodeType==1) {
      if (stristr($y, $q)) {//if (stristr($y->item(0)->childNodes->item(0)->nodeValue, $q)) {
        if ($hint=="") {
          $nazivPonude=$y;//$nazivPonude=$y->item(0)->nodeValue;

          $hint='<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y .' - './/$y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z . '</div>';//$z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
        else {
          $nazivPonude=$y;//$nazivPonude=$y->item(0)->nodeValue;

          $hint=$hint . '<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y .' - './/$y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z . '</div>';//$z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }

      }

      else if(stristr($z, $q))//else if(stristr($z->item(0)->childNodes->item(0)->nodeValue, $q))
      {
        if ($hint=="") {

          $nazivPonude=$y;//$nazivPonude=$y->item(0)->nodeValue;

          $hint='<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y .' - './/$y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z . '</div>';//$z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
        else {
          $nazivPonude=$y;//$nazivPonude=$y->item(0)->nodeValue;

          $hint=$hint . '<div onclick="theFunction(\''.$nazivPonude.'\')" style="background-color: white">' .
          $y . ' - '. //$y->item(0)->childNodes->item(0)->nodeValue .' - '.
          $z . '</div>';//$z->item(0)->childNodes->item(0)->nodeValue . '</div>';

          $numHints=$numHints+1;
        }
      }

    //}

    if($numHints==10)break;
    $i=$i+1;
  }

}

if ($hint=="") {
  $response="nema rezultata";
} else {
  $response=$hint;
}

echo $response;

?>
