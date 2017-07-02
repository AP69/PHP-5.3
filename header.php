<?php
session_start();
ini_set("SMTP", "smtp.chello.nl");
ini_set("smtp_port", 25);
ini_set ("sendmail_from", "burger@leer-php.nl");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> MyWebshop </TITLE>
<script language="javascript">
function Confirm(i)
{
	var conmessage = new Array(3)
	conmessage[0] = "Weet u zeker dat u de bestelling wilt uitvoeren?"
	conmessage[1] = "Weet u zeker dat u dit artikel wilt wissen?"
	conmessage[2] = "Wilt u deze bestelling verwijderen?"

	var DoConfirm = confirm(conmessage[i]);
	if (DoConfirm)
	return true ;
	else
	return false ;
}
</script>
<style type="text/css">
body, td, form, input, submit, select {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: black}
a {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #333333}
.big {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; color: #EE153C}
.kop {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #EE153C}
.main {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; color: white}
.mainkop {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #F1F3D1}
</style>
</HEAD>

<BODY topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr>
		<td width=2% bgcolor="#1104FF">&nbsp;</td>
		<td colspan=2 bgcolor="#1104FF" class="main">MyWebshop <a href="zoek.php" class="mainkop">[zoek]</a>&nbsp;<a href="winkelwagen.php" class="mainkop">[winkelwagen]</a>&nbsp;<a href="admin.php" class="mainkop">[admin]</a>&nbsp;<a href="logout.php" class="mainkop">[logout]</a></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td width=2%>&nbsp;</td>
		<td height=100% width=90%>

<?php
require "../../mysqldb.php";
$sitepad = "/uploadimages/"; // voor afbeeldingen in site
$pad = "../uploadimages/"; // plaats afbeeldingen op server
?>