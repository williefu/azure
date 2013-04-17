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
    </div><!--
    --><div id="demoManager-right" class="dashboard-right originUI-bgColor originUI-shadow">
    	<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Site Template List</h3>
    	<table id="demoManager-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUiTable-head">
				<th class="demoManagerHead-status">&nbsp;</th>
				<th class="demoManagerHead-name">Name</th>
				<th class="demoManagerHead-description">Description</th>
			</thead>
			<tbody class="originUiTable-body">
				<tr class="originUiTable-row" ng:repeat="site in originSites|filter:searchOrigin">
					<td class="originUiTable-status" ng:show="site.OriginSite.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="siteStatus(site.OriginSite.id, 'disable')"/>
					</td>
					<td class="originUiTable-status" ng:show="site.OriginSite.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="siteStatus(site.OriginSite.id, 'enable')"/>
					</td>
					<td class="demoManagerCell-name" ng:click="siteEdit(site)">{{site.OriginSite.name}} ({{site.OriginSite.alias}})</td>
					<td class="demoManagerCell-description" ng:click="siteEdit(site)">{{site.OriginSite.content.description}}</td>
				</tr>
			</tbody>
		</table>    	
    </div>
</div>

<?php
	echo $this->Minify->script(array('controllers/demoManagerController'));