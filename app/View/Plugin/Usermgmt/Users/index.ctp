<!--
<div id="originUI-header">
	<a href="/administrator/dashboard" class="inline">
		<img src="/img/icon-back.png" alt="back"/>
	</a>
	<h2 id="" class="origin-header inline">Origin Users</h2>
	<a href="/administrator/addUser" id="user-add" class="originUI-bgColor inline">Add New User</a>
</div>
-->

<?php
	unset($userGroups[0]);
?>

<h2 class="originUI-header">User Management</h2>

<div id="user-list" class="origin-usermgmt" ng:controller="originAllUsers">	
	
	<div id="userList-add" class="originUI-bgColor originUI-shadow dashboard-left">
		<h3 id="userListAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor">Add User</h3>
		<form id="userList-form">
			<ul class="originUI-list">
				<li>
					<label>Group</label>
					<div class="originUI-select">
						<a href="javascript:void(0);" class="dropdown-toggle originUI-selectLabel">{{groupName}}</a>
						<ul class="dropdown-menu originUI-bgColor originUI-selectOption originUI-borderColor">
							<?php foreach($userGroups as $key=>$group) { ?>
								<li ng:click="userGroup(<?php echo $key;?>, '<?php echo $group;?>')">
									<a href="javascript:void(0)"><?php echo $group;?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</li>
				<li>
					<label>First Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.first_name"/>
					</div>
				</li>
				<li>
					<label>Last Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.last_name"/>
					</div>
				</li>
				<li>
					<label>Email</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.email"/>
					</div>
				</li>
				<li>
					<label>Username</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.username"/>
					</div>
				</li>
				<li>
					<label>Password</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="editor.password"/>
					</div>
				</li>
				<li>
					<label>Confirm Password</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="editor.cpassword"/>
					</div>
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="userCreate()">Create User</div>
		</div>
	</div>
	<div id="userList-listing" class="originUI-bgColor originUI-shadow dashboard-right">
		<h3 id="userList-header" class="originUiModal-header originUI-borderColor originUI-textColor">Users</h3>
		<table id="userList-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUiTable-head">
				<th class="userList-status">&nbsp;</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Group</th>
			</thead>
			<tbody class="originUiTable-body">
				<tr class="originUiTable-row" ng:repeat="user in originUsers|filter:searchOrigin" ng:class:even="'originUI-even'" ng:class:odd="'originUI-odd'">
					<td ng:show="user.User.active == '1'" class="originUiTable-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="userStatus(user.User.id, 'disable')"/>
					</td>
					<td ng:show="user.User.active != '1'" class="originUiTable-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="userStatus(user.User.id, 'enable')"/>
					</td>
					<td ng:click="userEdit(user)">{{user.User.first_name}} {{user.User.last_name}}</td>
					<td ng:click="userEdit(user)">{{user.User.username}}</td>
					<td ng:click="userEdit(user)">{{user.User.email}}</td>
					<td ng:click="userEdit(user)">{{user.UserGroup.name}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	
	
	<div modal="originModal" close="originModalClose()" options="originModalOptions">
		<form id="userList-edit" name="userList-edit" class="originUI-bgColorSecondary originUI-modal">
		
			<h3 id="userListEdit-header" class="originUiModal-header originUI-borderColor originUI-textColor">Edit User</h3>
			<div class="originUiModal-content">
				<div class="originUiModal-contentLeft">
					<ul class="originUI-list">
						<li>
							<label>First Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.first_name"/>
							</div>
						</li>
						<li>
							<label>Last Name</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.last_name"/>
							</div>
						</li>
						<li>
							<label>Email</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.email"/>
							</div>
						</li>
					</ul>
				</div>
				<div class="originUiModal-contentRight">
					<ul class="originUI-list">
						<li>
							<label>Group</label>
							<div class="originUI-select">
								<input type="hidden" value="{{editorEdit.user_group_id}}"/>
								<a href="javascript:void(0);" class="dropdown-toggle originUI-selectLabel">{{editorEdit.group.name}}</a>
								<ul class="dropdown-menu originUI-bgColor originUI-selectOption">
									<?php foreach($userGroups as $key=>$group) { ?>
										<li ng:click="userEditGroup(<?php echo $key;?>, '<?php echo $group;?>')">
											<a href="javascript:void(0)"><?php echo $group;?></a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</li>
						<li>
							<label>Username</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.username"/>
							</div>
						</li>
						<li>
							<label>Password</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.password"/>
							</div>
						</li>
						<li>
							<label>Confirm Password</label>
							<div class="originUI-field">
								<div class="originUI-fieldBracket"></div>
								<input type="password" class="originUI-input originUI-bgColorSecondary" ng:model="editorEdit.cpassword"/>
							</div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="originModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="userUpdate()">Save</div>
			</div>
		</form>
	</div>
	
</div>