<?php

$vorige_url = getenv("HTTP_REFERER");
if ($vorige_url !="http://www.leer-php.nl/formulieren/mailform.htm")
echo "U kunt dit script niet aanroepen vanaf een andre locatie";
exit;

?>