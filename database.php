<?php
$db = mysql_connect("localhost", "root","")
or die("Kan niet verbinden:" .mysql_error());
mysql_select_db("leerphp", $db);
mysql_close($db);
?>