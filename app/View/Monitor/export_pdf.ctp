<?php
ob_start();
//App::import('Vendor','tcpdf/tcpdf');
App::import('Vendor','xtcpdf');
set_time_limit(180);
ini_set('memory_limit', '256M');

$pdf = new XTCPDF(); 
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$textfont = 'freesans';

$pdf->SetAuthor("Evolve Media"); 
$pdf->SetAutoPageBreak( false ); 
$pdf->setHeaderFont(array($textfont,'',8)); 

// add a page
$pdf->AddPage(); 


$pdf->Write(0, 'Top Events', '', 0, 'L', 0);

if(isset($events))
	$pdf->Write(0, $action->totals->start_date . ' - ' . $action->totals->end_date, '', 0, 'R', 1);
else
	$pdf->Write(0, $monitor->totals->start_date . ' - ' . $monitor->totals->end_date, '', 0, 'R', 1);
	
$pdf->SetFont('helvetica', '', 8);
// -----------------------------------------------------------------------------
$data = "";
$cont = 0;
if(isset($events)){
foreach($events as $row=>$value):
	$cont++;
	$data .= '<tr>';
	$data .= '<td>'.$cont.'. '.$value->event.'</td>';
	$data .= '<td></td>';
	$data .= '<td>'.$value->totalEvents.'</td>';
	$data .= '<td>'.$value->uniqueEvents.'</td>';
	$data .= '</tr>';
	if(!empty($value->labels)) {
		foreach($value->labels as $label1=>$values):
			$data .= '<tr>';		
			$data .= '<td></td>';
			$data .= '<td>'.$values->label.'</td>';
			$data .= '<td>'.$values->totalEvents.'</td>';
			$data .= '<td>'.$values->uniqueEvents.'</td>';
			$data .= '</tr>';
		endforeach;
	}
endforeach;
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
ob_end_clean();
//Close and output PDF document
$pdf->Output('origin_report.pdf', 'D');