<?php
	foreach($activities as &$activity) {
		$activity['activity']['date']	= date('n.j.y \a\t\ G:i T', strtotime($activity['activity']['date']));
		
		foreach($users as $user) {
			if($activity['activity']['userid'] === $user['User']['id']) {
				$activity['activity']['userid'] = $user['User']['username'];
			}
		}
	}
	
	echo json_encode($activities);