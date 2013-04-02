<div id="ad-list" ng:controller="originAds" class="">
	<h2 class="originUI-header">Ad Listing</h2>
	<div id="adList-add" class="adList-item originUI-tiles" ng:click="adCreateModalOpen()">
    	<div class="originTile-title">Create New Ad</div>
    </div><!--
    --><a href="/administrator/Origin/ad/edit/{{item.OriginAd.id}}" id="" class="adList-item originUI-tiles originUI-bgColor" ng:repeat="item in originCreator.list|filter:searchOrigin" ng:class="item.OriginAd.config.type">
		<!-- <img ng:src="/assets/creator/{{item.Creator.id}}/{{item.Creator.config.triggered_desktop}}"/> -->
		<span>{{item.OriginAd.name}}</span>
	</a>
    
    
    
    <div modal="adCreateModal" close="adCreateModalClose()" options="adCreateModalOptions">
    	<form id="adCreate-add" name="adList-add" class="originUI-bgColor originUI-modal">
    		<h3 id="adCreate-header" class="originUiModal-header">Create New Ad</h3>
    		<div class="originUiModal-content">
    			<label>Ad Name</label>
    			<input type="text" id="addCreate-name" ng:model="originCreator.editor.name" required/>
    			<hr class="originUiModal-hr"/>
    			<label class="inline">Select Template</label>
    			<select id="addCreate-templateSelect" class="inline" ng:model="originCreator.form" ng:options="template.OriginTemplate.name for template in originCreator.templates"></select>
	    		
	    		<div id="addCreate-templateSlide">
		    		<a href="javascript:void(0)" id="addCreate-templatePrev" class="inline" ng:click="adTemplateSelect('prev')">Prev</a>
		    		<img id="templateAdd-templateImage" class="inline" ng:src="{{originCreator.form.OriginTemplate.content.file_storyboard}}"/>
		    		<a href="javascript:void(0)" id="addCreate-templateNext" class="inline" ng:click="adTemplateSelect('next')">Next</a>
	    		</div>
	    		<div id="addCreate-templateDescription">
		    		{{originCreator.form.OriginTemplate.content.description}}
	    		</div>
    		</div>
    		<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="adCreateModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="adCreate()">Continue</div>
			</div>
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