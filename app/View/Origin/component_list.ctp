<div id="ad-component" ng:controller="originComponents" ng:cloak>
	<h2 class="originUI-header">Ad Components</h2>
    <!--
    <div id="adComponent-add" class="adComponent-item originUI-tiles" ng:click="componentCreate()">
    	<div class="originTile-title">New Component</div>
    </div>
    -->
    
    
    <div id="adComponent-left" class="dashboard-left originUI-bgColor originUI-shadow">
	    <h3 class="originUiModal-header originUI-borderColor originUI-textColor">Create</h3>
	    <form id="component-add" name="component-add" class="originUiModal-content">
			<input type="hidden" name="uploadDir" value="/assets/components/"/>
			<ul class="originUI-list">
				<li>
					<label>Group</label>
					<div class="originUI-field">
						<select class="originUI-select originUI-bgColorSecondary" ng:model="editor.group" ng:options="group.alias as group.name for group in groups|orderBy:'name'">
							<option style="display:none" value="">Select Group</option>
						</select>
					</div>
					
					<!--
					obj.value as obj.text for obj in array
					
<div class="originUI-select">
						<a href="javascript:void(0)" class="dropdown-toggle originUI-selectLabel">{{editor.config.group}}</a>
						<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
							<li ng:repeat="group in groups|orderBy:'name'">
								<a href="javascript:void(0)" ng:click="componentGroup(group)">{{group.name}}</a>
							</li>
						</ul>
					</div>
-->
				</li>
				<li>
					<label>Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.name" ng:change="componentAlias()" placeholder="Name of Component"/>
					</div>
				</li>
				<li>
					<label>Alias</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.alias" placeholder="Template Filename"/>
					</div>
				</li>
				<li>
					<label>Description</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="editor.content.description" placeholder="Description of component"></textarea>
					</div>
				</li>
				<li>
					<div class="originUI-upload originUI-icon originUiIcon-upload">
						<span class="originUI-uploadLabel">Component Icon</span>
						<input type="file" name="files[]" id="componentAdd-upload-icon" class="originUI-uploadInput" ng:model="editor.config.img_icon" fileupload>
					</div>
					<div class="">
						{{editor.config.img_icon}}
					</div>
				</li>
				
				<li ng:show="originComponents.editor.id">
					<div id="templateAdd-delete" class="originUI-icon originUiIcon-delete" ng:show="!originComponents.confirmDelete" ng:click="originComponents.confirmDelete=!originComponents.confirmDelete">Delete</div>
					<div id="templateAdd-confirm" class="originUI-icon originUiIcon-delete" ng:show="originComponents.confirmDelete" ng:click="componentDelete()">Confirm</div>
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="componentSave()">Save</div>
		</div>
    </div><!--
    --><div id="adComponent-right" class="dashboard-right originUI-bgColor originUI-shadow">
    	<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Component List</h3>
    	<table id="adComponent-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUiTable-head">
				<th class="adComponentHead-status">&nbsp;</th>
				<th class="adComponentHead-name">Name</th>
				<th class="adComponentHead-description">Description</th>
				<th class="adComponentHead-group">Group</th>
			</thead>
			<tbody class="originUiTable-body">
				<tr class="originUiTable-row" ng:repeat="component in originComponents|filter:searchOrigin">
					<td class="originUiTable-status" ng:show="component.OriginComponent.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="componentStatus(component.OriginComponent.id, 'disable')"/>
					</td>
					<td class="originUiTable-status" ng:show="component.OriginComponent.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="componentStatus(component.OriginComponent.id, 'enable')"/>
					</td>
					<td class="adComponentCell-name" ng:click="componentEdit(component)" back-img='{{component.OriginComponent.config.img_icon}}'>{{component.OriginComponent.name}} ({{component.OriginComponent.alias}})</td>
					<td class="adComponentCell-description" ng:click="componentEdit(component)">{{component.OriginComponent.content.description}}</td>
					<td class="adComponentCell-group" ng:click="componentEdit(component)">{{component.OriginComponent.group}}</td>
				</tr>
			</tbody>
		</table>    	
    </div>
    
    
    <div modal="componentModal" close="componentModalClose()" options="originComponents.modalOptions">
		<form id="component-edit" name="component-edit" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/components/"/>
			<input type="hidden" ng:model="modalEditor.id"/>
	
			<h3 class="originUiModal-header originUI-borderColor originUI-textColor">Edit Component</h3>
			
			<div class="originUiModal-content">
				<div id="" class="originUiModal-contentLeft">
					<ul class="originUI-list">
						<li>
							<label>Group</label>
							<div class="originUI-field">
								<select class="originUI-select originUI-bgColorSecondary" ng:model="modalEditor.group" ng:options="group.alias as group.name for group in groups|orderBy:'name'">
									<option style="display:none" value="">Select Group</option>
								</select>
							</div>
						</li>
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
						<li>
							<div class="originUI-upload originUI-icon originUiIcon-upload">
								<span class="originUI-uploadLabel">Component Icon</span>
								<input type="file" name="files[]" id="componentAdd-upload-icon" class="originUI-uploadInput" ng:model="modalEditor.config.img_icon" fileupload>
							</div>
							<div class="">
								{{modalEditor.config.img_icon}}
							</div>
						</li>
						
						<li ng:show="originComponents.editor.id">
							<div id="templateAdd-delete" class="originUI-icon originUiIcon-delete" ng:show="!originComponents.confirmDelete" ng:click="originComponents.confirmDelete=!originComponents.confirmDelete">Delete</div>
							<div id="templateAdd-confirm" class="originUI-icon originUiIcon-delete" ng:show="originComponents.confirmDelete" ng:click="componentDelete()">Confirm</div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="componentModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="componentSave()">Save</div>
			</div>
		</form>
	</div>

</div>







<!--
    
    <div class="adComponent-item originUI-bgColor originUI-tiles" ng:repeat="component in originComponents|filter:searchOrigin" ng:click="componentEdit(component)">
    	<h3 class="adTemplateItem-title">{{component.OriginComponent.name}}</h3>
    	<img class="adComponentItem-storyboard" src="http://placekitten.com/300/100" ng:src="{{component.OriginComponent.content.file_storyboard}}"/>
    	<p class="adTemplateItem-description">{{component.OriginComponent.content.description}}</p>
    </div>
    
	<div modal="componentModal" close="componentModalClose()" options="originComponents.modalOptions">
		<form id="component-add" name="component-add" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/components/"/>
			<input type="hidden" ng:model="originComponents.editor.id"/>
			
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="!originComponents.editor.id">New Component</h3>
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="originComponents.editor.id">Edit Component</h3>
			
			<div class="originUiModal-content">
				<div id="" class="originUiModal-contentLeft">
					<ul class="originUI-list">
						<li>
							<label>Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originComponents.editor.name"/>
							</div>
						</li>
						<li>
							<label>Alias</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originComponents.editor.alias"/>
							</div>
						</li>
						<li>
							<label>Description</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="originComponents.editor.content.description"></textarea>
							</div>
						</li>
					</ul>
				</div>
				<div id="" class="originUiModal-contentRight">
					<ul class="originUI-list">
						<li>
							<div id="">
								<div class="originUI-upload originUI-icon originUiIcon-upload">
									<span class="originUI-uploadLabel">Component Icon</span>
									<input type="file" name="files[]" id="componentAdd-upload-icon" class="originUI-uploadInput" ng:model="originComponents.editor.config.img_icon" fileupload>
								</div>
								<div class="">
									{{originComponents.editor.config.img_icon}}
								</div>
							</div>
						</li>
												<li>
							<label>Group</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originComponents.editor.content.group"/>
							</div>
						</li>
						<li ng:show="originComponents.editor.id">
							<div id="templateAdd-delete" class="originUI-icon originUiIcon-delete" ng:show="!originComponents.confirmDelete" ng:click="originComponents.confirmDelete=!originComponents.confirmDelete">Delete</div>
							<div id="templateAdd-confirm" class="originUI-icon originUiIcon-delete" ng:show="originComponents.confirmDelete" ng:click="componentDelete()">Confirm</div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="componentModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="componentSave()">Save</div>
			</div>
		</form>
	</div>
-->