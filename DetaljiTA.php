<?php
include('login.php'); // Includes Login Script
include('dodajRezultat.php');
if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>

<!DOCTYPE html>
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Turistička agencija</TITLE>
 <link rel="shortcut icon" type="image/x-icon" href="slike/icon.png" />
<link rel="stylesheet" type="text/css" href="ta.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</HEAD>
<BODY>

  <script src="tAgencija.js"></script>

<div id="header" class="red">
<img id="logo" src="slike/sun.png" alt="">
<h1> amina. </h1>
<h3> -putujte sa nama! </h3>
</div>

<?php
$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");
$brojac=0;
$rezultat = $veza->query("select id,naziv,opis,slika,detaljanOpis,cijena from ponuda");
if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }
foreach($rezultat as $ponuda) {
    if($_GET['id_detalji']==$ponuda["id"]){
  $nazivDetalji=$ponuda["naziv"];
  $opisDetalji=$ponuda["opis"];
  $slika1Detalji=$ponuda["slika"];
  $opisDetaljan=$ponuda["detaljanOpis"];
  $cijena=$ponuda["cijena"];
}
}

/*
$xml=new DomDocument("1.0", "ISO-8859-1");
$xml->load('ponude.xml');

$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");

foreach($xml->ponuda as $ponuda){
  if($_GET['id_detalji']==$ponuda->id){
    $nazivDetalji=$ponuda->naziv;
    $opisDetalji=$ponuda->opis;
    $slika1Detalji=$ponuda->slika;
    $opisDetaljan=$ponuda->detaljanOpis;
    $cijena=$ponuda->cijena;

    //pronadji jos neke slike iz baze
  }
}
*/

?>
<div id="details" class="red">
  <h2><?php echo $nazivDetalji; ?></h2>
  <div class="red">
    <div id="detaljiS" class="kolona dva">

<ul>
  <li id="1" class="hideable" style="display:block"><img src=<?php echo 'slike/'.$slika1Detalji; ?>></li>
  <?php
  /*
  $xmldoc = new DOMDocument();
  $xmldoc->load('slike.xml');
  $brojSlike=1;

  $root   = $xmldoc->documentElement;
  $fnode  = $root->firstChild;
  $items = $xmldoc->getElementsByTagName('slika');
  foreach ($items as $item){
   $node = $item->getElementsByTagName('idPonude')->item(0);
   $node2 = $item->getElementsByTagName('naziv')->item(0);
   if ($node->nodeValue == $_GET['id_detalji']){
     echo' <li id='.$brojSlike.' class="hideable"><img src="slike/'.$node2->nodeValue.'"></li>';
     $brojSlike=$brojSlike+1;
   }
 }*/

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
 $veza->exec("set names utf8");
 $brojSlike=0;
 $rezultat = $veza->query("select idPonude,naziv from slika");
 if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }
 foreach($rezultat as $slika) {
  if($slika["idPonude"]==$_GET['id_detalji'])
  {
    echo' <li id='.$brojSlike.' class="hideable"><img src="slike/'.$slika["naziv"].'"></li>';
    $brojSlike=$brojSlike+1;
  }
 }

  ?>

</ul>
<table id="move">
  <tr>
<td><img type="button" id="preButton" onclick="SlideShow(false)" src="slike/prev.png"></img></td>
<td><p></p></td>
<td><img type="button" id="sljButton" onclick="SlideShow(true)"src="slike/next.png"></img></td>
</tr>
</table>
</div>

    <div class="kolona dva">
      <ul>
        <li>Datum: &nbsp; 24.11.2016. i 13.01.2017.</li>


        <li>Cijena:&nbsp; <?php echo $cijena ?> </li>
      </ul>
      <form method="post" action="">
        <table>
          <tr>
          <td>  <input type=text placeholder="Ime" name="imeRez"> </td>
          </tr>
          <tr>
          <td>  <input type=text placeholder="Prezime" name="prezimeRez"> </td>
          </tr>
          <tr>
          <td>  <input type=text placeholder="Vaš email" name="mailRez"> </td>
          </tr>
          <tr>
          <td>  <input type=text placeholder="Broj telefona" name="brTelRez"> </td>
          </tr>
    <tr>
      <td>  <input type="submit" value="Rezerviši" id="rezervacija" name="submitRezervacija"> </td>
    </tr>

    <?php

  $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
    $veza->exec("set names utf8");
    if (isset($_POST["submitRezervacija"])) {

      $ubaci = $veza->query("insert into rezervacija (idPonude,email,ime,prezime,brTelefona)
      values ('".$_GET['id_detalji']."', '".$_POST['mailRez']."', '".$_POST['imeRez']."', '".$_POST['prezimeRez']."', '".$_POST['brTelRez']."')");

    }
  /*  $xml=new DomDocument("1.0", "ISO-8859-1");
    $xml->load('rezervacije.xml');

    $rootTag=$xml->documentElement;

    if (isset($_POST["submitRezervacija"])) {


      $rezervacijaTag=$xml->createElement("rezervacija");
      $idTag=$xml->createElement("id", 1);
      $imeTag=$xml->createElement("ime", $_POST['imeRez']);
      $prezimeTag=$xml->createElement("prezime",$_POST['prezimeRez'] );
      $mailTag=$xml->createElement("mail",$_POST['mailRez'] );
      $brTelTag=$xml->createElement("brTel",$_POST['brTelRez']);
      $ponudaIdTag=$xml->createElement("idPonude", $_GET['id_detalji']);

      $rezervacijaTag->appendChild($idTag);
      $rezervacijaTag->appendChild($imeTag);
      $rezervacijaTag->appendChild($prezimeTag);
      $rezervacijaTag->appendChild($mailTag);
      $rezervacijaTag->appendChild($brTelTag);
      $rezervacijaTag->appendChild($ponudaIdTag);

      $rootTag->appendChild($rezervacijaTag);
      $xml->save('rezervacije.xml');

}
*/
     ?>
    </table>
    </form>
    </div>
  </div>


    <p><b> &nbsp;&nbsp;&nbsp;<?php echo $opisDetalji ?> </b></p>
    <p>&nbsp;&nbsp;&nbsp;<?php echo $opisDetaljan ?></p>


</div>

</body>
</html>
