<form id="UserLoginForm" name="UserLoginForm" class="originUI-tileLeft originUI-bgColor originUI-shadow" method="post" action="/administrator/login" novalidate>
	<h3 id="login-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Login</h3>
	<div class="originUI-tileContent">
		<ul class="originUI-list">
			<li id="login-email">
				<div class="originUI-field">
					<div class="originUI-fieldBracket"></div>
					<input type="text" class="originUI-input originUI-bgColorSecondary" name="data[User][email]" id="UserEmail" placeholder="Username or Email" required/>
				</div>
				
			</li>
			<li id="login-password">
				<div class="originUI-field">
					<div class="originUI-fieldBracket"></div>
					<input type="password" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" id="UserPassword" placeholder="Password" required/>
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
	</div>
	<div class="originUI-tileFooter">
		<button class="originUI-tileFooterCenter" ng:click="formSubmit('UserLoginForm')" ng-disabled="UserLoginForm.$invalid">Login</button>
	</div>
</form>
<script>
document.getElementById("UserEmail").focus();
</script>