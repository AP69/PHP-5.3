<?php
require('fpdf.php');
class PDF extends FPDF
{
//Laad gegevens
function LoadData($file)
{
//Lees regel nummers
	$lines=file($file);
	$data=array();
foreach($lines as $line)
	$data[]=explode(';',chop($line));
	return $data;
}
//Gekleurde tabel
	function FancyTable($header,$data,$w)
{
//Kleuren, lijn dikte en vet lettertype
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
//Koptekst
	for($i=0;$i<count($header);$i++)
	$this->Cell($w[$i],7,$header[$i],1,0, 'C',1);
	$this->Ln();
//Herstel van kleuren en lettertype
	$this->SetFillColor(244,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
//gegevens
	$fill=0;
	foreach($data as $row)
{
	$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
	$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
	$this->Cell($w[2],6,number_format($row[2],2,',',''),'LR',0,'R',$fill);
	$this->Ln();
	$fill=!$fill;
}
	$this->Cell(array_sum($w),0,'','T');
}
}
$pdf=new PDF();
//Kolom titels
$header=array('Titel,'Categorie','Prijs');
//Breedtes kolommen
$tabel_width = array(100,30,50);
//Gegevens laden
$data=$pdf->LoadData('titels.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data,$table_width);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data,$table_width);
$pdf->AddPage();
$pdf->FancyTable($header,$data,$table_width);
$pdf->Output();
?>
