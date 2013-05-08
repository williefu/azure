<div class="originUI-field">
	<div class="originUI-fieldBracket"></div>
	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><?php echo $this->element('origin_embed');?></textarea>
	
<!-- 	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin.js" data-auto="{{embedOptions.auto}}" data-close="{{embedOptions.close}}" data-hover="{{embedOptions.hover}}" data-dcopt="true" data-id="<?php echo $this->params['originAd_id'];?>" data-type="{{workspace.ad.OriginAd.config.template}}" data-xd="local.origin_test_prod" data-init="true"></script></textarea> -->
</div>
<div id="embedModal-config">
	<ul class="originUI-list">
		<li>
			<label>Frequency Cap (per 24hrs)</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.auto"/>
			</div>
		</li>
		<li>
			<label>Close Timer (seconds)</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.close"/>
			</div>
		</li>
		<li>
			<label>Hover Delay (seconds)</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.hover"/>
			</div>
		</li>
	</ul>
</div>