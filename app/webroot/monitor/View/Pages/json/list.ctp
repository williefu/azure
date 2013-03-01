holaaaa
<?php
/*
	$monitor	= $this->monitor;
	$monitorTotal	= $this->monitor->totals; 
	//print_r($monitor);
	$index = 0;
	$monitorList['total']->totalEvents = $monitorTotal->{"ga:totalEvents"};
	$monitorList['total']->uniqueEvents = $monitorTotal->{"ga:uniqueEvents"};
	
	foreach($monitor->data as $key=>$item) {
	//print_r($item);
		$index++;
		$monitorList['data'][$index]->category = $key;
		$monitorList['data'][$index]->categoryEncode = urlencode($key);
		$monitorList['data'][$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList['data'][$index]->uniqueEvents = $item->{"ga:uniqueEvents"};
		/*$monitorList[$index]->category = $key;
		$monitorList[$index]->totalEvents = $item->{"ga:totalEvents"};
		$monitorList[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};*/
		
	/*}
	echo json_encode($monitorList);*/
	//echo json_encode($this->monitor);
?>