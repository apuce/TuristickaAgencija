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
    <form id="pretragaIzleta" onsubmit="return false">
    <table>
      <tr>
        <td>Kljucna rijec:</td>
        <td><input type="text" id="kljucnaRijec" onfocusout="provjeraKljucneRijeci()"></td>
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
        <td><input type="submit" id="pretraga"  disabled="true" value="Pretraga" onsubmit="provjeraPretraga()"></input></td>
      </tr>
    </table>
    </form>
  </div>
</div>




<div id="footer" class="red">


</div>
