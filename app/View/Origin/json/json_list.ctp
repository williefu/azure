<?php
	foreach($origin_ads as &$origin_ad) {
		$origin_ad['Origin']['config'] = json_decode($origin_ad['Origin']['config']);
	}
	
	echo json_encode(compact('origin_ads'));