<?php
	$monitorTotal = $monitor->totals;
	
	$monitorList['filter']->startDate = $monitorTotal->{"start_date"};
	$monitorList['filter']->endDate = $monitorTotal->{"end_date"};
	
	$monitorList['total']->totalEvents = $monitorTotal->{"ga:totalEvents"};
	$monitorList['total']->uniqueEvents = $monitorTotal->{"ga:uniqueEvents"};

	$index = 0;
	foreach($monitor->data as $key=>$item) {
		$index++;
		$monitorList['data'][$index]->category = $key;
		$firstPos = strripos($key, '[Origin ID:');
		$lastPos = strlen($key)-1;
		$monitorList['data'][$index]->categoryId = substr($key,$firstPos,$lastPos);
		//$monitorList['data'][$index]->categoryEncode = urlencode($key);
		$monitorList['data'][$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList['data'][$index]->uniqueEvents = $item->{"ga:uniqueEvents"};
	}
	
	echo json_encode($monitorList);