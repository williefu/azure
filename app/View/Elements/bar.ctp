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
			<div class="originUI-icon originUiIcon-settings originUI-borderColor dropdown-toggle">Settings</div>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				<?php if($this->UserAuth->isAdmin()) { ?>
				<li>
					<a href="/administrator/dashboard" id="originBar-dashboard" class="originBar-settings">Dashboard</a>
				</li>
				<li>
					<a href="/administrator/dashboard/profile/<?php echo $userId;?>" id="originBar-account" class="originBar-settings">My Account</a>
				</li>
				<?php } else { ?>
				<li>
					<a href="/administrator/dashboard/password" id="originBar-account" class="originBar-settings">Update Password</a>
				</li>
				<?php } ?>
				<li>
					<a href="javascript:void(0)" id="originBar-help" class="originBar-settings">Help</a>
				</li>	
				<li>
					<a href="/administrator/logout" id="originBar-logout" class="originBar-settings">Logout</a>
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