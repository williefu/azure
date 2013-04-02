<?php
	$userId		= $this->UserAuth->getUserId();
	$linkLogo	= ($userId)? '/administrator/': '/';
?>
<div id="origin-bar" class="originUI-borderColor">
	<div class="wrapper">
		<a href="<?php echo $linkLogo;?>" id="originBar-logo" class="originUI-borderColor">Origin</a>
		
		
		<div id="originBar-search" class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColor" ng:model="searchOrigin"/>
		</div>
		
		<?php if($userId) {?>
		<div id="originBar-settings" class="">
			<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings originUI-borderColor dropdown-toggle">Settings</a>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				<?php if($this->UserAuth->isAdmin()) { ?>
				<li>
					<a href="/administrator/dashboard">Dashboard</a>
				</li>
				<li>
					<a href="/administrator/dashboard/profile/<?php echo $userId;?>">My Account</a>
				</li>
				<?php } else { ?>
				<li>
					<a href="/administrator/dashboard/password">Update Password</a>
				</li>
				<?php } ?>
				<li>
					<a href="/administrator/logout">Logout</a>
				</li>		
			</ul>
		</div>
		<?php } else { ?>
		
		<div id="originBar-login" class="">
			<a href="/administrator/login" class="originUI-icon originUiIcon-login originUI-borderColor">Login</a>
		</div>
		<?php } ?>
		<?php echo $this->element('notification');?>
	</div>
</div>