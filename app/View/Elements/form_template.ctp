<?php if($view === 'left') { ?>

<ul class="originUI-list">
	<li>
		<label>Type</label>
		<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.type">
			<option style="display:none" value="">Select Group</option>
			<option value="inpage">In-Page</option>
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
	<li>
		<div id="adTemplate-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload">
			<span class="originUI-uploadLabel">Upload Storyboard</span>
			<input type="file" name="files[]" id="adTemplate-upload-storyboard" class="originUI-uploadInput" ng:model="<?php echo $editor;?>.content.file_storyboard" fileupload>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>
<accordion close-others="true" id="adTemplate-templateConfig" class="originUI-accordion originUI-superAdmin">
	<?php 
		$platforms	= array('Desktop', 'Tablet', 'Mobile');
		foreach($platforms as $key=>$platform) {
			$isOpen	= ($key === 0)? "true": "false";
	?>
	<accordion-group heading="<?php echo $platform;?> Dimensions" is-open="<?php echo $isOpen;?>" class="">
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Initial Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial.<?php echo $platform;?>.width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Initial Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial.<?php echo $platform;?>.height"/>
			</div>
		</div>
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Triggered Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered.<?php echo $platform;?>.width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Triggered Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered.<?php echo $platform;?>.height"/>
			</div>
		</div>
	</accordion-group>
	<?php }//End-foreach ?>
	<accordion-group heading="Animation">
		<div id="adTemplate-configSelector" class="inline adTemplate-config">
			<label class="originUI-label">Animation Selector</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.selector"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Selector Start</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.start"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Selector End</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.end"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Opening Duration</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.openDuration"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Closing Duration</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.closeDuration"/>
			</div>
		</div>
	</accordion-group>
</accordion>



<?php } ?>