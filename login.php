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

$xmldoc = new DOMDocument();
$xmldoc->load('korisnici.xml');

$xml=simplexml_load_file("korisnici.xml") or die("Error: Cannot create object");

$pronadjen=false;
foreach($xml->korisnik as $korisnik){
 if($username==$korisnik->username && $password==$korisnik->password)
 {
   $_SESSION['login_user']=$username; // Initializing Session
   header("location: ".$korisnik->profil); // Redirecting To Other Page
   $pronadjen=true;
 }
}

if($pronadjen==false) {
$error = "Username/Password nije validan!";
}


}
}
?>
