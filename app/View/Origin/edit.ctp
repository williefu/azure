<div id="ad-edit" ng:controller="creatorController">
	<input id="originAd_id" type="hidden" value="<?php echo $this->params['originAd_id'];?>"/>
	<div id="creator-panel-top" class="originUI-bgColor">
		
		
		<div id="components">
			<a href="javascript:void(0)" class="dropdown-toggle">Components</a>
			<ul class="dropdown-menu originUI-bgColorSecondary">
				
			</ul>
		</div>
		
		
		<div id="display-wrapper">
			<div id="display-icon" class="inline" ng:click="viewToggle('toggle')"></div>
			<div id="display" class="inline">
				<div class="originUI-switch">
				    <input type="checkbox" name="displaySwitch" class="originUI-switchInput" id="displaySwitch" ng:click="viewToggle()" checked="checked">
				    <label class="originUI-switchLabel" for="displaySwitch">
				    	<div class="originUI-switchInner">
				    		<div class="originUI-switchActive">
				    			<div class="originUI-switchText">Initial State</div>
						    </div>
						    <div class="originUI-switchInactive">
						    	<div class="originUI-switchText">Triggered State</div>
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
	<div id="creator-panel-left">
		left
	</div>
	<div id="creator-panel-workspace" ng:class="workspace-{{creator.template.content.alias}}">
		{{workspace.display}}
	</div>
	
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
</div>

<?php
	echo $this->Minify->css(array('creator'));
	echo $this->Minify->script(array('creatorController'));