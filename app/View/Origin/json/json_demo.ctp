<?php
/*
	$contentArray		= ['OriginAdDesktopInitialContent', 'OriginAdDesktopTriggeredContent', 'OriginAdMobileInitialContent', 'OriginAdMobileTriggeredContent', 'OriginAdTabletInitialContent', 'OriginAdTabletTriggeredContent'];

	$origin_ad['OriginAd']['config'] 		= json_decode($origin_ad['OriginAd']['config']);
	$origin_ad['OriginAd']['content'] 		= json_decode($origin_ad['OriginAd']['content']);

	foreach($origin_ad['OriginAdSchedule'] as $skey=>$schedules) {
		foreach($contentArray as $contentName) {
			foreach($schedules[$contentName] as $ckey=>$content) {
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['content']	= json_decode($content['content']);
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['config']	= json_decode($content['config']);
			}
		}
	}
	
*/
	//print_r($origin_ad);
	echo json_encode($origin_demo);