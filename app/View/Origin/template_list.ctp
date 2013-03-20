<div id="ad-template" ng:controller="originTemplates">
	<h2 class="originUI-header">Origin Templates</h2>
    <div id="">
    	<a href="javascript:void(0);" id="template-create" class="" ng:click="templateCreate()">Add New</a>
    </div>
    
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
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div modal="templateModal" close="templateModalClose()" options="originTemplates.modalOptions">
		<form id="template-add" name="template-add" class="originUI-bgColor originUI-modal">
			<h3 class="originUI-header">Origin Template</h3>
			<ul>
				<li>
					<label>Name</label>
					<input type="text" ng:model="originTemplates.editor.name" required/>
				</li>
				<li>
					<label>Description</label>
					<textarea>{{originTemplates.editor.description}}</textarea>
				</li>
			</ul>
			
			<input type="file" name="files[]" id="tempalteAdd-upload-template" class="" ng:model="originTemplates.editor.file_storyboard" fileupload>
<!--
			<input type="file" name="files[]" id="templateAdd-upload-logo" class="" fileupload>
			<input type="file" name="files[]" id="templateAdd-upload-specs" class="" fileupload>
-->
			<input type="hidden" name="uploadDir" value="/templates/"/>
			<button ng:click="templateSave()" ng:disabled="templateUnchanged()">Save</button>
		</form>
	</div>
	
</div>