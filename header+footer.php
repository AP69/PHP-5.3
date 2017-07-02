<?php
require('fpdf.php');
class PDF extends FPDF
{
	//page header
	function header()
	{
	..... header code
	}

	//Page footer
	function footer()
	{
	..... footer code
	}
}
//Aanroepen nieuwe class
$pdf=new PDF();
......
?>