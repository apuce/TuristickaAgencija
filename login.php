<?php

$error='';
session_start();

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username/Password nije validan!";
}
else
{


$username=$_POST['username'];
$password=$_POST['password'];

$username=htmlentities($username, ENT_COMPAT, 'UTF-8');
$password=htmlentities($password, ENT_COMPAT, 'UTF-8');

if(preg_match('/[A-Za-z0-9]+/', $username) && preg_match('/[A-Za-z0-9]+/', $password)){
$xmldoc = new DOMDocument();
$xmldoc->load('korisnici.xml');

$xml=simplexml_load_file("korisnici.xml") or die("Error: Cannot create object");

//$pronadjen=false;
/*foreach($xml->korisnik as $korisnik){
 if($username==$korisnik->username && md5($password)==$korisnik->password)
 {
   $_SESSION['login_user']=$username;
   header("location: ".$korisnik->profil);
   $pronadjen=true;
 }
}*/

$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO('mysql:host=localhost;dbname=ta;charset=utf8', 'tauser', 'tapass');
$veza->exec("set names utf8");

$upit = $veza->prepare("SELECT * FROM korisnik WHERE username=:us");
$upit->bindParam(':us', $username);
$upit->execute();

$rezultat=$upit->fetch();
if($rezultat['password']==$password){
    $_SESSION['login_user']=$username;
    header("location: ".$rezultat['profile']);

}

if($upit->fetch()==null) {
$error = "Username/Password nije validan!";
}

}
}
}
?>
