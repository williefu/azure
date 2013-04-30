<div id="demo-manager" ng:controller="demoManagerController" ng:cloak>
	<h2 class="originUI-header">Ad Components</h2>
	<form id="demoManager-create" name="demoManagerCreateForm" class="originUI-tileLeft originUI-bgColor originUI-shadow" novalidate>
		<input type="hidden" name="uploadDir" value="/assets/components/"/>
		<h3 id="demoManager-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('form_demo', array('view'=>'left', 'editor' => 'editor'));?>
			<?php echo $this->element('form_demo', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter" ng:click="siteCreate()" ng-disabled="demoManagerCreateForm.$invalid">Create</button>
		</div>
	</form><!--
	--><div id="demoManager-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="demoManager-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Templates</h3>
		<table id="demoManager-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="demoFilter='OriginDemo.name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription">Description</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow" ng:repeat="demo in demos|orderBy:demoFilter:reverse|filter:searchOrigin">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="demo.OriginDemo.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus('OriginDemo', demo.OriginDemo.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="demo.OriginDemo.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus('OriginDemo', demo.OriginDemo.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="siteEdit(site)">{{demo.OriginDemo.name}} ({{demo.OriginDemo.alias}})</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="siteEdit(site)">{{demo.OriginDemo.content.description}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="demoManager-edit" name="demoManager-edit" class="originUI-bgColorSecondary originUI-modal" novalidate>
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="demoManager-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit Site</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove" ng:click="siteRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('form_demo', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('form_demo', array('view'=>'right', 'editor' => 'editorModal'));?>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft" ng:click="$parent.originModalClose()">Cancel</div>
				<div class="originUI-tileFooterRight" ng:click="siteSave()">Save</div>
			</div>
		</form>
	</div>
</div>

<?php
	echo $this->Minify->script(array('controllers/siteController'));
?>
<!--
<div id="demo-manager" ng:controller="originDemoManager" ng:cloak>
	<h2 class="originUI-header">Site Demo Templates</h2>
    <div id="demoManager-left" class="dashboard-left originUI-bgColor originUI-shadow">
	    <h3 class="originUiModal-header originUI-borderColor originUI-textColor">Add</h3>
	    <form id="demoManager-add" name="demoManager-add" class="originUiModal-content">
			<ul class="originUI-list">
				<li>
					<label>Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.name" ng:change="siteAlias()" placeholder="Name of Site"/>
					</div>
				</li>
				<li>
					<label>Alias</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.alias" placeholder="Template filename"/>
					</div>
				</li>
				<li>
					<label>Description</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="editor.content.description" placeholder="Description of site"></textarea>
					</div>
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="siteSave('create')">Save</div>
		</div>
    </div>
    <div id="demoManager-right" class="dashboard-right originUI-bgColor originUI-shadow">
    	<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Site Template List</h3>
    	<table id="demoManager-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUiTable-head">
				<th class="demoManagerHead-status">&nbsp;</th>
				<th class="demoManagerHead-name">Name</th>
				<th class="demoManagerHead-description">Description</th>
			</thead>
			<tbody class="originUiTable-body">
				<tr class="originUiTable-row" ng:repeat="site in OriginDemos|filter:searchOrigin">
					<td class="originUiTable-status" ng:show="demo.OriginDemo.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="siteStatus(demo.OriginDemo.id, 'disable')"/>
					</td>
					<td class="originUiTable-status" ng:show="demo.OriginDemo.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="siteStatus(demo.OriginDemo.id, 'enable')"/>
					</td>
					<td class="demoManagerCell-name" ng:click="siteEdit(site)">{{demo.OriginDemo.name}} ({{demo.OriginDemo.alias}})</td>
					<td class="demoManagerCell-description" ng:click="siteEdit(site)">{{demo.OriginDemo.content.description}}</td>
				</tr>
			</tbody>
		</table>    	
    </div>
</div>
-->

<?php
	echo $this->Minify->script(array('controllers/demoManagerController'));