<div id="ad-list" ng:controller="listController" class="">
	<h2 class="originUI-header">Ad Manager</h2>
	<div id="adList-left" class="inline">
		<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="ad in ads" ng:click="loadModule(ad)" back-img="{{ad.OriginAd.content.img_thumbnail}}">
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDescription">{{ad.OriginAd.content.description}}</div>
			</div>
			<div class="adList-itemLookUp"></div>
		</a>
	</div><!--
	--><div id="adList-right" class="inline">
	
		<a href="javascript:void(0)" id="adList-create" class="originUI-bgColor originUI-shadow">
			<h3 id="adList-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create New Ad</h3>
		</a>
		
		<div id="adList-module" class="originUI-bgColor originUI-shadow"></div>
	</div>

<?php /*
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
    
    */?>
</div>
<?php
	echo $this->Minify->script(array('controllers/listController'));
?>