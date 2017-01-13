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
		<li><a href="OnamTA.php" id="option2"  >O nama</a></li>
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

<div id="main" class="red">
<h2>“We travel not to escape life, but for life not to escape us.”</h2><br><br>
<p>Turistička agencija 'amina. osnovana je 2011. godine. Mlada po stažu, zrela po iskustvu tima koji je čini, postaće i ostaće vaša agencija.
<br>Profesionalna, iskusna, precizna i fleksibilna, diskretna i ozbiljna…
Onakva kakvu zaslužujete. Sa željom da unese i dio svoje kreativnosti u pružanju turističkih usluga na ovom tržištu, kao i da ponudu obogati
nekim novim sadržajima nastala je turistička agencija 'amina.'.
Visokoobučeni kadrovi, tehnička opremljenost, i pažljiv izbor partnera kako u zemlji tako i u inostranstvu, učiniće da vaše putovanje bude
baš onakvo kakvim ste ga i zamislili. Kvalitet servisa biće nam imperativ, a zadovoljstvo klijenata našom uslugom zvijezda vodilja u poslovanju.
U narednom periodu i nakon nebrojeno mnogo uspješno organizovanih putovanja širom svijeta, pozicionirat ćemo se na tržištu među
vodećim turističkim agencijama.
Turistička ponuda agencije 'amina.'  svrstava se u najraznovrsniju i najpovoljniju. Organizujemo turističke obilaske najvećih
svjetskih metropola kao što su: Istanbul, Prag, Rim, Venecija, Milano, Pariz, Barcelona, Madrid, Beč, Budimpešta, Minhen, Amsterdam,
Lisabon, Moskva, Dubai… Kod nas možete naći i aranžmane za ljetnu i zimsku sezonu, daleke destinacije, krstarenja, izlete, grupne i
individualne programe, avio karte, hotelski smještaj, rent a car.
<br>
<br>
Rukovodimo se poslovicom da VRIJEDITE ONOLIKO KOLIKO STE DRUGIMA POTREBNI. Učinite da vrijedimo, zadovoljsto biće i vaše.
Napravite dobar izbor, budite naš klijent, a mi ćemo učiniti sve da ukazano povjerenje opravdamo. Očekujemo vaše dobronamjerne prijedloge
i sugestije, kako bi bili bolji i približili se onome što se zove vrh.</p>
</div>

<div id="footer" class="red">

  <div class="kolona jedan">
  <form id="voting" action="" method="post">
  <table>
  <tr>
  <td>Ocijenite usluge agencije "amina."<br></td>
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
  </tr>
  </table>
  </form>
  </div>

<div class="kolona jedan">
</div>

<div class="kolona jedan">
</div>




</div>
