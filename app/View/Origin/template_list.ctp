<div id="ad-template" ng:controller="originTemplates">
	<h2 class="originUI-header">Ad Templates</h2>
    <div id="adTemplate-add" class="adTemplate-item originUI-tiles" ng:click="templateCreate()">
    	<div class="originTile-title">New Template</div>
    </div><!--
    --><div class="adTemplate-item originUI-bgColor originUI-tiles" ng:repeat="template in originTemplates|filter:searchOrigin" ng:click="templateEdit(template)">
    	<h3 class="adTemplateItem-title">{{template.OriginAdTemplate.name}}</h3>
    	<img class="adTemplateItem-storyboard" src="http://placekitten.com/300/100" ng:src="{{template.OriginAdTemplate.content.file_storyboard}}"/>
    	<p class="adTemplateItem-description">{{template.OriginAdTemplate.content.description}}</p>
    </div>
<!--
	<div id="template-list" class="originUI-bgColor originUI-layout-list">
		<table cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead>
				<tr>
					<th ng:click="sortBy='OriginAdTemplate.id';reverse=!reverse">ID</th>
					<th ng:click="sortBy='OriginAdTemplate.name';reverse=!reverse">Name</th>
					<th>Alias</th>
					<th>Description</th>
					<th>Storyboard</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<tbody>
				<tr class="template-list-row" ng:repeat="template in originTemplates|orderBy:sortBy:reverse" ng:class:even="'originUI-even'" ng:class:odd="'originUI-odd'">
					<td>{{template.OriginAdTemplate.id}}</td>
					<td ng:click="templateEdit(template)">{{template.OriginAdTemplate.name}}</td>
					<td>{{template.OriginAdTemplate.alias}}</td>
					<td>{{template.OriginAdTemplate.description}}</td>
					<td>{{template.OriginAdTemplate.file_storyboard}}</td>
					<td>{{deleteConfirm}}</td>
					<?php if($this->UserAuth->isAdmin()) { ?>
					<td>
						<button ng:show="!deleteConfirm" ng:click="deleteConfirm=!deleteConfirm">Delete</button>
						<button ng:show="deleteConfirm" ng:click="templateDelete(template)">Confirm</button>
					</td>
					<?php } ?>
				</tr>
			</tbody>
		</table>
	</div>
-->
	
	<div modal="templateModal" close="templateModalClose()" options="originTemplates.modalOptions">
		<form id="template-add" name="template-add" class="originUI-bgColor originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/templates/"/>
			<input type="hidden" ng:model="originTemplates.editor.id"/>
			
			<h3 id="templateAdd-header" class="originUiModal-header" ng:show="!originTemplates.editor.id">New Template</h3>
			<h3 id="templateAdd-header" class="originUiModal-header" ng:show="originTemplates.editor.id">Edit Template</h3>
			
			
			
			<div class="originUiModal-content">
				<div id="templateAdd-left">
					<ul class="originUI-list">
						<li>
							<label>Name</label>
							<input type="text" id="templateAdd-name" ng:model="originTemplates.editor.name" required/>
						</li>
						<li>
							<label>Description</label>
							<textarea id="templateAdd-description" ng:model="originTemplates.editor.content.description"></textarea>
						</li>
					</ul>
				</div>
				<div id="templateAdd-right">
					<ul class="originUI-list">
						<li>
							<label>Storyboard Image</label>
							<div id="templateAdd-storyboard">
								<img src="http://placekitten.com/300/100" ng:src="{{originTemplates.editor.content.file_storyboard}}"/>
								<div class="originUI-upload originUI-icon originUiIcon-upload">
									<span class="originUI-uploadLabel">Upload Image</span>
									<input type="file" name="files[]" id="tempalteAdd-upload-template" class="originUI-uploadInput" ng:model="originTemplates.editor.content.file_storyboard" fileupload>
								</div>
							</div>
						</li>
						<li ng:show="originTemplates.editor.id">
							<div id="templateAdd-delete" class="originUI-icon originUiIcon-delete" ng:show="!originTemplates.confirmDelete" ng:click="originTemplates.confirmDelete=!originTemplates.confirmDelete">Delete</div>
							<div id="templateAdd-confirm" class="originUI-icon originUiIcon-delete" ng:show="originTemplates.confirmDelete" ng:click="templateDelete()">Confirm</div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="templateModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="templateSave()">Save</div>
			</div>
		</form>
	</div>
	
</div>