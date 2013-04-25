<?php
	foreach($origin_ads as $key=>&$origin_ad) {
		$origin_ad['OriginAd']['config'] 		= json_decode($origin_ad['OriginAd']['config']);
		$origin_ad['OriginAd']['content'] 		= json_decode($origin_ad['OriginAd']['content']);
	}
	echo json_encode(compact('origin_ads'));