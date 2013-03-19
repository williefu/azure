<?php
	$userId		= $this->UserAuth->getUserId();
	$linkLogo	= ($userId)? '/administrator/': '/';
?>
<div id="origin-bar">
	<div class="wrapper">
		<a href="<?php echo $linkLogo;?>" id="originBar-logo">Origin</a>
		
		<?php if($userId) {?>
		<div id="originBar-settings">
			<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings dropdown-toggle">Settings</a>
			<ul class="dropdown-menu originUI-bgColor">
				<?php if($this->UserAuth->isAdmin()) { ?>
				<li>
					<a href="/administrator/dashboard">Origin Settings</a>
				</li>
				<?php } ?>
				<li>
					<a href="/administrator/editUser/<?php echo $userId;?>">Update Profile</a>
				</li>
				<li>
					<a href="/administrator/changePassword">Update Password</a>
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