<div id="ad-edit" ng:controller="creatorController" ng:cloak>
	<input id="originAd_id" type="hidden" value="<?php echo $this->params['originAd_id'];?>"/>
	
	<div id="creator-panel-top" class="originUI-bgColor originUI-borderColor">
		
		<div class="wrapper">
			<div id="components-wrapper" data-intro="Add components (images, video, etc) to unit" data-position="bottom">
				<div ng:repeat="(groupName, group) in workspace.components" class="inline component-menu originUI-borderColor">
					<a href="javascript:void(0)" id="" class="dropdown-toggle">{{groupName}}</a>
					<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
						<li ng:repeat="component in group|filter:{status: '1'}" class="dropdown-item">
							<a href="javascript:void(0)" ng:click="creatorModalOpen('component', component)" class="component" back-img='{{component.config.img_icon}}'>{{component.name}}</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="display-wrapper" ng:click="creatorToggle('view')" data-intro="Toggle between the initial and triggered states of the unit" data-position="bottom">
				<div id="display-icon" class="inline" ng:class="{true: 'display-initial', false: 'display-triggered'}[ui.view=='Initial']"></div>
				<div id="display" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="displaySwitch" class="originUI-switchInput" id="displaySwitch" checked="checked">
					    <label class="originUI-switchLabel" for="displaySwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Initial<br/>State</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">Triggered<br/>State</div>
								</div>
						    </div>
					    </label>
				    </div> 
				</div>
			</div>
			
			<div id="options-wrapper" data-intro="Ad creator options" data-position="bottom">
				<a href="javascript:void(0)" id="options" class="dropdown-toggle originUI-borderColor">Options</a>
				<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
					<li>
						<a href="javascript:void(0)" id="option-embed" class="option" ng:click="embedModalOpen()">Create Embed</a>
					</li>
					<li>
						<a href="/administrator/demo/<?php echo $this->params['originAd_id'];?>" id="option-demo" class="option" target="_blank">View Demo</a>
					</li>
					<li>
						<a href="javascript:void(0)" id="option-settings" class="option" ng:click="settingsModalOpen()">Settings</a>
					</li>
					<li>
						<a href="javascript:void(0)" id="option-exit" class="option" ng:click="creatorSaveExit()">Save &amp; Exit</a>
					</li>
				</ul>
			</div>
			
			<div id="actions-wrapper" class="originUI-bgColor originUI-borderColor originUI-shadow none">
				<a href="javascript:void(0)" id="workspace-undo" class="inline" ng:click="workspaceUndo()">Undo</a><!--
				--><a href="javascript:void(0)" id="workspace-save" class="inline" ng:click="workspaceUpdate()">Save</a>
			</div>
			
				<!--
				<div id="schedules" class="">
					<a href="javascript:void(0)" class="dropdown-toggle originUI-select">Test</a>
					<ul class="dropdown-menu originUI-bgColorSecondary">
						<li id="schedules-add">
							<a href="javascript:void(0)" ng:click="scheduleModalOpen()">Add New Schedule</a>
						</li>
						<li ng:repeat="schedule in workspace.ad.OriginAdSchedule" ng:class="{active: workspace.ui.schedule == $index}">
							<a href="javascript:void(0)">{{schedule.start_date}}-{{schedule.end_date}}</a>
						</li>
					</ul>
				</div>
				-->
		</div>
	</div>
	<form id="creator-panel-left" class="originUI-bgColor">
		<input type="hidden" name="uploadDir" value="/assets/creator/<?php echo $this->params['originAd_id'];?>/"/>
		<div id="layer-wrapper" ng:click="creatorToggle('layer')">
			<div id="layer-icon" class="inline" ng:class="{true: 'layer-layers', false: 'layer-library'}[ui.layer=='Layers']"></div><!--
			--><div id="layer-switch" class="inline">
				<div class="originUI-switch">
				    <input type="checkbox" name="layerSwitch" class="originUI-switchInput" id="layerSwitch" checked="checked">
				    <label class="originUI-switchLabel" for="displaySwitch">
				    	<div class="originUI-switchInner">
				    		<div class="originUI-switchActive">
				    			<div class="originUI-switchText">Layers</div>
						    </div>
						    <div class="originUI-switchInactive">
						    	<div class="originUI-switchText">Library</div>
							</div>
					    </div>
				    </label>
			    </div> 
			</div>
		</div>
<!--
		<div id="background-wrapper" class="" workspace-background>
			<span class="originUI-uploadLabel">Set Background</span>
			<input type="file" name="files[]" id="editorBackground-upload" class="originUI-uploadInput" ng:model="ad.content.image" fileupload>
		</div>
-->
		<ul id="layers" ng:show="ui.layer=='Layers'" class="content-list originUI-list" ng:model="layers" layer-sortable></ul>
		<ul id="library" class="content-list originUI-list" ng:show="ui.layer=='Library'">
			<li class="content-item asset originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" asset>
				<a href="javascript:void(0);" class="content-label inline">{{asset.name}}</a>
				<!-- <span class="content-edit inline">handle</span> -->
			</li>
			<li id="library-instructions" ng:show="!library.length">
				Drag and drop assets here to upload or click the button below.
			</li>
			<li>
				<div id="library-upload" class="originUI-upload originUI-icon originUiIcon-upload originUI-bgColorSecondary">
					<span class="originUI-uploadLabel">Upload Assets</span>
					<input type="file" name="files[]" id="templateAdd-upload-template" class="originUI-uploadInput" multiple="multiple" panel-upload>
				</div>
			</li>
		</ul>
	</form>
	<div id="creator-panel-workspace" class="originUI-bgColorSecondary originUI-bgTexture originUI-borderColor" ng:class="workspace-{{workspace.template.content.alias}}">
		<div id="workspace" ng:style="workspaceTemplateConfig()" workspace>
			<workspace-content ng:repeat="content in workspace.ad.OriginAdSchedule[ui.schedule][ui.content]" ng:model="content" double-click="creatorModalOpen('content', '', content)"></workspace-content>
		</div>
	</div>
	
	<div modal="creatorModal" close="creatorModalClose()" options="creatorModalOptions">
		<form id="creator-modal" class="originUI-bgColorSecondary originUI-modal" ng:class="workspace.modal.alias">
			<h3 id="creatorModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor" back-img='{{workspace.modal.image}}'>{{workspace.modal.title}}</h3>
			
			<a href="javascript:void(0)" id="creatorModal-remove" ng:click="creatorModalRemove(editor)" ng:show="editor.remove">remove</a>
			<div id="creatorModal-content" class="originUI-modalContent">
				<div ng:include src="editor.template"></div>
			</div>
			
			<div id="creatorModal-config">
				<h4>Config</h4>
				<ul class="originUI-list">
					<li>
						<label>X Position</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.left" config="left"/>
						</div>
					</li>
					<li>
						<label>Y Position</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.top" config="top"/>
						</div>
					</li>
					<li>
						<label>Height</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.height" config="height"/>
						</div>
					</li>
					<li>
						<label>Width</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.width" config="width"/>
						</div>
					</li>
<!--
					<li>
						<label>Z-index</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.zIndex"/>
						</div>
					</li>
-->
				</ul>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft" ng:click="creatorModalClose()">Cancel</div>
				<div class="originUI-tileFooterRight" ng:click="creatorModalSave()">Save</div>
			</div>
		</form>
	</div>


	<div modal="settingsModal" close="settingsModalClose()" options="creatorModalOptions">
		<form id="settings-modal" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/creator/<?php echo $this->params['originAd_id'];?>/"/>
			<input type="hidden" ng:model="editor.config.template"/>
			<h3 id="settingsModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Settings</h3>
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft"><?php echo $this->element('form_setting', array('view'=>'left'));?></div>
				<div class="originUI-modalRight">
					<select id="settingsModal-template" class="originUI-select originUI-bgColorSecondary" ng:model="editor.template" ng:options="template.OriginTemplate.name for template in templates|filter:{OriginTemplate.status: '1'}" ng:change="templateLoad()">
						<option style="display:none" value="">Load Template</option>
					</select>
					<?php echo $this->element('form_template', array('view'=>'right', 'editor' => 'editor'));?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft" ng:click="settingsModalClose()">Cancel</div>
				<div class="originUI-tileFooterRight" ng:click="settingsModalSave()">Save</div>
			</div>
		</form>
	</div>
	
	
	
	<div modal="embedModal" close="embedModalClose()" options="creatorModalOptions">
		<form id="embed-modal" class="originUI-bgColorSecondary originUI-modal">
			<h3 id="embedModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Embed Code</h3>
			
			<div class="originUI-modalContent">
				<?php echo $this->element('form_embed');?>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft" ng:click="embedModalClose()">Close</div>
				<div class="originUI-tileFooterRight" ng:click="embedModalEmail()">Email Code</div>
			</div>
		</form>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!--
<div modal="scheduleModal" close="scheduleModalClose()" options="scheduleModalOptions">
		<form id="schedule-add" class="originUI-bgColorSecondary">
			<h3 id="scheduleAdd-header" class="originUiModal-header">Add Schedule</h3>
			
			<div class="originUiModal-content">
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="scheduleModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="scheduleSave()">Save</div>
			</div>
		</form>
	</div>
-->
</div>

<?php
	echo $this->Minify->css(array('creator', 'codemirror/night', 'jquery-ui.min'));
	echo $this->Minify->script(array('codemirror/codemirror', 'codemirror/xml', 'codemirror/javascript', 'codemirror/css', 'codemirror/htmlmixed', 'jquery/jquery-ui.min', 'jquery/jquery-touch', 'controllers/creatorController'));