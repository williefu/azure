<?php
App::import('Vendor','tcpdf/tcpdf');
//set_time_limit(180);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Evolve Media');
$pdf->SetTitle('Evolve Origin Tracking');
$pdf->SetSubject('TCPDF Test');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

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
/*if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}*/

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 13);

// add a page
$pdf->AddPage();
$pdf->Write(0, 'Top Events', '', 0, 'L', 0);
$pdf->SetFont('helvetica', '', 12);
//$pdf->Write(0, $monitor->totals->start_date . ' - ' . $monitor->totals->end_date, '', 0, 'R', 1);
if(isset($template)) {
	if($template==0)
		$pdf->Write(0, $monitor->totals->start_date . ' - ' . $monitor->totals->end_date, '', 0, 'R', 1);
	else
		$pdf->Write(0, $action->totals->start_date . ' - ' . $action->totals->end_date, '', 0, 'R', 1);
}
else {
	$pdf->Write(0, $monitor->totals->start_date . ' - ' . $monitor->totals->end_date, '', 0, 'R', 1);
}
$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$data = "";
$cont = 0;
if(isset($template) && $template==1){
$index = 0;
foreach($action->data as $key=>$item) {
	$index++;
	$monitor[$index]->event = $key;
	$monitor[$index]->totalEvents = $item->{"ga:totalEvents"};
	$monitor[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};

	if(isset($label->data)) {
		$i = 0;
		$monitorLabel = array();
		foreach($label->data as $event=>$value) {
			if($event==$key) {
				foreach($value as $label1=>$value) {
					$i++;
					$monitorLabel[$i]->label = $label1;
					$monitorLabel[$i]->totalEvents = $value->{"ga:totalEvents"};
					$monitorLabel[$i]->uniqueEvents = $value->{"ga:uniqueEvents"};
				}
			}
		}
		$monitor[$index]->labels = $monitorLabel;		
	}
}
foreach($monitor as $row=>$value) {
	$cont++;
	$data .= '<tr>';
	$data .= '<td>'.$cont.'. '.$value->event.'</td>';
	$data .= '<td></td>';
	$data .= '<td>'.$value->totalEvents.'</td>';
	$data .= '<td>'.$value->uniqueEvents.'</td>';
	$data .= '</tr>';
	$data .= '<tr>';
	if(empty($value->labels)) {
		$data .= '<td></td>';
		$data .= '<td></td>';
		$data .= '<td></td>';
		$data .= '<td></td>';
	}
	else {
		foreach($value->labels as $label1=>$values):
			$data .= '<td></td>';
			$data .= '<td>'.$values->label.'</td>';
			$data .= '<td>'.$values->totalEvents.'</td>';
			$data .= '<td>'.$values->uniqueEvents.'</td>';
		endforeach;
	}
	$data .= '</tr>';
}
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
<tr>
<td>Event Action</td>
<td>Event Label</td>
<td>Total Events</td>
<td>Unique Events</td>
</tr>
$data
</table>
EOD;
}
else{
foreach($monitor->data as $row=>$value):
	$cont++;
	$data .= '<tr>';
	$data .= '<td>'.$cont.'. '.$row.'</td>';
	$data .= '<td>'.$value->{"ga:totalEvents"}.'</td>';
	$data .= '<td>'.$value->{"ga:uniqueEvents"}.'</td>';
	$data .= '</tr>';
endforeach;
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
<tr>
<td>Event Category</td>
<td>Total Events</td>
<td>Unique Events</td>
</tr>
$data
</table>
EOD;
}
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('report_pdf.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+