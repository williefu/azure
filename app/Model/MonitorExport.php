<?php
App::uses('Monitor', 'Model');

class MonitorExport extends AppModel {

	/*
    * Function that export data to excel
    */
    function export($data) {
		
		switch($data['type']) {
			case 'single':
				$category = $data[''];
				$category = $data['filter'];
				header("Content-type: application/x-msdownload");
				header("Content-Disposition: attachment; filename=extraction.xls");
				header("Pragma: no-cache");
				header("Expires: 0");

				$header = "# ------------------------------------------------------------\n";
				$header.= "# SI Event Tracking for: ". $category ."\n";
				$header.= "# Top Events\n";
				$header.= "#". $start ." - ".$end."\n";
				$header.= "# ------------------------------------------------------------\n";
				//$header.= "Event Action\tTotal Events\tUnique Events\tEvent Value\tAvg. Value";
				/*if($label) {
					$info = "Event Action\tEvent Label\tTotal Events\tUnique Events\n";
					foreach($data[$category] as $key=>$row) {
						$info .= $key . "\n";
						foreach($row as $key2=>$row2) {
							$info .= " \t" .  $key2 . "\t" . $row2['ga:totalEvents'] . "\t" . $row2['ga:uniqueEvents']. "\n";
						}
					}
				}
				else {
					$info = "Event Action\tEvent Label\tTotal Events\tUnique Events\n";
					//print_r($data[$category]);
					foreach($data[$category] as $key=>$row) {
						$info .= $key . "\t" . $row['ga:totalEvents'] . "\t" . $row['ga:uniqueEvents']. "\n";
					}
				}*/
				/*$info = "Event Action\tEvent Label\tTotal Events\tUnique Events\n";
				foreach($data[$category] as $key=>$row) {
					if($row[0]=='ga:totalEvents') {
						$info .= $key . "\t" . $row2 . "\t" . $row2. "\n";
					}
					else {
						$info .= $key . "\n";
						foreach($row as $key2=>$row2) {
							$info .= " \t" .  $key2 . "\t" . $row2['ga:totalEvents'] . "\t" . $row2['ga:uniqueEvents']. "\n";
						}
					}
				}*/
				//without label
				/*$info = "Event Action\tEvent Label\tTotal Events\tUnique Events\n";
					//print_r($data[$category]);
					foreach($data[$category] as $key=>$row) {
						$info .= $key . "\t\t" . $row['ga:totalEvents'] . "\t" . $row['ga:uniqueEvents']. "\n";
					}
					*/
				print "$header\n$info";
				break;
			case 'multiple':
				$start = $data['monitor_filter']['startDate'];
				$end = $data['monitor_filter']['endDate'];
				
				ob_start();
				header("Content-type: application/x-msdownload");
				header("Content-Disposition: attachment; filename=extraction.xls");
				header("Pragma: no-cache");
				header("Expires: 0");

				$header = "# ------------------------------------------------------------\n";
				$header.= "# SI Event Category\n";
				$header.= "# Top Events\n";
				$header.= "#". $start ." - ".$end."\n";
				$header.= "# ------------------------------------------------------------\n";
				//$header.= "Event Action\tTotal Events\tUnique Events\tEvent Value\tAvg. Value";
				$info = "Event Category\tTotal Events\tUnique Events\n";
				foreach($data['monitor_list'] as $key=>$row) {
					$info .= $row['category'] . "\t" . $row['totalEvents'] . "\t" . $row['uniqueEvents']. "\n";
				}
				
				print "$header\n$info";
				//print "$info";
				break;
			
		}
    }
	
}
