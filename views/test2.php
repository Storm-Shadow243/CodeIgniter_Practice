<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jean Rostand KAHASHA');
$pdf->SetTitle('Billet de Vol');
$pdf->SetSubject('RVA-RDC');
$pdf->SetKeywords('RVA, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$txt = '<h2><i style="color:purple;">'.$comp.'</i></h2><br><h4>Code IATA&nbsp;&nbsp;<i style="color:blue;">&nbsp;:&nbsp;&nbsp;&nbsp;'.$compC.'</i></h4>';
$text='Billet de Vol conforme Aux Standards Internationaux de L\'IATA et de L\'OACI';
$texte='<table border=0><tr><td>BILLET N° : </td><td><i style="font-weight:bold;color:red;">'.$vol.'-'.$this->session->userdata('idClient').'-'.$res.'</i></td></tr><br><tr><td>CLIENT : </td><td>'.$this->session->userdata('NomCl').' '.$this->session->userdata('Prenom').' </td></tr><br>
<tr><td>NATIONALITE :</td><td><i>'.$this->session->userdata('Nationalite').'</i></td></tr><br>
<tr><td>RESERVATION :</td><td><i>'.$place.' Place(s)</i></td></tr><br>
<tr><td>FACTURATION :</td><td><i>'.$place.' x '.$prix.' $ = '.$place*$prix.' $ US</i></td></tr><br>
<tr><td>DEPART : </td><td><i>'.$aero2.'   à   '.$loc2.' |  '.$code2.'</i></td></tr><br>
<tr><td>DESTINATION : </td><td><i>'.$aero.'   à   '.$loc.' |  '.$code.'</i></td></tr><br>
<tr><td>APPAREIL : </td><td><i style="color:maroon;">'.$immat.'  '.$avion.'</i> | <i style="color:lime;">'.$type.'</i></td></tr></table>';
// Multicell test
$pdf->MultiCell(55, 5,$txt, 0, 'L', 1, 0, '', '', true,false,true);
$pdf->MultiCell(55, 5, $text, 0, 'L', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
$pdf->MultiCell(150, 50, $texte, 0, 'L', 0, 0, '', '', true,false,true);





$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('billetVol.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
