<div id="ad-component" ng:controller="originComponents">
	<h2 class="originUI-header">Origin Components</h2>
    <div id="adComponent-add" class="adComponent-item originUI-tiles" ng:click="componentCreate()">
    	<div class="originTile-title">New Component</div>
    </div><!--
    --><div class="adComponent-item originUI-bgColor originUI-tiles" ng:repeat="component in originComponents|filter:searchOrigin" ng:click="componentEdit(component)">
    	<h3 class="adComponentItem-title">{{component.OriginComponent.name}}</h3>
    	<img class="adComponentItem-storyboard" src="http://placekitten.com/300/100" ng:src="{{component.OriginComponent.content.file_storyboard}}"/>
    	<p class="adComponentItem-description">{{component.OriginComponent.content.description}}</p>
    </div>
    
	<div modal="componentModal" close="componentModalClose()" options="originComponents.modalOptions">
		<form id="component-add" name="component-add" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/components/"/>
			<input type="hidden" ng:model="originComponents.editor.id"/>
			
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="!originComponents.editor.id">New Component</h3>
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="originComponents.editor.id">Edit Component</h3>
			
			<div class="originUiModal-content">
				<div id="templateAdd-left">
					<ul class="originUI-list">
						<li id="templateAdd-name">
							<label>Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originComponents.editor.name"/>
							</div>
						</li>
						<li id="templateAdd-description">
							<label>Description</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="originComponents.editor.content.description"></textarea>
							</div>
						</li>
					</ul>
				</div>
				<div id="templateAdd-right">
					<ul class="originUI-list">
						<li>
							<label>Storyboard Image</label>
							<div id="templateAdd-storyboard">
								<img src="http://placekitten.com/300/100" ng:src="{{originComponents.editor.content.file_storyboard}}"/>
								<div class="originUI-upload originUI-icon originUiIcon-upload">
									<span class="originUI-uploadLabel">Upload Image</span>
									<input type="file" name="files[]" id="componentAdd-upload-template" class="originUI-uploadInput" ng:model="originComponents.editor.content.file_storyboard" fileupload>
								</div>
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