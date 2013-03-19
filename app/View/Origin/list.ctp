
<div id="list" ng:controller="listCtrl" class="">
	<h2 class="originUI-header">Ad Listing</h2>
    <div id="">
    	<a href="javascript:void(0);" id="list-create" class="list-ad" ng:click="listCreateNew()">Create New</a>
		<a href="edit/{{item.OriginAd.id}}" id="" class="list-ad" ng:repeat="item in originCreator.list" ng:class="item.OriginAd.config.type">
			<!-- <img ng:src="/assets/creator/{{item.Creator.id}}/{{item.Creator.config.triggered_desktop}}"/> -->
			<span>{{item.OriginAd.name}}</span>
		</a>
    </div>
    {{originCreator.templates[0].OriginAdTemplate.name}}
    
    <div modal="listCreateModal" close="listCreateModalClose()" options="listCreateModalOptions">
    	<form ng:model="originCreator.form" id="list-create-modal" class="originUI-bgColor originUI-modal">
    		<h3 id="create-modal-title" class="originUI-header">Select Origin Ad Template</h3>
    		<p id="create-modal-description">
	    		{{originCreator.form.OriginAdTemplate.description}}
    		</p>
    		<img id="create-modal-image" ng:src="{{originCreator.form.OriginAdTemplate.img_large}}"/>
    		<select ng:model="originCreator.form" ng:options="template.OriginAdTemplate.name for template in originCreator.templates"></select>
    		
    		
	    </form>
    </div>
</div>

<?php
	
	/*
	select as label for value in array
	array = [{ "value": 1, "text": "1st" }, { "value": 2, "text": "2nd" }];

<select ng-options="obj.value as obj.text for obj in array"></select>
	
	
	<a href="index.php?option=com_emc_origin&task=edit&id={{item.id}}" id="list-item-{{item.id}}" class="list-items" ng:repeat="item in listShown" ng:class="{{item.status}} {{item.type}}" list-item>
				<div class="item-preview" style="background-image: url(/assets/components/com_emc_origin/{{item.id}}/{{item.config.triggered_desktop}})"></div>
				<span class="item-id">{{item.id}}</span>
				<div class="item-caption">
					<span class="item-title">{{item.name}}</span>
					<span class="item-modified">Last modified by {{item.modified_by}} on {{item.modify_date}}</span>
				</div>
			</a>
			
			
	*/