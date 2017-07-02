<?php
include "autenticatie.php";
session_start();
if( isset($_GET['ADD'] ) && preg_match('/^[1-9][0-9]*$/', $_GET['aantal'])) {
$_SESSION['winkelwagen'][$_GET['ID']] = $_GET['aantal'];
}
if( isset($_GET['DEL']) ) {
unset($_SESSION['winkelwagen'][$_GET['ID']]);
}
if( isset($_GET['EMP']) ) {
unset($_SESSION['winkelwagen']);
}
if( isset($_SESSION['winkelwagen']) ) {
foreach ($_SESSION['winkelwagen'] as $key=>$val ) {
echo "$val x $key<br>";
}
}
?>
<form>
Product:
<input type="text" name="ID"><br>
Aantal:
<input type="text" name="aantal"><br>
<input type="submit" name="ADD" value="Toevoegen">
<input type="submit" name="DEL" Value="Verwijderen">
<input type="submit" name="EMP" value="Legen">
</form>