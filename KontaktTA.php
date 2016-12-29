<?php
include('dodajKomentar.php');
?>
<?php
include('login.php'); // Includes Login Script

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

<div class="red">

<div class="kolona jedan">

<form id="voting2" action="" method="get">
<table>
<tr><td>Ostavite komentar o svom iskustvu ili postavite pitanje za agenciju:</td> </tr>

<tr>
  <td>email:<input id="email" name="email" type="text" onfocusout="provjeraEmaila()"></td>

</tr>
<tr><td><img class="hideable" id="greska" src="slike/error.png"></img><p id="greskaTekst"></p></td></tr>
<tr>
<td> <textarea type="input" id="area" name="area" rows="4" cols="28" onfocusout="provjeraPoruke()"></textarea></td>
</tr>
<tr>
<td> <input type="submit" value="Posalji!" name="submitKomentar"></td>
</tr>

</table>
</form>

</div>

</div>

<div id="kontakt" class="red">
<br>

<div class="kolona jedan">
<img src="slike/pic1.png" alt="">
<p id="info1">info@agencijaamina.com</p>

</div>

<div class="kolona jedan">
  <img src="slike/pic2.png" alt="">
  <p id="info2">Trg djece Sarajeva br.1<br>
Sarajevo, Bosna i Hercegovina</p>
</div>

<div class="kolona jedan">
  <img src="slike/pic3.png" alt="">
  <p id="info3">+387 32 407 700</p>
</div>

<div class="kolona jedan">
</div>

</div>
</BODY>
</HTML>
