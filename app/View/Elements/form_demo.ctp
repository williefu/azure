<?php if($view === 'left') { ?>

<ul class="originUI-list">
	<li>
		<label>Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.name" ng:change="createAlias('<?php echo $editor;?>')" placeholder="Name of Site" required/>
		</div>
	</li>
	<li>
		<label>Alias</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.alias" placeholder="Template filename" required/>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>
<ul class="originUI-list">
	<li>
		<label>Description</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.content.description" placeholder="Description of site" required></textarea>
		</div>
	</li>
</ul>

<?php } ?>