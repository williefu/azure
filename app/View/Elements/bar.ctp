<?php
	$userId		= $this->Session->read('UserAuth.User.id');
	$linkLogo	= ($userId)? '/administrator/': '/';
?>
<div id="origin-bar">
	<div class="wrapper">
		<a href="<?php echo $linkLogo;?>" id="originBar-logo">Origin</a>
		
		<?php if($userId) {?>
		<div id="originBar-settings">
			<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings dropdown-toggle">Settings</a>
			<ul class="dropdown-menu originUI-bgColor">
				<li>
					<a href="/administrator/dashboard">Account</a>
				</li>
				<li>
					<a href="javascript:void(0);">Users</a>
				</li>
				
				<li>
					<a href="/administrator/logout">Logout</a>
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