<div id="user-forgot-password" class="origin-usermgmt origin-usermgmt-login">
	<h2 class="originUiModal-header originUI-borderColor originUI-textColor originUI-textColor">Update Password</h2>
	<form accept-charset="utf-8" method="post" id="UserChangePasswordForm" action="/administrator/dashboard/password" class="originUiModal-content">
		<ul class="originUI-list">
			<li class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][oldpassword]" placeholder="Old Password">
			</li>
			<li class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" placeholder="New Password">
			</li>
			<li class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="password" id="UserOldpassword" class="originUI-input originUI-bgColorSecondary" name="data[User][cpassword]" placeholder="Confirm New Password">
			</li>
		</ul>
	</form>
	<div class="originUiModal-footer">
		<div class="originUiModalFooter-center" ng:click="formSubmit('UserChangePasswordForm')">Update Password</div>
	</div>
</div>

<script>
document.getElementById("UserPassword").focus();
</script>