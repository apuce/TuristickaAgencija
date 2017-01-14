<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) {

  $idPonude = $_GET['id'];
  $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO('mysql:host=localhost;dbname=ta;charset=utf8', 'tauser', 'tapass');
  $veza->exec("set names utf8");

  $upit = $veza->prepare("SELECT * FROM ponuda WHERE id=?");
  $upit->bindValue(1, $idPonude, PDO::PARAM_INT);
  $upit->execute();



$rezultat = "{ \"ponude\": " . json_encode($upit->fetchAll(PDO::FETCH_ASSOC)) . "}";
return $rezultat;

}

function rest_get_sve($request) {

  $veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO('mysql:host=localhost;dbname=ta;charset=utf8', 'tauser', 'tapass');
  $veza->exec("set names utf8");

  $upit = $veza->prepare("SELECT * FROM ponuda");
  $upit->execute();

  $rezultat = "{ \"ponude\": " . json_encode($upit->fetchAll(PDO::FETCH_ASSOC)) . "}";
  return $rezultat;

}

function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {

    case 'GET':
        zag(); $data = $_GET;
        if($data==null)$rezultat = rest_get_sve($request);
        else $rezultat = rest_get($request, $data);
        echo $rezultat;
        break;

    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>
