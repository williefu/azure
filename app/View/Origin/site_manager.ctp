<div id="site-manager" ng:controller="originSites" ng:cloak>
	<h2 class="originUI-header">Site Demo Templates</h2>
    <div id="siteManager-left" class="dashboard-left originUI-bgColor originUI-shadow">
	    <h3 class="originUiModal-header originUI-borderColor originUI-textColor">Add</h3>
	    <form id="siteManager-add" name="siteManager-add" class="originUiModal-content">
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
    </div><!--
    --><div id="siteManager-right" class="dashboard-right originUI-bgColor originUI-shadow">
    	<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Site Template List</h3>
    	<table id="siteManager-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUiTable-head">
				<th class="siteManagerHead-status">&nbsp;</th>
				<th class="siteManagerHead-name">Name</th>
				<th class="siteManagerHead-description">Description</th>
			</thead>
			<tbody class="originUiTable-body">
				<tr class="originUiTable-row" ng:repeat="site in originSites|filter:searchOrigin">
					<td class="originUiTable-status" ng:show="site.OriginSite.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="siteStatus(site.OriginSite.id, 'disable')"/>
					</td>
					<td class="originUiTable-status" ng:show="site.OriginSite.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="siteStatus(site.OriginSite.id, 'enable')"/>
					</td>
					<td class="siteManagerCell-name" ng:click="siteEdit(site)">{{site.OriginSite.name}} ({{site.OriginSite.alias}})</td>
					<td class="siteManagerCell-description" ng:click="siteEdit(site)">{{site.OriginSite.content.description}}</td>
				</tr>
			</tbody>
		</table>    	
    </div>
    
    
    <div modal="siteModal" close="siteModalClose()" options="originSites.modalOptions">
		<form id="site-edit" name="site-edit" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="id" ng:model="modalEditor.group" value="{{modalEditor.id}}"/>
	
			<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Edit Site Template</h3>
			
			<div class="originUiModal-content">
				<div id="" class="originUiModal-contentLeft">
					<ul class="originUI-list">
						<li>
							<label>Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="modalEditor.name"/>
							</div>
						</li>
						<li>
							<label>Alias</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="modalEditor.alias"/>
							</div>
						</li>
					</ul>
				</div>
				<div id="" class="originUiModal-contentRight">
					<ul class="originUI-list">
						<li>
							<label>Description</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="modalEditor.content.description"></textarea>
							</div>
						</li>						
<!--
						<li ng:show="originComponents.editor.id">
							<div id="templateAdd-delete" class="originUI-icon originUiIcon-delete" ng:show="!originComponents.confirmDelete" ng:click="originComponents.confirmDelete=!originComponents.confirmDelete">Delete</div>
							<div id="templateAdd-confirm" class="originUI-icon originUiIcon-delete" ng:show="originComponents.confirmDelete" ng:click="componentDelete()">Confirm</div>
						</li>
-->
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="siteModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="siteSave('update')">Save</div>
			</div>
		</form>
	</div>
</div>

<?php
	echo $this->Minify->script(array('controllers/siteController'));