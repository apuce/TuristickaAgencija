<?php
include('session.php');
include('dodajPonudu.php');
include('izbrisiPonudu.php');
include('izmjena.php');
include('downloadCSV.php');
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
  		<li><b><a>Dobrodosao, <?php echo $login_session; ?>! </a></b></li>
    </div>
  <div class="kolona jedan">
    <form action="" method="post">
  <li><b id="logout"><a href="logout.php"> Odjavi se </a></b></li>
  </form>
  </div>
</div>


<div id="buttoni" class="red">

<br>
&nbsp;&nbsp;&nbsp;
<tr>
  <td>  <a href="ponude.csv" download> <img src="slike/buttonDownloadCSV.png" alt=""></a> </td> &nbsp;&nbsp;
  <td>  <a href="downloadPDF.php" > <img src="slike/buttonDownloadPDF.png" alt=""></a> </td>&nbsp;&nbsp;
  <td>  <a href="prikaziPoruke.php"> <img src="slike/buttonPoruke.png" alt=""></a> </td>&nbsp;&nbsp;
  <td>  <a href="prikaziOcjene.php"> <img src="slike/buttonAnketa.png" alt=""></a> </td>
  <td>  <a href="prebaciUbazu.php"> <img src="slike/buttonPrebaci.png" alt=""></a> </td>
    <td>  <a href="prikaziRezervacije.php"> <img src="slike/buttonRezervacije.png" alt=""></a> </td>

  </tr>
<br>
<br>



</div>
<div id=red2 class="red">
  <div class="kolona jedan">

    <form action="" method="post" enctype="multipart/form-data" >
      <br>
    <b>  DODAVANJE NOVE PONUDE </b>
    <br>
    <br>
      <table>
        <tr>
          <td>Naziv nove ponude:<br> <input type="text" name="destinacijaPonude" id="destinacijaPonude"></input></td>
</tr>
<tr>
          <td>Opis nove ponude: <br><input type="text" name="nazivPonude" id="nazivPonude"></input></td>

        </tr>

        <tr>
          <td>Detaljan opis ponude: <br><input type="text" name="opisPonude" id="opisPonude"></input></td>
        </tr>

        <tr>
          <td>Cijena ponude: <br><input type="number" name="cijenaPonude" id="opisPonude"></input></td>
        </tr>

        <tr>
          <td>
            <input type="file" name="photo"> <br>
          </td>
        </tr>
        <tr>
          <td>Dodajte jos neke slike:</td>
        </tr>
        <tr>
          <td>
            <input type="file" name="photo2"> <br>
          </td>
        </tr>
        <tr>
          <td>
            <input type="file" name="photo3"> <br>
          </td>
        </tr>
        <tr>
          <td>
            <input type="file" name="photo4"> <br>
          </td>
        </tr>

        <tr>
          <td>
            <?php
            /*
            $xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
            $id=0;
            foreach($xml->ponuda as $ponuda){
              $id=$ponuda->id;
            }*/

            $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
            $veza->exec("set names utf8");
            $id=0;
            $rezultat = $veza->query("select id from ponuda");
            if (!$rezultat) {
                   $greska = $veza->errorInfo();
                   print "SQL greška: " . $greska[2];
                   exit();
              }
          foreach($rezultat as $ponuda) {
            $id=$ponuda["id"];
          }
            ?>
            <input type="text" name="idPonude" value = "<?php echo (isset($id))?$id+1:'';?>" readonly>
          </td>
        </tr>

        <tr>
      <td>  <input type="submit" value="Dodaj ponudu" name="submit2"> </td>
          </tr>
      </table>
    </form>
    <br>
  </div>
</div>


<div id="stranica">

<?php
/*
$xml=simplexml_load_file("ponude.xml") or die("Error: Cannot create object");
$brojac=0;
foreach($xml->ponuda as $ponuda){
  if($brojac%2==0){echo '<div class="kolona dva"> ';}
  echo '<div id="pocetna1" class="red" style="background-image:url(slike/'.$ponuda->slika.'")"> ';
  echo '<h2>' . $ponuda->naziv . '</h2>';
  echo '<h4>' . $ponuda->opis . '</h4>';
  $br=$ponuda->id;
  echo '<form action="" method="post"> <input type="submit" value="Izbrisi" class="dugmad" name="submitObrisi'.$br.'"> </form><br>';
  echo '<form action="" method="post"> <input type="submit" value="Izmijeni" class="dugmad" name="submitIzmijeni'.$br.'"> </form>';
  echo '</div>';
  if($brojac%2==1){echo '</div>';}
  $brojac=$brojac+1;
}*/

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
  $br=$ponuda["id"];
  echo '<form action="" method="post"> <input type="submit" value="Izbrisi" class="dugmad" name="submitObrisi'.$br.'"> </form><br>';
  echo '<form action="" method="post"> <input type="submit" value="Izmijeni" class="dugmad" name="submitIzmijeni'.$br.'"> </form>';
  echo '</div>';
  if($brojac%2==1){echo '</div>';}
  $brojac=$brojac+1;
}


?>


</div>

</BODY>
</HTML>
