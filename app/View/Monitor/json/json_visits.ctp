<?php
	$index = 0;
	foreach($visits->data as $key=>$item) {
		$index++;
		$monitorVisits['visits'][$index]->date = $key;
		$monitorVisits['visits'][$index]->visits = $item->{"ga:visits"};
	}
	
	echo json_encode($monitorVisits);