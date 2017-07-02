<?php

function puttext() {
	global $tekst; // gebruik variabele uit het hoofdscript
	echo $tekst;
}
$tekst = "Hello World!";
puttext(); // roep functie aan

?>