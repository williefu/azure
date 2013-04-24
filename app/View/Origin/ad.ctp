<?php
	$contentArray		= ['OriginAd'.$originAd_platform.'InitialContent', 'OriginAd'.$originAd_platform.'TriggeredContent'];
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
	$template	= $origin_ad['OriginAd']['config']->template;
?>
<script type="text/javascript">
	var origin_ad		= '<?php echo json_encode($origin_ad);?>';
	var origin_platform	= '<?php echo $originAd_platform;?>';
</script>
<div id="<?php echo $template;?>">
	<?php echo $this->element('/ad/'.$template, array('origin_ad'=>$origin_ad));?>
</div>

<?php
	echo $this->Minify->css(array('ad/ad', 'ad/'.$template));
	echo $this->Minify->script(array('angularjs', 'ad/app/anim', 'ad/app/xd', 'ad/app/app', 'ad/app/controller', 'ad/app/directives'));