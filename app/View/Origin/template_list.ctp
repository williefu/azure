<div id="ad-template" ng:controller="originTemplates">
	<h2 class="originUI-header">Origin Templates</h2>
    <div id="">
    	<a href="javascript:void(0);" id="template-create" class="" ng:click="templateCreate()">Add New</a>
    </div>	
	<div id="template-list" class="originUI-bgColor originUI-layout-list">
		<table cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead>
				<tr>
					<th ng:click="sortBy = 'OriginAdTemplate.id';reverse=!reverse">ID</th>
					<th ng:click="sortBy = 'OriginAdTemplate.name';reverse=!reverse">Name</th>
					<th>Alias</th>
					<th>Thumbnail</th>
					<th>Description</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<tbody>
				<tr class="template-list-row" ng:repeat="template in originTemplates|orderBy:sortBy:reverse" ng:class:even="'originUI-even'" ng:class:odd="'originUI-odd'">
					<td>{{template.OriginAdTemplate.id}}</td>
					<td ng:click="templateEdit(template)">{{template.OriginAdTemplate.name}}</td>
					<td>{{template.OriginAdTemplate.alias}}</td>
					<td>{{template.OriginAdTemplate.img_thumbnail}}</td>
					<td>{{template.OriginAdTemplate.description}}</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div modal="templateModal" close="templateModalClose()" options="originTemplates.modalOptions">
		<form id="template-add" id="template-add" class="originUI-bgColor originUI-modal">
			<h3 class="originUI-header">Origin Template</h3>
			<ul>
				<li>
					<label>Name</label>
					<input type="text" ng:model="originTemplates.editor.name"/>
				</li>
				<li>
					<label>Alias</label>
					<input type="text" ng:model="originTemplates.editor.alias" alias="originTemplates.editor.name"/>
				</li>
				<li>
					<label>Description</label>
					<input type="text" ng:model="originTemplates.editor.description"/>
				</li>
			</ul>
			<div ng:click="templateSave()">Save</div>
		</form>
	</div>
	
</div>

<!--


    <div id="">
    	<a href="javascript:void(0);" id="list-create" class="list-ad" ng:click="listCreateNew()">Create New</a>
		<a href="edit/{{item.OriginAd.id}}" id="" class="list-ad" ng:repeat="item in originCreator.list" ng:class="item.OriginAd.config.type">
			<span>{{item.OriginAd.name}}</span>
		</a>
    </div>
    {{originCreator.templates[0].OriginAdTemplate.name}}
    
    <div modal="listCreateModal" close="listCreateModalClose()" options="listCreateModalOptions">
    	<form ng:model="originCreator.form" id="list-create-modal" class="originUI-bgColor">
    		<h3 id="create-modal-title" class="originUI-header">Select Origin Ad Template</h3>
    		<p id="create-modal-description">
	    		{{originCreator.form.OriginAdTemplate.description}}
    		</p>
    		<img id="create-modal-image" ng:src="{{originCreator.form.OriginAdTemplate.img_large}}"/>
    		<select ng:model="originCreator.form" ng:options="template.OriginAdTemplate.name for template in originCreator.templates"></select>
    		
    		
	    </form>
    </div>


-->