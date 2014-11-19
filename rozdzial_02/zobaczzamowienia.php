<?php
  // utworzenie krótkich nazw zmiennych
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Czêœci samochodowe Janka — zamówienia klientów</title>
</head>
<body>
<h1>Czêœci samochodowe Janka</h1>
<h2>Zamówienia klientów</h2>
<?php

@ $wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'rb');

  if (!$wp) {
    echo "<p><strong>Brak zamówieñ.
         Proszê spróbowaæ póŸniej.</strong></p>";
    exit;
  }

  while (!feof($wp)) {
    $zamowienie = fgets($wp, 999);
    echo $zamowienie."<br />";
  }

  fclose($wp);

?>
</body>
</html>