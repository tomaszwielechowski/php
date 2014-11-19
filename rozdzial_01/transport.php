<html>
<body>
<table border="0" cellpading="3">
<tr>
  <td bgcolor = "#CCCCCC" align="center">Odległość</td>
  <td bgcolor = "#CCCCCC" align="center">Koszt</td>
</tr>
<?php
$odleglosc = 50;
while ($odleglosc <= 250) {
  echo "<tr>
        <td align=\"right\">".$odleglosc."</td>
        <td align=\"right\">". ($odleglosc / 10) ."</td>
        </tr>\n";

  $odleglosc += 50;
}

?>
</table>
</body>
</html>