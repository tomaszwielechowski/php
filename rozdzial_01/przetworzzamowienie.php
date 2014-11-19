<html>
<head>
  <title>Częci samochodowe Janka - wyniki zamówienia</title>
</head>
<body>
<h1>Częci samochodowe Janka</h1>
<h2>Wyniki zamówienia</h2>
<?php

  echo '<p>Zamówienie przyjęte o ';
  echo date('H:i, jS F Y');
  echo '</p>';

  echo '<p>Zamówienie Państwa wygląda następująco: </p>';
  echo $iloscopon.' opon<br />';
  echo $iloscoleju.' butelek oleju<br />';
  echo $iloscswiec.' swiec zapłonowych<br />';

  $ilosc = 0;
  $wartosc = 0.00;
  
  $ilosc = $iloscopon + $iloscoleju + $iloscswiec;
  echo 'Zamówionych częci:     '.$ilosc.'<br />';

  $wartosc = 0.00;

  define('CENAOPON', 100);
  define('CENAOLEJU', 10);
  define('CENASWIEC', 4);

  $wartosc = $iloscopon * CENAOPON
             + $iloscoleju * CENAOLEJU
             + $iloscswiec * CENASWIEC;

  echo 'Cena netto: '.number_format($wartosc, 2).' PLN<br />';

  $stawkavat = 0.22;   // stawka VAT wynosi 22%
  $wartosc = $wartosc * (1 + $stawkavat);
  echo 'Cena brutto: '.number_format($wartosc, 2).' PLN<br />';

?>

</body>
</html>