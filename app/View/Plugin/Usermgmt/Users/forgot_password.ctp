<div id="user-forgot-password" class="origin-usermgmt origin-usermgmt-login">
	<h2 class="originUiModal-header originUI-borderColor originUI-textColor originUI-textColor">Forgot Password</h2>
	<form accept-charset="utf-8" method="post" id="UserForgotPasswordForm" action="/administrator/forgotPassword" class="originUiModal-content">
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" id="email" class="originUI-input originUI-bgColorSecondary" name="data[email]" placeholder="Enter Email/Username">
		</div>
	</form>
	<div class="originUiModal-footer">
		<div class="originUiModalFooter-center" ng:click="formSubmit('UserForgotPasswordForm')">Send Password Reset</div>
	</div>
</div>

<script>
document.getElementById('UserEmail').focus();
</script>