<div id="ad-template" ng:controller="originTemplates">
	<h2 class="originUI-header">Ad Templates</h2>
    <div id="adTemplate-add" class="adTemplate-item originUI-tiles" ng:click="templateCreate()">
    	<div class="originTile-title">New Template</div>
    </div><!--
    --><div class="adTemplate-item originUI-bgColor originUI-tiles" ng:repeat="template in originTemplates|filter:searchOrigin" ng:click="templateEdit(template)">
    	<h3 class="adTemplateItem-title">{{template.OriginTemplate.name}}</h3>
    	<img class="adTemplateItem-storyboard" src="http://placekitten.com/300/100" ng:src="{{template.OriginTemplate.content.file_storyboard}}"/>
    	<p class="adTemplateItem-description">{{template.OriginTemplate.content.description}}</p>
    </div>
    
	<div modal="templateModal" close="templateModalClose()" options="originTemplates.modalOptions">
		<form id="template-add" name="template-add" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/templates/"/>
			<input type="hidden" ng:model="originTemplates.editor.id"/>
			
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="!originTemplates.editor.id">New Template</h3>
			<h3 id="templateAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor" ng:show="originTemplates.editor.id">Edit Template</h3>
			
			<div class="originUiModal-content">
				<div id="templateAdd-left">
					<ul class="originUI-list">
						<li id="templateAdd-name">
							<label>Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.name"/>
							</div>
						</li>
						<li id="templateAdd-alias">
							<label>Alias</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.alias"/>
							</div>
						</li>
						<li id="templateAdd-description">
							<label>Description</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="originTemplates.editor.content.description"></textarea>
							</div>
						</li>
						<li id="templateAdd-storyboard">
							<label>Storyboard Image</label>
							<!-- <img id="templateAdd-storyboardImage" src="http://placekitten.com/300/100" ng:src="{{originTemplates.editor.content.file_storyboard}}"/> -->
							<div id="templateAdd-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload originUI-bgColorSecondary">
								<span class="originUI-uploadLabel">Upload Image</span>
								<input type="file" name="files[]" id="tempalteAdd-upload-template" class="originUI-uploadInput" ng:model="originTemplates.editor.content.file_storyboard" fileupload>
							</div>
						</li>
					</ul>
				</div>
				<div id="templateAdd-right">
					<accordion close-others="true" class="originUI-list originUI-accordion">
						<accordion-group heading="Desktop Dimensions" is-open="true" class="">
							<ul class="">
								<li>
									<label class="originUI-label inline">Initial Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Desktop.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Initial Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Desktop.width"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Desktop.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Desktop.width"/>
									</div>
								</li>
							</ul>
						</accordion-group>
						<accordion-group heading="Tablet Dimensions">
							<ul class="">
								<li>
									<label class="originUI-label inline">Initial Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Tablet.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Initial Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Tablet.width"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Tablet.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Tablet.width"/>
									</div>
								</li>
							</ul>
						</accordion-group>
						<accordion-group heading="Mobile Dimensions">
							<ul class="">
								<li>
									<label class="originUI-label inline">Initial Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Mobile.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Initial Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Initial.Mobile.width"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Height</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Mobile.height"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Triggered Width</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.dimensions.Triggered.Mobile.width"/>
									</div>
								</li>
							</ul>
						</accordion-group>
						<accordion-group heading="Animation">
							<ul>
								<li>
									<label class="originUI-label inline">Animation Start</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.animations.start"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Animation End</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.animations.end"/>
									</div>
								</li>
								<li>
									<label class="originUI-label inline">Animation Duration</label>
									<div class="originUI-field inline">
										<div class="originUI-fieldBracket"></div>
										<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="originTemplates.editor.config.animations.duration"/>
									</div>
								</li>
							</ul>
						</accordion-group>
					</accordion>
					<ul class="originUI-list">
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