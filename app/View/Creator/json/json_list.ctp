<?php
	foreach($origin_ads as &$origin_ad) {
		$origin_ad['Creator']['config'] = json_decode($origin_ad['Creator']['config']);
	}
	
	echo json_encode(compact('origin_ads'));