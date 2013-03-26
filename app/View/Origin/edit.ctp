
<div id="ad-edit" ng:controller="creatorController">
	<input id="originAd_id" type="hidden" value="<?php echo $this->params['originAd_id'];?>"/>
	
	<div id="creator-panel-top">
		<ul>
			<li ng:repeat="schedule in creator.ad.OriginAdSchedule">{{schedule.id}}</li>
		</ul>
	</div>
	<div id="creator-panel-left">
		left
	</div>
	<div id="creator-panel-workspace" ng:class="workspace-{{creator.template.content.alias}}">
		workspace
	</div>
</div>
<?php
	echo $this->Minify->css(array('creator'));
	echo $this->Minify->script(array('creatorController'));