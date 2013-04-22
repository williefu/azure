<?php if($view === 'left') { ?>

<ul class="originUI-list">
	<li>
		<label>Type</label>
		<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.type">
			<option style="display:none" value="">Select Group</option>
			<option value="expandable">Expandable</option>
			<option value="overlay">Overlay</option>
		</select>
	</li>
	<li>
		<label>Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.name" ng:change="createAlias('<?php echo $editor;?>')" required/>
		</div>
	</li>
	<li>
		<label>Alias</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.alias" required/>
		</div>
	</li>
	<li>
		<label>Description</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.content.description" required></textarea>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>

<div id="adTemplate-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload">
	<span class="originUI-uploadLabel">Upload Storyboard</span>
	<input type="file" name="files[]" id="adTemplate-upload-storyboard" class="originUI-uploadInput" ng:model="<?php echo $editor;?>.content.file_storyboard" fileupload>
</div>
<accordion close-others="true" class="originUI-accordion">
	<accordion-group heading="{{dimension}} Dimensions" is-open="false" class="" ng:repeat="dimension in dimensions">
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Initial Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial[dimension].width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Initial Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial[dimension].height"/>
			</div>
		</div>
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Triggered Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered[dimension].width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Triggered Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered[dimension].height"/>
			</div>
		</div>
	</accordion-group>
	<accordion-group heading="Animation">
		<div class="inline adTemplate-config">
			<label class="originUI-label">Animation Start</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.start"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Animation End</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.end"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Animation Time</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.duration"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Animation Selector</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.selector"/>
			</div>
		</div>
	</accordion-group>
</accordion>



<?php } ?>