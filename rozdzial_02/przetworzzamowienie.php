<?php
  // utworzenie kr�tkich nazw zmiennych
  $iloscopon = $_POST['iloscopon'];
  $iloscoleju = $_POST['iloscoleju'];
  $iloscswiec = $_POST['iloscswiec'];
  $adres = $_POST['adres'];
  $adres = $_POST['adres'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $data=date('H:i, jS F Y');
?>

<html>
<head>
  <title>Cz�ci samochodowe Janka � wyniki zam�wienia</title>
</head>
<body>
<h1>Cz�ci samochodowe Janka</h1>
<h2>Wyniki zam�wienia</h2>
<?php

  echo "<p>Zam�wienie przyj�te o ".$data."</p>";

  echo "<p>Zam�wienie Pa�stwa wygl�da nast�puj�co: </p>";

  $ilosc = 0;
  $ilosc = $iloscopon + $iloscoleju + $iloscswiec;
  echo "Zam�wionych cz�ci: ".$ilosc."<br />";

  if($ilosc == 0) {
    echo "Na poprzedniej stronie nie zosta�o z�o�one �adne zam�wienie!<br />";

  } else {

    if ($iloscopon > 0) {
      echo $iloscopon." opon<br />";
    }

    if ($iloscoleju > 0) {
      echo $iloscoleju." butelek oleju<br />";
    }

    if ($iloscswiec > 0) {
      echo $iloscswiec." �wiec zap�onowych<br />";
    }
  }

  $wartosc=0.00;

  define('CENAOPON', 100);
  define('CENAOLEJU', 10);
  define('CENASWIEC', 4);

  $wartosc =$iloscopon * CENAOPON + $iloscoleju * CENAOLEJU + $iloscswiec * CENASWIEC;

  $wartosc=number_format($wartosc, 2, '.', ' ');

  echo "<p>Warto�� zam�wienia wynosi ".$wartosc."</p>";
  echo "<p>Adres wysy�ki to ".$adres. "</p>";

  $ciagwyjsciowy = $data."\t".$iloscopon." opon \t".$iloscoleju." butelek oleju\t"
                   .$iloscswiec." swiec zap�onowych\t".$wartosc
                   ."PLN\t". $adres."\n";

  // otwarcie pliku w celu dopisywania
  @ $wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'ab');

  flock($wp, LOCK_EX);

  if (!$wp) {
    echo "<p><strong> Zam�wienie Pa�stwa nie mo�e zosta� przyj�te w tej chwili.
         Prosz� spr�bowa� p�niej.</strong></p></body></html>";
    exit;
  }

  fwrite($wp, $ciagwyjsciowy, strlen($ciagwyjsciowy));
  flock($wp, LOCK_UN);
  fclose($wp);

  echo "<p>Zam�wienie zapisane.</p>";
?>
</body>
</html>