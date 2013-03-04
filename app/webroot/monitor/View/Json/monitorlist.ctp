<?php
	$this->layout = 'ajax';
	Configure::write('debug', 0);
	header('conten-type:text/x-json');
	header('cache-control:no-store,no-cache,max-age=0,must-revalidate');

	$monitor = unserialize($monitor);
	$monitorTotal = $monitor->totals;
	
	$index = 0;
	$monitorList['filter']->startDate = $monitorTotal->{"start_date"};
	$monitorList['filter']->endDate = $monitorTotal->{"end_date"};
	$monitorList['total']->totalEvents = $monitorTotal->{"ga:totalEvents"};
	$monitorList['total']->uniqueEvents = $monitorTotal->{"ga:uniqueEvents"};

	foreach($monitor->data as $key=>$item) {
		$index++;
		$monitorList['data'][$index]->category = $key;
		$monitorList['data'][$index]->categoryEncode = urlencode($key);
		$monitorList['data'][$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList['data'][$index]->uniqueEvents = $item->{"ga:uniqueEvents"};
		/*$monitorList[$index]->category = $key;
		$monitorList[$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};*/
		
	}

	echo json_encode($monitorList);

?>