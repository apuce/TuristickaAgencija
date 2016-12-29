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
        <td><input name="submit" type="submit" value=" Login "></td>
      </tr>
    </table>
      <span><?php echo $error; ?></span>
  </form>
  </div>
</div>

<div id="stranica">


  <?php
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
    if($brojac==4)break; // na naslovnoj se prikazuju samo 4 ponude;
  }


  ?>

  <div id="footer" class="red">

  <div class="kolona jedan">
  <form id="voting" action="" method="post">
  <table>
  <tr>
  <td>Ocijenite usluge agencije "amina."</td>
  </tr>
  <tr>
  <td><input type="radio" name="vote" value="jedan" checked="true"> 1<br><td>
  </tr>
  <tr>
  <td><input type="radio" name="vote" value="dva"> 2<br></td>
  </tr>
  <tr>
  <td><input type="radio" name="vote" value="tri"> 3<br></td>
  </tr>
  <tr>
  <td><input type="radio" name="vote" value="cetiri"> 4<br></td>
  </tr>
  <tr>
  <td><input type="radio" name="vote" value="pet"> 5<br></td>
  </tr>
  <tr>
  <td><input type="submit" value="Glasaj" name="submitAnketa"> </td>
    </td>
  </tr>
  </table>
  </form>
  </div>

  <div class="kolona jedan">
  </div>

  <div class="kolona jedan">
  </div>


  </div>


</div>

</BODY>
</HTML>
