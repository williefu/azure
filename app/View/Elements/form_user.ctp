<?php if($view === 'left') { ?>
<ul class="originUI-list">
	<li>
		<label>Group</label>
		<div class="originUI-field">
			<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.user_group_id">
				<option style="display:none" value="">Select Group</option>
				<?php foreach($userGroups as $key=>$group) { ?>
					<option value="<?php echo $key;?>"><?php echo $group;?></option>
				<?php } ?>
			</select>
		</div>
	</li>
	<li>
		<label>First Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.first_name" required/>
		</div>
	</li>
	<li>
		<label>Last Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.last_name"/>
		</div>
	</li>
	<li>
		<label>Email</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.email" required/>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>
<ul class="originUI-list">
	<li>
		<label>Username</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.username" required/>
		</div>
	</li>
	<li>
		<label>Password</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.password"/>
		</div>
	</li>
	<li>
		<label>Confirm Password</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.cpassword"/>
		</div>
	</li>
</ul>

<?php } ?>