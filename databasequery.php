<?php
$db = mysql_connect("localhost", "root","")
or die("Kan niet verbinden:" .mysql_error());
mysql_select_db("leerphp", $db);
$sql = "SELECT * FROM artikel";
$resultaat = mysql_query($sql);
if (mysql_num_rows($resultaat) >0) {
	echo "<html> <body><table border=1>";
	echo "<tr><td><b>Naam</b></td><td><b>Omschrijving </b></td>
	<td><b>Prijs in &euro;
	</b></td></tr>";
while ($rij=mysql_fetch_array($resultaat)){
	echo "<tr>";
	echo "<td>".$rij["Naam"]."</td>";
	echo "<td>".$rij["Omschrijving"]."</td>";
	echo "<td>".$rij["Prijs"]."</td>";
	echo "</tr>";
}
echo "</table></body></html>";
}

mysql_close($db);
?>