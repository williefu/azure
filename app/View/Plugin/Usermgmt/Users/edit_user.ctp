<?php
	$user		= $this->request->data;
	unset($userGroups[0]);
?>

<div id="user-account" ng:controller="originUser">
	<h2 class="originUI-header">My Account</h2>
	<form id="userAccount-left" class="originUI-tileLeft originUI-bgColor originUI-shadow" name="userAccountPasswordForm" novalidate>
		<h3 id="userAccountPassword-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Update Password</h3>
		<div class="originUI-tileContent">
			<ul class="originUI-list">
				<li>
					<label>Old Password</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][oldpassword]" placeholder="" ng:model="password.oldpassword" required>
					</div>
				</li>
				<li>
					<label>New Password</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" placeholder="" ng:model="password.password" required>
					</div>
				</li>
				<li>
					<label>Confirm New Password</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][cpassword]" placeholder="" ng:model="password.cpassword" required>
					</div>
				</li>
			</ul>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter" ng:click="userPasswordUpdate()" ng-disabled="userAccountPasswordForm.$invalid">Update Password</button>
		</div>
	</form><!--
	--><div id="userAccount-right" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="userAccount-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Profile</h3>
		<form accept-charset="utf-8" method="post" id="UserEditUserForm" action="/administrator/dashboard/profile/<?php echo $user['User']['id'];?>" class="originUI-tileContent" novalidate>
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
				<li>
					<label>First Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" id="first_name" class="originUI-input originUI-bgColorSecondary" name="data[first_name]" value="<?php echo $user['User']['first_name'];?>" placeholder="First Name">
					</div>
				</li>
				<li>
					<label>Last Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" id="last_name" class="originUI-input originUI-bgColorSecondary" name="data[last_name]" value="<?php echo $user['User']['last_name'];?>" placeholder="Last Name">
					</div>
				</li>
				<li>
					<label>Username</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" id="username" class="originUI-input originUI-bgColorSecondary" name="data[username]" value="<?php echo $user['User']['username'];?>" placeholder="Username" required>
					</div>
				</li>
				<li>
					<label>Email</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" id="email" class="originUI-input originUI-bgColorSecondary" name="data[email]" value="<?php echo $user['User']['email'];?>" placeholder="Email" required>
					</div>
				</li>
			</ul>
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterCenter" ng:click="formSubmit('UserEditUserForm')" ng-disabled="userAccountForm.$invalid">Update Profile</button>
			</div>
		</form>
	</div>
</div>

<script>
//document.getElementById("UserUserGroupId").focus();
</script>