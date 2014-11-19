<?php
  // utworzenie krótkich nazw zmiennych
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
  <title>Czêœci samochodowe Janka — wyniki zamówienia</title>
</head>
<body>
<h1>Czêœci samochodowe Janka</h1>
<h2>Wyniki zamówienia</h2>
<?php

  echo "<p>Zamówienie przyjête o ".$data."</p>";

  echo "<p>Zamówienie Pañstwa wygl¹da nastêpuj¹co: </p>";

  $ilosc = 0;
  $ilosc = $iloscopon + $iloscoleju + $iloscswiec;
  echo "Zamówionych czêœci: ".$ilosc."<br />";

  if($ilosc == 0) {
    echo "Na poprzedniej stronie nie zosta³o z³o¿one ¿adne zamówienie!<br />";

  } else {

    if ($iloscopon > 0) {
      echo $iloscopon." opon<br />";
    }

    if ($iloscoleju > 0) {
      echo $iloscoleju." butelek oleju<br />";
    }

    if ($iloscswiec > 0) {
      echo $iloscswiec." œwiec zap³onowych<br />";
    }
  }

  $wartosc=0.00;

  define('CENAOPON', 100);
  define('CENAOLEJU', 10);
  define('CENASWIEC', 4);

  $wartosc =$iloscopon * CENAOPON + $iloscoleju * CENAOLEJU + $iloscswiec * CENASWIEC;

  $wartosc=number_format($wartosc, 2, '.', ' ');

  echo "<p>Wartoœæ zamówienia wynosi ".$wartosc."</p>";
  echo "<p>Adres wysy³ki to ".$adres. "</p>";

  $ciagwyjsciowy = $data."\t".$iloscopon." opon \t".$iloscoleju." butelek oleju\t"
                   .$iloscswiec." swiec zap³onowych\t".$wartosc
                   ."PLN\t". $adres."\n";

  // otwarcie pliku w celu dopisywania
  @ $wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'ab');

  flock($wp, LOCK_EX);

  if (!$wp) {
    echo "<p><strong> Zamówienie Pañstwa nie mo¿e zostaæ przyjête w tej chwili.
         Proszê spróbowaæ póŸniej.</strong></p></body></html>";
    exit;
  }

  fwrite($wp, $ciagwyjsciowy, strlen($ciagwyjsciowy));
  flock($wp, LOCK_UN);
  fclose($wp);

  echo "<p>Zamówienie zapisane.</p>";
?>
</body>
</html>