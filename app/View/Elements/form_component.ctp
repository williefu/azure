<?php if($view === 'left') { ?>

<ul class="originUI-list">
	<li>
		<label>Group</label>
		<div class="originUI-field">
			<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.group" ng:options="group.alias as group.name for group in groups|orderBy:'name'">
				<option style="display:none" value="">Select Group</option>
			</select>
		</div>
	</li>
	<li>
		<label>Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.name" ng:change="createAlias('<?php echo $editor;?>')" placeholder="Name of Component" required/>
		</div>
	</li>
	<li>
		<label>Alias</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.alias" placeholder="Template Filename" required/>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>
<ul class="originUI-list">
	<li>
		<label>Description</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.content.description" placeholder="Description of component"></textarea>
		</div>
	</li>
	<li>
		<div id="adComponent-iconUpload" class="originUI-upload originUI-icon originUiIcon-upload">
			<span class="originUI-uploadLabel">Component Icon</span>
			<input type="file" name="files[]" id="componentAdd-upload-icon" class="originUI-uploadInput" ng:model="<?php echo $editor;?>.config.img_icon" fileupload>
		</div>
	</li>
</ul>

<?php } ?>