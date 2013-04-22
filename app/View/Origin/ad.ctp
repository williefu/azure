<?php
	//print_r($origin_ad);

	$contentArray		= ['OriginAdDesktopInitialContent', 'OriginAdDesktopTriggeredContent'];

	$origin_ad['OriginAd']['config'] 		= json_decode($origin_ad['OriginAd']['config']);
	$origin_ad['OriginAd']['content'] 		= json_decode($origin_ad['OriginAd']['content']);

	foreach($origin_ad['OriginAdSchedule'] as $skey=>$schedules) {
		foreach($contentArray as $contentName) {
			foreach($schedules[$contentName] as $ckey=>$content) {
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['content']	= json_decode($content['content']);
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['config']	= json_decode($content['config']);
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['render']	= urlencode($content['render']);
			}
		}
	}
	//print_r($origin_ad);
	//echo json_encode($origin_ad);
?>




<script type="text/javascript">
	var origin_ad	= '<?php echo json_encode($origin_ad);?>';
</script>

<?php
	echo $this->Minify->script(array('angularjs', 'ad/app/app', 'ad/app/controller', 'ad/app/directive'));
	
	
	