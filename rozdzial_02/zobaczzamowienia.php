<?php
  // utworzenie kr�tkich nazw zmiennych
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Cz�ci samochodowe Janka � zam�wienia klient�w</title>
</head>
<body>
<h1>Cz�ci samochodowe Janka</h1>
<h2>Zam�wienia klient�w</h2>
<?php

@ $wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'rb');

  if (!$wp) {
    echo "<p><strong>Brak zam�wie�.
         Prosz� spr�bowa� p�niej.</strong></p>";
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