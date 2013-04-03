<?php
	$user 	= $this->UserAuth->getUser();
	//print_r($user['User']['first_name']);
?>

<div id="user-account" ng:controller="">
	<h2 class="originUI-header">Origin System Settings</h2>
	<div id="" class="dashboard-left inline">
		<a href="/administrator/editUser/<?php echo $user['User']['id'];?>" id="userAccount-profile" class="originUI-tiles">
			<div class="originTile-title">Update Profile</div>
		</a>
		<a href="/administrator/changePassword" id="userAccount-password" class="originUI-tiles">
			<div class="originTile-title">Update Password</div>
		</a>
	</div><!--
	--><div id="" class="dashboard-right inline originUI-bgColor">
			<h3 id="userAccount-header" class="originUiModal-header originUI-borderColor originUI-textColor">Profile</h3>
	</div>
</div>