<?php
	$this->layout = 'ajax';
	Configure::write('debug', 0);
	header('conten-type:text/x-json');
	header('cache-control:no-store,no-cache,max-age=0,must-revalidate');

	$monitor = unserialize($monitor);
	$monitorTotal = $monitor->totals;
	
	$monitorList['filter']->startDate = $monitorTotal->{"start_date"};
	$monitorList['filter']->endDate = $monitorTotal->{"end_date"};
	
	$index = 0;
	foreach($monitor->visits as $key=>$item) {
		$index++;
		$monitorList['visits'][$index]->date = $key;
		$monitorList['visits'][$index]->visits = $item->{"ga:visits"};
	}
	
	$monitorList['total']->totalEvents = $monitorTotal->{"ga:totalEvents"};
	$monitorList['total']->uniqueEvents = $monitorTotal->{"ga:uniqueEvents"};

	$index = 0;
	foreach($monitor->data as $key=>$item) {
		$index++;
		$monitorList['data'][$index]->category = $key;
		$monitorList['data'][$index]->categoryEncode = urlencode($key);
		$monitorList['data'][$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList['data'][$index]->uniqueEvents = $item->{"ga:uniqueEvents"};
	}

	echo json_encode($monitorList);

?>