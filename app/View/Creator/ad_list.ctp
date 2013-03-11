<h2>Ad Listing</h2>
<div id="list" ng:controller="listCtrl" ng:app="listApp" class="">
	
	<a href="/creator/edit/{{item.Creator.id}}" id="" class="list-ad" ng:repeat="item in originCreator.list" ng:class="{{item.Creator.config.type}}">
		<!-- <img ng:src="/assets/creator/{{item.Creator.id}}/{{item.Creator.config.triggered_desktop}}"/> -->
		<span>{{item.Creator.name}}</span>
	</a>
	
</div>

<?php
	echo $this->Minify->css(array('creator/creator'));
	echo $this->Minify->script(array('creator/controller', 'creator/services', 'creator/directives', 'creator/filters'));
	
	/*
	
	<a href="index.php?option=com_emc_origin&task=edit&id={{item.id}}" id="list-item-{{item.id}}" class="list-items" ng:repeat="item in listShown" ng:class="{{item.status}} {{item.type}}" list-item>
				<div class="item-preview" style="background-image: url(/assets/components/com_emc_origin/{{item.id}}/{{item.config.triggered_desktop}})"></div>
				<span class="item-id">{{item.id}}</span>
				<div class="item-caption">
					<span class="item-title">{{item.name}}</span>
					<span class="item-modified">Last modified by {{item.modified_by}} on {{item.modify_date}}</span>
				</div>
			</a>
			
			
	*/