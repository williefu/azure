<?php
	$dimensions 				= new stdClass();
	
	$triggeredMarginLeft		= '-'.($origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->width/2).'px';
	$triggeredMarginTop			= '-'.($origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->height/2).'px';
	$triggeredMargin 			= "margin:{$triggeredMarginTop} 0 0 {$triggeredMarginLeft}";
	
	
	$dimensions->initial		= "width:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height}px";
	$dimensions->triggered		= "width:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->height}px;{$triggeredMargin}";
?>

<?php if($originAd_state === 'triggered') { ?>
	<script type="text/javascript">
		var originAd_action	= 'close';
	</script>
	<div id="overlay"></div>
	<div id="triggered" style="<?php echo $dimensions->triggered;?>">
		<div ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>TriggeredContent']" content="content"></div>
	</div>
<?php } else { ?>
	<script type="text/javascript">
		var originAd_action	= 'open';
	</script>
	<div id="initial" style="<?php echo $dimensions->initial;?>">
		<div ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
	</div>
<?php } ?>