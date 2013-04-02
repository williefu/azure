<?php
	$user 	= $this->UserAuth->getUser();
	//print_r($user['User']['first_name']);
?>

<div id="user-account" ng:controller="">
	<h2 class="originUI-header">My Account</h2>
	
	
	<div id="userAccount-left" class="dashboard-left inline">
		<a href="/administrator/editUser/<?php echo $user['User']['id'];?>" id="userAccount-profile" class="originUI-tiles">
			<div class="originTile-title">Update Profile</div>
		</a>
		<a href="/administrator/changePassword" id="userAccount-password" class="originUI-tiles">
			<div class="originTile-title">Update Password</div>
		</a>
	</div><!--
	--><div id="userAccount-right" class="dashboard-right inline originUI-bgColor">
			<h3 id="userAccount-header" class="originUiModal-header originUI-borderColor originUI-textColor">Profile</h3>
			<ul>
				<li>
					<label>Name</label>
					<?php echo $user['User']['first_name'].' '.$user['User']['last_name'];?>
				</li>
				<li>
					<label>E-mail</label>
					<?php echo $user['User']['email'];?>
				</li>
				<li>
					<label>Group</label>
					<?php echo $user['UserGroup']['name'];?>
				</li>
			</ul>
	</div>
</div>