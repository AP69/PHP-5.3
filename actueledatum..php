<?php
include "nieuwsbrief.txt";
$vandaag = date("d-m-Y", time());
$tekst = "De datum vandaag is {datum}";
$tekst = preg_replace("/{datum}/", $vandaag, $tekst);
echo $tekst;
?>