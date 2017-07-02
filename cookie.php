<?php

$naam = $_POST["naam"] ? $_POST["naam"] : $_COOKIE["naam"];
if (isset($naam)) {
	setcookie("naam", "Arjan", time()+60*30);
	echo "Welkom $naam";
} else {
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
Hoe heet je? <input type="text" name="naam">
<input type="submit" name="verzenden" value="verzend">
</form>
<?php
}
?>