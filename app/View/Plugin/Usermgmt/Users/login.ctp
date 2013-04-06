<div id="user-login" class="origin-usermgmt origin-usermgmt-login">
	<h2 class="originUiModal-header originUI-borderColor originUI-textColor originUI-textColor">Login</h2>
	<form method="post" id="UserLoginForm" class="originUiModal-content" action="/administrator/login">
		<ul class="originUI-list">
			<li id="login-email">
				<div class="originUI-field">
					<div class="originUI-fieldBracket"></div>
					<input type="text" class="originUI-input originUI-bgColorSecondary" name="data[User][email]" id="UserEmail" placeholder="Username or Email"/>
				</div>
				
			</li>
			<li id="login-password">
				<div class="originUI-field">
					<div class="originUI-fieldBracket"></div>
					<input type="password" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" id="UserPassword" placeholder="Password"/>
				</div>
			</li>
			<li id="login-settings">
			<?php 
				if(!isset($this->request->data['User']['remember'])) {
					$this->request->data['User']['remember']=true;
					$checked	= "checked='checked'";
				} else {
					$checked	= "";
				}
			?>
				<div class="inline login-remember-input">
					<input type="hidden" value="0" id="remember_" name="data[User][remember]">
					<input type="checkbox" id="remember" value="1" name="data[User][remember]"<?php echo $checked;?>>
					<label for="remember">Remember me</label>
				</div> |
				<a class="inline login-forgot" href="/administrator/forgotPassword">Forgot Password?</a>
			</li>
		</ul>
	</form>
	<div class="originUiModal-footer">
		<div class="originUiModalFooter-center" ng:click="formSubmit('UserLoginForm')">Sign In</div>
	</div>
</div>
<script>
document.getElementById("UserEmail").focus();
</script>