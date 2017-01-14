<?php
include('login.php');
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
<script>

function theFunction(parametar)
{
  document.getElementById("kljucnaRijec").value=parametar;
}

function showResult(s) {
  if (s.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();

  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+s,true);
  xmlhttp.send();
}
</script>

</HEAD>
<BODY>

  <script src="tAgencija.js"></script>

<div id="header" class="red">
<img id="logo" src="slike/sun.png" alt="">
<h1> amina. </h1>
<h3> -putujte sa nama! </h3>
</div>

<div id="meni" class="red">
<div class="kolona tri">
		<ul>
		<li><a href="index.php" id="option1"  >Naslovna</a></li>
		<li><a href="OnamaTA.php" id="option2"  >O nama</a></li>
		<li><a href="PonudeTA.php" id="option3"  >Aktuelne ponude</a></li>
		<li><a href="IzletiTA.php" id="option4"  >Izleti</a></li>
		<li><a href="KontaktTA.php" id="option5"  >Kontakt</a></li>

		</ul>
  </div>
  <div class="kolona jedan">
    <form action="" method="post">
    <table>
      <tr>
        <td><input type="text" id="username" name="username" placeholder="Korisničko ime"></td>
      </tr>
      <tr>
        <td><input id="password" name="password" placeholder="Šifra" type="password" ></td>

      </tr>
      <tr>
        <td><input name="submit" type="submit" value=" Prijava "></td>
      </tr>
    </table>
      <span><?php echo $error; ?></span>
  </form>
  </div>
</div>

<div class="red">
  <div class="kolona sest">
    <br>
  &nbsp;  <img src="slike/search.png" alt="">
  </div>
  <div class="kolona tri">
    <form id="pretragaPonuda" action="" method="get" >
    <table>
      <tr>
        <td>Kljucna rijec:</td>
        <td><input type="text" id="kljucnaRijec" name="kljucnaRijec" size="30" onkeyup="showResult(this.value)" > <div id="livesearch"></div></td>

      </tr>
      <tr>
        <td>Period:</td>
        <td>-od <input type="date" id="datum1" onfocusout="provjeraDatuma()"></td>
      </tr>
      <tr>
        <td></td>
        <td>-do <input type="date" id="datum2" onfocusout="provjeraDatuma()"></td>
      </tr>
      <tr><td><img class="hideable" id="greska" src="slike/error.png"></img><p id="greskaTekst"></p></td></tr>
      <tr>
        <td><input type="submit" id="pretraga" disabled="true" value="Pretraga" name="submitPretraga" onsubmit="provjeraPretraga()"></input></td>
      </tr>
    </table>
    </form>
  </div>
</div>

<div class="red">
  <?php
  if (isset($_GET["submitPretraga"])) {
    /*
  $xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
  $brojac=0;
  $nazivPonude=$_GET["kljucnaRijec"];

  foreach ($xml->ponuda as $ponuda){
   if (strpos($ponuda->naziv, $nazivPonude)!==false || strpos($ponuda->opis, $nazivPonude)!==false){
     if($brojac%2==0){echo '<div class="kolona dva"> ';}
     echo '<div id="pocetna1" class="red" style="background-image:url(slike/'.$ponuda->slika.'")"> ';
     echo '<h2>' . $ponuda->naziv . '</h2>';
     echo '<h4>' . $ponuda->opis . '</h4>';
     echo '</div>';
     if($brojac%2==1){echo '</div>';}
     $brojac=$brojac+1;
   }

 }*/
$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = ("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
 $veza->exec("set names utf8");
 $brojac=0;
 $rezultat = $veza->query("select id,naziv,opis,slika from ponuda");
 if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }

$nazivPonude=$_GET["kljucnaRijec"];
 foreach($rezultat as $ponuda) {
   if (strpos($ponuda["naziv"], $nazivPonude)!==false || strpos($ponuda["opis"], $nazivPonude)!==false){
   if($brojac%2==0){echo '<div class="kolona dva"> ';}
   echo '<div id="pocetna1" class="red" style="background-image:url(slike/'.$ponuda["slika"].'")"> ';
   echo '<h2>' . $ponuda["naziv"] . '</h2>';
   echo '<h4>' . $ponuda["opis"] . '</h4>';
   //echo '<form action="" method="get"> <input type="submit" value="Detalji" class="dugmad" name="submitDetalji'.$ponuda["id"].'"> </form><br>';
   echo '<a href=DetaljiTA.php?id_detalji='.$ponuda["id"].'><button>Detalji </button></a>';
   echo '</div>';
   if($brojac%2==1){echo '</div>';}
   $brojac=$brojac+1;
 }
 }
 }

 else{
/*
   $xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
   $brojac=0;

   foreach($xml->ponuda as $ponuda){
     if($brojac%2==0){echo '<div class="kolona dva"> ';}
     echo '<div id="pocetna1" class="red" style="background-image:url(slike/'.$ponuda->slika.'")"> ';
     echo '<h2>' . $ponuda->naziv . '</h2>';
     echo '<h4>' . $ponuda->opis . '</h4>';
     echo '</div>';
     if($brojac%2==1){echo '</div>';}
     $brojac=$brojac+1;
   }
   */

   $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
   $veza->exec("set names utf8");
   $brojac=0;
   $rezultat = $veza->query("select id,naziv,opis,slika from ponuda");
   if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
   foreach($rezultat as $ponuda) {
     if($brojac%2==0){echo '<div class="kolona dva"> ';}
     echo '<div id="pocetna1" class="red" style="background-image:url(slike/'.$ponuda["slika"].'")"> ';
     echo '<h2>' . $ponuda["naziv"] . '</h2>';
     echo '<h4>' . $ponuda["opis"] . '</h4>';
    // echo '<form action="" method="get"> <input type="submit" value="Detalji" class="dugmad" name="submitDetalji'.$ponuda["id"].'"> </form><br>';
     echo '<a href=DetaljiTA.php?id_detalji='.$ponuda["id"].'><button>Detalji </button></a>';
     echo '</div>';
     if($brojac%2==1){echo '</div>';}
     $brojac=$brojac+1;
 }
 }
     ?>

<?php
$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

$idPosljednje=0;
$rezultat = $veza->query("select id,naziv,opis,slika from ponuda");

if (!$rezultat) {
       $greska = $veza->errorInfo();
       print "SQL greška: " . $greska[2];
       exit();
  }

  foreach ($rezultat as $ponuda) {
    $idPosljednje=$ponuda["id"];
  }

  for($a=1; $a<$idPosljednje+1; $a++){
  if (isset($_GET["submitDetalji".$a])) {

    $id_detalji=$a;
    header("location: DetaljiTA.php?id_detalji=".$a);

  }
}
   ?>
</div>



</BODY>
</html>
