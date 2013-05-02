<script type="text/javascript">
	var origin_embed	= '<?php echo urlencode($this->element('origin_embed'));?>';
	var origin_ad		= '<?php echo $origin_ad;?>';
</script>
<div id="" ng:controller="demoController" ng:cloak>
	<div ng:include src="demo.template"></div>
	
	
	
	
	<div id="demo-panel" class="originUI-borderColor originUI-shadow">
		<form id="demoPanel-form" name="demoPanelForm" class="originUI-bgColorSecondary" novalidate>
			<input type="hidden" name="uploadDir" value="/assets/demos/"/>
			
			<h3 id="demoPanel-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Demo Options</h3>
			<div id="demoPanel-content" class="originUI-tileContent">
				<ul class="originUI-list">
					<li>
						<label>Name</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="demo.name" placeholder="Demo Page Title" required>
						</div>
					</li>
					<li>
						<label>Template</label>
						<div class="originUI-field">
							<select class="originUI-select originUI-bgColorSecondary" ng:model="demo.templateAlias" ng:options="template.OriginSite.alias as template.OriginSite.name for template in templates|filter:{OriginSite.status: '1'}" ng:change="loadTemplate()">
								<option style="display:none" value="">Select Group</option>
							</select>
						</div>
					</li>
<!--
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
-->
					<li>
						<div class="originUI-upload">
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
					<li ng:show="link">
						<a href="{{link}}" target="_blank">Demo Link</a>
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
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterCenter" ng:click="demoSave()" ng:disabled="demoPanelForm.$invalid">Save &amp; Create Demo</button>
			</div>
		</form>
	</div>
	
	
	
</div>
