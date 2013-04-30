<?php
	//print_r($this->UserAuth->getNameById(1));
	//print_r($this->User->findById(1));
?>

<div id="ad-list" ng:controller="listController" class="">
	<h2 class="originUI-header">Ad Manager</h2>
	<div id="adList-left" class="inline">
		<div class="adList-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="ad in ads|filter:searchOrigin" ng:class="{'adList-itemActive':ad.OriginAd.id == module.id}">
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName originUI-borderColor">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDetails">
					<div class="adList-itemModify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</div>
					<div class="adList-itemCreate">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</div>
				</div>
				<div class="adList-itemType">{{ad.OriginAd.config.template}}</div>
			</div>
			<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-itemLink"></a>
			<img class="adList-itemImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<div class="adList-itemLookUp" ng:click="loadModule(ad)"></div>
		</div>
		<div class="adList-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="ad in ads|filter:searchOrigin" ng:class="{'adList-itemActive':ad.OriginAd.id == module.id}">
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName originUI-borderColor">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDetails">
					<div class="adList-itemModify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</div>
					<div class="adList-itemCreate">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</div>
				</div>
				<div class="adList-itemType">{{ad.OriginAd.config.template}}</div>
			</div>
			<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-itemLink"></a>
			<img class="adList-itemImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<div class="adList-itemLookUp" ng:click="loadModule(ad)"></div>
		</div>
		<div class="adList-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="ad in ads|filter:searchOrigin" ng:class="{'adList-itemActive':ad.OriginAd.id == module.id}">
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName originUI-borderColor">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDetails">
					<div class="adList-itemModify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</div>
					<div class="adList-itemCreate">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</div>
				</div>
				<div class="adList-itemType">{{ad.OriginAd.config.template}}</div>
			</div>
			<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-itemLink"></a>
			<img class="adList-itemImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<div class="adList-itemLookUp" ng:click="loadModule(ad)"></div>
		</div>
		<div class="adList-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="ad in ads|filter:searchOrigin" ng:class="{'adList-itemActive':ad.OriginAd.id == module.id}">
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName originUI-borderColor">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDetails">
					<div class="adList-itemModify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</div>
					<div class="adList-itemCreate">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</div>
				</div>
				<div class="adList-itemType">{{ad.OriginAd.config.template}}</div>
			</div>
			<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-itemLink"></a>
			<img class="adList-itemImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<div class="adList-itemLookUp" ng:click="loadModule(ad)"></div>
		</div>
	</div><!--
	--><div id="adList-right" class="inline">
	
<!--
		<a href="javascript:void(0)" id="adList-create" class="originUI-bgColor originUI-shadow" ng:click="adCreate()">
			<h3 id="adList-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create New Ad</h3>
		</a>
-->
		<a href="javascript:void(0)" id="adList-create" class="originUI-shadow" ng:click="adCreate()">Create New Ad</a>
		
		<div id="adList-module" class="originUI-bgColor originUI-shadow">
			<h3 id="adList-moduleHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Details</h3>
			<div class="originUI-tileContent">
				<h3 id="adList-moduleAdHeader">
					<a href="/administrator/Origin/ad/edit/{{module.id}}">{{module.name}}</a>
				</h3>
				<img ng:src="{{module.content.img_thumbnail}}"/>
				<span class="adList-moduleAdDetails">Last Modified {{module.modify_date}} by {{module.modify_by}}</span>
				<span class="adList-moduleAdDetails">Created {{module.create_date}} by {{module.create_by}}</span>
				<!-- <h4>Metrics</h4> -->
				<h4 id="adList-moduleEmbedHeader" class="originUI-borderColorSecondary" ng:click="embedCreate()">Generate Embed</h4>
				<h4 id="adList-moduleDemoHeader" class="originUI-borderColorSecondary">
					<a href="/demo/Origin/{{module.id}}" target="_blank">Demo Links</a>
				</h4>
				<ul id="adList-moduleDemoList" class="originUI-list">
					<li class="originUI-listItem" ng:repeat="demo in demos"><a href="/demo/{{demo.OriginDemo.alias}}" target="_blank">{{demo.OriginDemo.name}}</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="adList-modal" name="adListModal" class="originUI-bgColorSecondary originUI-modal adList-modal{{editor.type}}" novalidate>
			<input type="hidden" name="uploadDir" value="/assets/creator/tmp/"/>
			<h3 id="adList-modalHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{editor.header}}</h3>
			<div id="adSettings-modal" class="originUI-modalContent" ng:class="{'adList-moduleAdvance': editor.advance==true}">
				<div ng:show="editor.type=='create'"><?php echo $this->element('form_create');?></div>
				<div ng:show="editor.type=='embed'"><?php echo $this->element('form_embed');?></div>	
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft" ng:click="$parent.originModalClose()">Cancel</div>
				<button class="originUI-tileFooterRight" ng:click="adCreateSave()" ng:show="editor.type=='create'" ng-disabled="adListModal.$invalid">Save</button>
<!-- 				<button class="originUI-tileFooterRight" ng:click="embedEmail()" ng:show="editor.type=='embed'" ng-disabled="adList-modal.$invalid">Email</button> -->
			</div>
		</form>
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