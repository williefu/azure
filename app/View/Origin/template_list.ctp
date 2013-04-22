<div id="ad-template" ng:controller="templatesController" ng:cloak>
	<h2 class="originUI-header">Ad Templates</h2>
	<form id="adTemplate-create" name="adTemplateCreateForm" class="originUI-tileLeft originUI-bgColor originUI-shadow" novalidate>
		<input type="hidden" name="uploadDir" value="/assets/templates/"/>
		<h3 id="adTemplate-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('form_template', array('view'=>'left', 'editor' => 'editor'));?>
			<?php echo $this->element('form_template', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter" ng:click="templateCreate()" ng-disabled="adTemplateCreateForm.$invalid">Create</button>
		</div>
	</form><!--
	--><div id="adTemplate-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="adTemplate-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Templates</h3>
		<table id="adTemplate-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="templateFilter='OriginTemplate.name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription">Description</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow" ng:repeat="template in templates|orderBy:templateFilter:reverse|filter:searchOrigin">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="template.OriginTemplate.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus('OriginTemplate', template.OriginTemplate.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="template.OriginTemplate.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus('OriginTemplate', template.OriginTemplate.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.name}} ({{template.OriginTemplate.alias}})</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.content.description}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="adTemplate-edit" name="adTemplate-edit" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/templates/"/>
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="adTemplate-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit Template</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove" ng:click="templateRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('form_template', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('form_template', array('view'=>'right', 'editor' => 'editorModal'));?>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="$parent.originModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="templateSave()">Save</div>
			</div>
		</form>
	</div>
</div>
<?php
	echo $this->Minify->script(array('controllers/templatesController'));
?>