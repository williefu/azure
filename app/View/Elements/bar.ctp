<div id="origin-bar">
	<div class="wrapper">
		<a href="/" id="originBar-logo">Origin</a>
		
		<?php if($this->Session->read('UserAuth.User.id')) {?>
		<div id="originBar-settings">
			<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings dropdown-toggle">Settings</a>
			<ul class="dropdown-menu">
				<li>
					<a href="/administrator/dashboard">Account</a>
				</li>
				<li>
					<a href="javascript:void(0);">Users</a>
				</li>
				
				<li>
					<a href="/logout">Logout</a>
				</li>
				
			</ul>
		</div>
		<?php } else { ?>
		
		<div id="originBar-login">
			<a href="/administrator/login" class="originUI-icon originUiIcon-login">Login</a>
		</div>
		<?php } ?>
	</div>
</div>