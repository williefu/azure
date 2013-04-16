<div id="" ng:controller="demoController" ng:cloak>
	<input id="originAd_id" type="hidden" value="<?php echo $originAd_id;?>"/>
	
	<div ng:include src="demo.template"></div>
	
	
	
	
	<div id="demo-panel" class="originUI-borderColor originUI-shadow">
		<form id="demoPanel-form" class="originUI-bgColorSecondary">
			<input type="hidden" name="uploadDir" value="/assets/demos/"/>
			
			<h3 id="demoPanel-header" class="originUiModal-header originUI-borderColor originUI-textColor">Demo Options</h3>
			<div id="demoPanel-content" class="originUiModal-content">
				<ul class="originUI-list">
					<li>
						<label>Template</label>
						<div class="originUI-field">
							<select class="originUI-select originUI-bgColorSecondary" ng:model="demo.templateAlias" ng:options="template.OriginSite.alias as template.OriginSite.name for template in templates|filter:{OriginSite.status: '1'}" ng:change="loadTemplate()">
								<option style="display:none" value="">Select Group</option>
							</select>
						</div>
					</li>
					<li id="demoPanelContent-auto">
						<label class="inline">Auto Open</label>
						<div class="originUI-switch inline">
					    <input type="checkbox" name="displaySwitch" class="originUI-switchInput" id="displaySwitch" ng:model="demo.auto">
					    <label class="originUI-switchLabel" for="displaySwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
					</li>
					<li>
						<div class="originUI-upload originUI-icon originUiIcon-upload">
							<span class="originUI-uploadLabel">Reskin Image</span>
							<input type="file" name="files[]" id="demoPanel-upload-icon" class="originUI-uploadInput" ng:model="demo.reskin_img" fileupload>
						</div>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="demo.reskin_img" placeholder="Reskin CDN Link (optional)"/>
						</div>
					</li>
					<li>
						<label>Reskin Color</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="demo.reskin_color" placeholder="Reskin Hex Code"  maxlength="7" hex>
						</div>
					</li>
<!--
					<li>
						<label>URL Tag (optional)</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="demo.alias" placeholder="Custom URL Tag" alias/>
						</div>
					</li>
-->
				</ul>
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-center" ng:click="demoSave()">Save &amp; Create Demo</div>
			</div>
		</form>
	</div>
	
	
	
</div>
