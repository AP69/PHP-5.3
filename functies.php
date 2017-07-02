<?php
function header () {
..... Deze functie bouwt de bovenkant van het scherm (logo, knoppenbalk,) op.
}
function footer () {
.... Deze functie bouwt de onderkant van het scherm op.
}
function check_invoer($invoer) {
..... Deze functie controleert de invoer
return $uitkomst; // geef uitkomst terug
}
function toon_invoer_scherm() {
..... Deze functie laat de invoervelden zien
}
function mededeling($tekst) {
.... Zet mededeling op het scherm
}
//Hoofdprogramma
header();
$result = check_invoer($invoer);
if ($result == "incorrect" OR !$result) {
	toon_invoer_scherm();
} else {
	mededeling($invoer);
}
footer();
?>