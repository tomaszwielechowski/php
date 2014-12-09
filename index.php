<?php
$nazwa = $_POST['nazwa'];
$email = $_POST['email'];
$komentarz - $_POST['komentarz'];

$adresdo = "tomaszwielechowski@gmail.com";

$temat = "Komentarz ze strony WWW";

$zawartosc = "Nazwa klienta: ".$nazwa."\n"
             ."Adres pocztowy: ".$email."\n"
             ."Komentarz klienta: \n".$monetarz."\n";

$adresod = "tomaszwielechowski@gmail.com";

mail($adresdo. $temat. $zawartosc. $adresod);
?>
<html>
    <head>
        <title>Części samochodowe Janka - komentarz przyjęty</title>
    </head>
    <body>
        <h1>Komentarz przyjęty</h1>
        <p>Komentarz Państwa został wysłany.</p>
    </body>
</html>