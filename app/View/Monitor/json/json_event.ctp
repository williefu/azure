<?php
	$monitorTotal = $action->totals;
	
	$monitorList['filter']->startDate = $monitorTotal->{"start_date"};
	$monitorList['filter']->endDate = $monitorTotal->{"end_date"};
	
	$monitorList['total']->totalEvents = $monitorTotal->{"ga:totalEvents"};
	$monitorList['total']->uniqueEvents = $monitorTotal->{"ga:uniqueEvents"};

	$index = 0;
		foreach($action->data as $key=>$item) {
			$index++;
			
			$monitorList['data'][$index]->event = $key;
			$monitorList['data'][$index]->totalEvents = $item->{"ga:totalEvents"};
			$monitorList['data'][$index]->uniqueEvents = $item->{"ga:uniqueEvents"};

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
				$monitorList['data'][$index]->labels = $monitorLabel;		
			}
		
		}
	echo json_encode($monitorList);