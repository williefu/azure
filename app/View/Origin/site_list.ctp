<div id="site-manager" ng:controller="siteController" ng:cloak>
	<h2 class="originUI-header">Site Demo Templates</h2>
	<form id="siteManager-create" name="siteManagerCreateForm" class="originUI-tileLeft originUI-bgColor originUI-shadow" novalidate>
		<input type="hidden" name="uploadDir" value="/assets/components/"/>
		<h3 id="siteManager-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('form_site', array('view'=>'left', 'editor' => 'editor'));?>
			<?php echo $this->element('form_site', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter" ng:click="siteCreate()" ng-disabled="siteManagerCreateForm.$invalid">Create</button>
		</div>
	</form><!--
	--><div id="siteManager-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="siteManager-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Site List</h3>
		<table id="siteManager-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="siteFilter='OriginSite.name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription">Description</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow" ng:repeat="site in sites|orderBy:siteFilter:reverse|filter:searchOrigin">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="site.OriginSite.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus('OriginSite', site.OriginSite.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="site.OriginSite.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus('OriginSite', site.OriginSite.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="siteEdit(site)">{{site.OriginSite.name}} ({{site.OriginSite.alias}})</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="siteEdit(site)">{{site.OriginSite.content.description}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="siteManager-edit" name="siteManager-edit" class="originUI-bgColorSecondary originUI-modal" novalidate>
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="siteManager-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit Site</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove" ng:click="siteRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('form_site', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('form_site', array('view'=>'right', 'editor' => 'editorModal'));?>
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