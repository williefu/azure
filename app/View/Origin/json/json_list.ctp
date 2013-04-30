<?php
	foreach($origin_ads as $key=>&$origin_ad) {
		$origin_ad['OriginAd']['config'] 		= json_decode($origin_ad['OriginAd']['config']);
		$origin_ad['OriginAd']['content'] 		= json_decode($origin_ad['OriginAd']['content']);
		$origin_ad['OriginAd']['create_date']	= date('n.j.y \a\t\ G:i T', strtotime($origin_ad['OriginAd']['create_date']));
		$origin_ad['OriginAd']['modify_date']	= date('n.j.y \a\t\ G:i T', strtotime($origin_ad['OriginAd']['modify_date']));
		
		foreach($users as $user) {
			if($origin_ad['OriginAd']['create_by'] === $user['User']['id']) {
				$origin_ad['OriginAd']['create_by']	= $user['User']['username'];
			}
			if($origin_ad['OriginAd']['modify_by'] === $user['User']['id']) {
				$origin_ad['OriginAd']['modify_by']	= $user['User']['username'];
			}
		}
	}
	
	echo json_encode(compact('origin_ads'));
	//print_r(compact('origin_ads'));