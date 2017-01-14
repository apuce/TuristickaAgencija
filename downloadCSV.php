<?php
/*$filexml='ponude.xml';

if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
$f = fopen('ponude.csv', 'w');
*/

$f = fopen('ponude.csv', 'w');
$veza = new PDO("mysql:dbname=ta;host=mysql-55-centos7", "tauser", "tapass");//$veza = new PDO("mysql:dbname=ta;host=localhost;charset=utf8", "tauser", "tapass");
$veza->exec("set names utf8");

$rezultat = $veza->query("select * from ponuda");


    while($row = $rezultat->fetch(PDO::FETCH_ASSOC))
    {
        fputcsv($f, $row);
    }

    fclose($f);

?>
