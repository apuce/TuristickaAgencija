<?php
$filexml='ponude.xml';

if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
$f = fopen('ponude.csv', 'w');

foreach ($xml->ponuda as $ponuda) {
    fputcsv($f, get_object_vars($ponuda),',','"');
}

fclose($f);
}
?>
