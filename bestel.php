<html>
<head>
	<title>Bestelformulier</title>
</head>
<body>

<?php
ini_set("SMTP", "smtp.kpn.nl");
ini_set("smtp_port", 25);
ini_set("sendmail_from", "burger@eduvision.nl");
function valid_mail ($str) {
return (preg_match ('/(^[0-9a-zA-Z_\.-]{1,}@([0-9a-zA-Z_\-]{1,}\.)+[0-9a-zA-Z_\-]{2,}$)/',
	$str));
}
function valid_name ($str) {
return (preg_match ('/^[A-Za-z. -]+$/', $str));
}
function valid_tussenvoegsel ($str) {
return (preg_match ('/^[A-Za-z ]*$/', $str));
}
function valid_voorletters ($str) {
return (preg_match ('/([A-Z]\.+$/', $str));
}
function valid_achternaam ($str) {
return (preg_match ('/^[A-Za-z -]+$/', $str));
}
function valid_adres ($str) {
return (preg_match ('/^([A-Za-z -])+[0-9]+([a-z -])*$/', $str));
}
function valid_postcode ($str) {
return (preg_match ('/^[1-9][0-9]{3}[]?[A-Za-z]{2}$/', $str));
}
function valid_woonplaats ($str) {
return (preg_match ('/([A-Za-z -])+$/', $str));
}
function valid_telnr ($str) {
return (preg_match ('/^[0-9]{10}$/', $str));
}
function valid_reknr ($str) {
return (preg_match ('/^[1-9][0-9]{3,}$/', $str));
}


if ($_POST["verzendbutton"] != "verzenden" || !valid_mail($_POST["mailadres"]) ||
!valid_voorletters($_POST["voorletters"]) || !valid_tussenvoegsel($_POST["tussenvoegsel"]) ||
!valid_achternaam($_POST["achternaam"])) 
{

	$artikelnaam = $_GET["artikelnaam"] ? $_GET["artikelnaam"] : $_POST["artikelnaam"];
	$artikelnummer = $_GET["artikelnummer"] ? $_GET["artikelnummer"] : $_POST["artikelnummer"];
	$artikelprijs = $_GET["artikelprijs"] ? $_GET["artikelprijs"] : $_POST["artikelprijs"];

echo "<h1>Bestel $artikelnaam</h1>";
echo "Bestelnummer $artikelnummer<br>";
echo "Prijs $artikelprijs &euro;<br><p>";

echo "<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"artikelnaam\" value=\"$artikelnaam\">";
echo "<input type=\"hidden\" name=\"artikelnummer\" value=\"$artikelnummer\">";
echo "<input type=\"hidden\" name=\"artikelprijs\" value=\"$artikelprijs\">";

if ($_POST["verzendbutton"] && !valid_voorletters($_POST["voorletters"])) {
echo "<font color=\"red\">Vul hier uw voorletters correct in!</font>";
}
?>
Voorletters: <input type="text" name="voorletters" value="<?php echo $_POST["voorletters"]
?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_tussenvoegsel($_POST["tussenvoegsel"])) {
 echo "<font color=\"red\"> Vul hier uw tussenvoegsel correct in!</font>";
}
?>
Tussenvoegsel: <input type="text" name="tussenvoegsel" value="<?php echo $_POST["tussenvoegsel"]
?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_achternaam($_POST["achternaam"])) {
 echo "<font color=\"red\"> Vul hier uw achternaam correct in!</font>";
}
?>
Achternaam: <input type="text" name="achternaam" value="<?php echo $_POST["achternaam"]
?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_adres($_POST["adres"])) {
 echo "<font color=\"red\"> Vul hier uw adres correct in!</font>";
 ?>
}

Adres: <input type="text" name="adres" value="<?php echo $_POST["adres"]?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_postcode($_POST["postcode"])) {
 echo "<font color=\"red\"> Vul hier uw postcode correct in!</font>";
}
 ?>

Postcode: <input type="text" name="postcode" value="<?php echo $_POST["postcode"] ?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_woonplaats($_POST["woonplaats"])) {
 echo "<font color=\"red\"> Vul hier uw woonplaats correct in!</font>";
}
 ?>

Woonplaats: <input type="text" name="woonplaats" value="<?php echo $_POST["woonplaats"] ?>"><br>

<?php
if ($_POST["verzendbutton"] && !valid_mail($_POST["mailadres"])) {
 echo "<font color=\"red\"> Vul hier uw mailadres correct in!</font>";
}
?>
E-mail: <input type="text" name="mailadres" value="<?php echo $_POST["mailadres"] ?>"><br>
<?php
if ($_POST["verzendbutton"] && !valid_telnr($_POST["telnr"])) {
 echo "<font color=\"red\"> Vul hier uw telefoonnummer correct in!</font>";
}
?>
Telefoonnummer: <input type="text" name="telnr" value="<?php echo $_POST["telnr"] ?>"><br>
<?php
if ($_POST["verzendbutton"] && !valid_reknr($_POST["reknr"])) {
 echo "<font color=\"red\"> Vul hier uw rekeningnummer correct in!</font>";
} 
?>
Rekeningnummer: <input type="text" name="reknr" value="<?php echo $_POST["reknr"] ?>"><br>

<input type="submit" value="verzenden" name="verzendbutton">
</form>

<?php 
} else {
 echo "Nu worden uw gegevens afgehandeld....";
}

?>
</body>
</html>