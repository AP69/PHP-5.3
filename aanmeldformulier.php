<?php
session_start();
ini_set("SMTP", "smtp.kpn.nl");
ini_set("smtp_port", 25);
ini_set("sendmail_from", "burger@edivision.nl");
function GeneratePassword() {
	$Password = '';
	$Password .= substr("bcdfghjkmnpqrstvwxz", mt_rand(0,18),1);
	$Password .= substr("aeuy", mt_rand(0,3),1);
	$Password .= substr("bcdfghjkmnpqrstvwxz" , mt_rand(0,18),1);
	$Password .= substr("!#*&", mt_rand(0,4),1);
	$Password .= substr("bcdfghjkmnpqrstvwxz", mt_rand(0,18),1);
	$Password .= substr("aeuy", mt_rand(0.3),1);
	$Password .= substr("bcdfghjkmnpqrstvwxz", mt_rand(0,18),1);
	$Password .= substr("23456789", mt_rand(0,7),1);
	return($Password);
}
function valid_mail ($str) {
return (preg_match ('/(^[0-9a-zA-Z_\.-]{1,}@[0-9a-zA-Z_\-]{1,}\.[0-9a-zA-Z_\-]{2,}$/',$str));
}
function valid_naam ($str) {
return (preg_match ('/^[a-z. -]{5,}$/', $str));
}
?>
<html>
<head>
 <title>Aanmeldformulier</title>
 </head>
 <body>
 <?php
 if ($_POST["verzendbutton"] !="verzenden" || !valid_mail($_POST["mailadres"]) ||
   !valid_naam($_POST["naam"])) {
echo "<h1>Aanmelden bij onze winkel</h1>";
echo "<form action=\"".$_SERVER["PHP_SELF"]. "\" method=\"post\">";
if ($_POST["verzendbutton"] && !valid_naam($_POST["naam"])) {
 echo "<font color=\"red\">Vul hier uw naam correct in!</font>";
}
?>
Gebruikersnaam:  <input type="text" name="naam"
 value="<?php echo $_POST["naam"] ?>"><br>
 <?php
 if ($_POST["verzendbutton"] && !valid_mail($_POST["mailadres"] )) {
	echo "<font color=\"red\">Vul hier uw mailadres correct in!</font>";

 }
 ?>
 E-mail: <input type="text" name="mailadres" value="<?php echo $_POST["mailadres"] ?>"><br>
 <input type="submit" value="verzenden" name="verzendbutton">
 </form>
 <?php
} else {
	 $password = GeneratePassword();
	 echo "<br><p>U ontvangt uw inloggevens op ".$_POST["mailadres"]. "<br>";
	 $boodschap = "Welkom bij onze winkel!\n\n";
	 $boodschap .= "Uw gebruikesnaam is: ".$_POST["naam"] ."\n";
	 $boodschap .= "Uw password is: $password\n";
	 $afzender = "website@mijnwinkel.nl";
	 $ok = mail($_POST["mailadres"], "Inloggevens", $boodschap, "From: $afzender");
	 if (!$ok) {
	 echo "De mail kon niet verzonden worden!";
 }
	$_SESSION['naam'] = $_POST["naam"];
	$_SESSION['password'] = md5($password);
	 echo "U kunt nu inloggen in de  <a href=\"winkel.php\">Winkel</a>";
 }
?>
</body>
</html>



