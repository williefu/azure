<?php
	$user		= $this->request->data;
	unset($userGroups[0]);
?>

<div id="user-account" ng:controller="originUser">
	<h2 class="originUI-header">My Account</h2>
	<div id="userAccount-left" class="dashboard-left originUI-bgColor originUI-shadow">
		<h3 id="userAccountPassword-header" class="originUiModal-header originUI-borderColor originUI-textColor originUI-textColor">Update Password</h3>
		<form class="originUiModal-content">
			<ul class="originUI-list">
				<li class="originUI-field">
					Old Password
					<div class="originUI-fieldBracket"></div>
					<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][oldpassword]" placeholder="" ng:model="password.oldpassword">
				</li>
				<li class="originUI-field">
					New Password
					<div class="originUI-fieldBracket"></div>
					<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" placeholder="" ng:model="password.password">
				</li>
				<li class="originUI-field">
					Confirm New Password
					<div class="originUI-fieldBracket"></div>
					<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][cpassword]" placeholder="" ng:model="password.cpassword">
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="userPasswordUpdate()">Update Password</div>
		</div>
	</div><!--
		
	
	
	<div id="userAccount-left" class="dashboard-left inline">
		<a href="/administrator/dashboard/password" id="userAccount-password" class="originUI-tiles">
			<div class="originTile-title">Update Password</div>
		</a>
	</div>
	--><div id="userAccount-right" class="dashboard-right originUI-bgColor originUI-shadow">
		<h3 id="userAccount-header" class="originUiModal-header originUI-borderColor originUI-textColor">Profile</h3>
		<form accept-charset="utf-8" method="post" id="UserEditUserForm" action="/administrator/dashboard/profile/<?php echo $user['User']['id'];?>" class="originUiModal-content">
		
			<input type="hidden" id="id" name="data[id]" value="<?php echo $user['User']['id'];?>">
			<input type="hidden" value="PUT" name="_method">
			
			<ul class="originUI-list">
				<?php if($this->UserAuth->isAdmin()) {?>
<!--
				<li>
					<label>Group</label>
					<div class="originUI-select">
						<a href="javascript:void(0);" class="dropdown-toggle originUI-selectLabel">{{groupName}}</a>
						<ul class="dropdown-menu originUI-bgColor originUI-selectOption">
							<?php foreach($userGroups as $key=>$group) { ?>
								<li ng:click="userGroup(<?php echo $key;?>, '<?php echo $group;?>')">
									<a href="javascript:void(0)"><?php echo $group;?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</li>
-->
<!--
				<li>
					<label>Group</label>
					<?php echo $this->Form->input('user_group_id', array('type'=>'select', 'label'=>false, 'div'=>false, 'class'=>''));?>
				</li>
-->
				<?php } ?>
<li class="originUI-field">
					First Name
					<div class="originUI-fieldBracket"></div>
					<input type="text" id="first_name" class="originUI-input originUI-bgColorSecondary" name="data[first_name]" value="<?php echo $user['User']['first_name'];?>" placeholder="First Name">
				</li>
				<li class="originUI-field">
					Last Name
					<div class="originUI-fieldBracket"></div>
					<input type="text" id="last_name" class="originUI-input originUI-bgColorSecondary" name="data[last_name]" value="<?php echo $user['User']['last_name'];?>" placeholder="Last Name">
				</li>
				<li class="originUI-field">
					Username
					<div class="originUI-fieldBracket"></div>
					<input type="text" id="username" class="originUI-input originUI-bgColorSecondary" name="data[username]" value="<?php echo $user['User']['username'];?>" placeholder="Username">
				</li>
				<li class="originUI-field">
					Email
					<div class="originUI-fieldBracket"></div>
					<input type="text" id="email" class="originUI-input originUI-bgColorSecondary" name="data[email]" value="<?php echo $user['User']['email'];?>" placeholder="Email">
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="formSubmit('UserEditUserForm')">Update Profile</div>
		</div>
	</div>
</div>

<script>
//document.getElementById("UserUserGroupId").focus();
</script>