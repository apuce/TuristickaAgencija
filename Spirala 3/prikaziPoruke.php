<?php
$xml=simplexml_load_file("poruke.xml") or die("Error: Cannot create object");

echo '<h1>Poruke posjetioca stranice: </h1>';

foreach($xml->poruka as $poruka){
  echo '<h2> email:  ' . $poruka->email . '</h2>';
  echo '<h4> poruka:  ' . $poruka->komentar . '</h4><br>';
}
 ?>
