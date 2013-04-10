<div id="ad-edit" ng:controller="creatorController" ng:cloak>
	<input id="originAd_id" type="hidden" value="<?php echo $this->params['originAd_id'];?>"/>
	
	<div id="creator-panel-top" class="originUI-bgColor originUI-borderColor">
		
		<div class="wrapper">
			<div id="components-wrapper">
				<a href="javascript:void(0)" id="components" class="dropdown-toggle originUI-borderColor">Components</a>
				<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
					<li ng:repeat="component in workspace.components">
						<a href="javascript:void(0)" ng:click="creatorModalOpen('component', component)" class="component" back-img='{{component.OriginComponent.config.img_icon}}'>
							{{component.OriginComponent.name}}
						</a>
					</li>
				</ul>
			</div>
			<div id="display-wrapper" ng:click="creatorToggle('view')">
				<div id="display-icon" class="inline" ng:class="{true: 'display-initial', false: 'display-triggered'}[workspace.ui.view=='Initial']"></div>
				
				<div id="display" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="displaySwitch" class="originUI-switchInput" id="displaySwitch" checked="checked">
					    <label class="originUI-switchLabel" for="displaySwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Initial</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">Triggered</div>
								</div>
						    </div>
					    </label>
				    </div> 
				</div>
			</div>
				<!--
				<div id="components" class="creatorPanelTop-icons inline">
					<a href="javascript:void(0)" class="originUI-icon dropdown-toggle">Components</a>
					<ul class="dropdown-menu originUI-bgColorSecondary">
						<li>TEST</li>
					</ul>
				</div>
				-->
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
	<div id="creator-panel-left" class="originUI-bgColor originUI-borderColor">
	
	
		<div id="layer-wrapper" ng:click="creatorToggle('layer')">
			<div id="layer-icon" class="inline" ng:class="{true: 'layer-layers', false: 'layer-library'}[workspace.ui.layer=='Layers']"></div><!--
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
	
	
	
	
	
		<ul ng:show="workspace.ui.layer=='Layers'">
			<li ng:repeat="content in workspace.display">{{content.content.title}}-{{content.id}}</li>
		</ul>
		<ul ng:show="workspace.ui.layer=='Library'">
			<li>assets</li>
		</ul>
	</div>
	<div id="creator-panel-workspace" class="originUI-bgColorSecondary originUI-bgTexture" ng:class="workspace-{{workspace.template.content.alias}}">
		
		<div class="workspace" ng:style="workspaceTemplateConfig()"></div>
		<!--
		
		
		{"dimensions":{"initial":{"desktop":{"width":"1500","height":"66"},"tablet":{},"mobile":{}},"triggered":{"desktop":{"width":"1500","height":"415"},"tablet":{},"mobile":{}}},"animation":{}}
		
		-->
	</div>
	
	<div modal="creatorModal" close="creatorModalClose()" options="creatorModalOptions">
		<form id="creator-modal" class="originUI-bgColorSecondary">
			<h3 id="creatorModal-header" class="originUiModal-header originUI-borderColor originUI-textColor" back-img='{{workspace.modal.image}}'>
				{{workspace.modal.title}}
			</h3>
			<div id="creatorModal-content" class="originUiModal-content">
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
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="creatorModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="creatorModalSave()">Save</div>
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
	echo $this->Minify->css(array('creator', 'codemirror/night'));
	echo $this->Minify->script(array('codemirror/codemirror', 'codemirror/xml', 'codemirror/javascript', 'codemirror/css', 'codemirror/htmlmixed', 'creatorController'));