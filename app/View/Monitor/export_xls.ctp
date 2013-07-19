<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>
<table>
	<tr>
		<td><b># -------------------------------------------------<b></td>
	</tr>
	<tr>
		<td><b># Evolve Origin Tracking <?php if(isset($category))
														echo 'for: '.$category;
										?><b></td>
	</tr>
	<tr>
		<td><b># Top Events<b></td>
	</tr>
	<tr>
		<td><b># 
		<?php if(isset($template)) {
				if($template==0)
					echo $monitor->totals->start_date . '  -  ' . $monitor->totals->end_date;
				else
					echo $action->totals->start_date . ' - ' . $action->totals->end_date;
			}
			else {
				echo $monitor->totals->start_date . '  -  ' . $monitor->totals->end_date;
			}
		?><b></td>
	</tr>
	<tr>
		<td><b># -------------------------------------------------<b></td>
	</tr>
	<tr>
		<td></td>
	</tr>
			
		<?php 
			if(isset($template) && $template==1) { 
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
				echo '<tr id="titles">';
				echo '<td class="tableTd">Event Action</td>';
				echo '<td class="tableTd">Event Label</td>';
				echo '<td class="tableTd">Total Events</td>';
				echo '<td class="tableTd">Unique Events</td>';
				echo '</tr>	';
				$cont = 0;
				foreach($monitor as $row=>$value):
					$cont++;
					echo '<tr>';
					echo '<td class="tableTdContent">'.$cont.'. '.$value->event.'</td>';
					echo '<td class="tableTdContent"></td>';
					echo '<td class="tableTdContent">'.$value->totalEvents.'</td>';
					echo '<td class="tableTdContent">'.$value->uniqueEvents.'</td>';
					echo '</tr>';
					echo '<tr>';
						if(empty($value->labels)) {
							echo '<td class="tableTdContent"></td>';
							echo '<td class="tableTdContent"></td>';
							echo '<td class="tableTdContent"></td>';
							echo '<td class="tableTdContent"></td>';
						}
						else {
							foreach($value->labels as $label1=>$values) {
								echo '<td class="tableTdContent"></td>';
								echo '<td class="tableTdContent">'.$values->label.'</td>';
								echo '<td class="tableTdContent">'.$values->totalEvents.'</td>';
								echo '<td class="tableTdContent">'.$values->uniqueEvents.'</td>';
							}
						}
					echo '</tr>';
				endforeach;
			}
			else {
				echo '<tr id="titles">';
				echo '<td class="tableTd">Event Category</td>';
				echo '<td class="tableTd">Total Events</td>';
				echo '<td class="tableTd">Unique Events</td>';
				echo '</tr>	';	
				$cont = 0;
				foreach($monitor->data as $row=>$value):
					$cont++;
					echo '<tr>';
					echo '<td class="tableTdContent">'.$cont.'. '.$row.'</td>';
					echo '<td class="tableTdContent">'.$value->{"ga:totalEvents"}.'</td>';
					echo '<td class="tableTdContent">'.$value->{"ga:uniqueEvents"}.'</td>';
					echo '</tr>';
				endforeach;
			}
		?>
</table>

