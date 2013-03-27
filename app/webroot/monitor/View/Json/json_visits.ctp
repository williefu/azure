<?php
	$this->layout = 'ajax';
	Configure::write('debug', 0);
	header('conten-type:text/x-json');
	header('cache-control:no-store,no-cache,max-age=0,must-revalidate');

	$visits = unserialize($visits);
	
	$index = 0;
	foreach($visits->data as $key=>$item) {
		$index++;
		$monitorVisits['visits'][$index]->date = $key;
		$monitorVisits['visits'][$index]->visits = $item->{"ga:visits"};
	}
	
	echo json_encode($monitorVisits);

?>