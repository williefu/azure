<?php
	unset($userGroups[0]);
?>
<h2 class="originUI-header">User Management</h2>

<div id="user-list" class="" ng:controller="usersController">	

	<form id="user-create" name="userCreateForm" class="originUI-tileLeft originUI-bgColor originUI-shadow" novalidate>
		<h3 id="user-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('form_user', array('view'=>'left', 'editor' => 'editor', 'userGroups'=>$userGroups));?>
			<?php echo $this->element('form_user', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter" ng:click="userCreate()" ng-disabled="userCreateForm.$invalid">Create</button>
		</div>
	</form><!--
	--><div id="user-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="user-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Templates</h3>
		<table id="user-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="userFilter='User.first_name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription" ng:click="userFilter='User.email';reverse=!reverse">Username/Email</th>
				<th class="originUI-tableHeadGroup" ng:click="userFilter='UserGroup.name';reverse=!reverse">Group</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow" ng:repeat="user in users|orderBy:userFilter:reverse|filter:searchOrigin">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="user.User.active == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus(user.User.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="user.User.active != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus(user.User.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="userEdit(user)">{{user.User.first_name}} {{user.User.last_name}}</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="userEdit(user)">{{user.User.username}}/{{user.User.email}}</td>
					<td class="originUI-tableGroup originUI-tableCell" ng:click="templateEdit(template)">{{user.UserGroup.name}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="user-edit" name="user-edit" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="user-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit User</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove" ng:click="userRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('form_user', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('form_user', array('view'=>'right', 'editor' => 'editorModal'));?>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="$parent.originModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="userSave()">Save</div>
			</div>
		</form>
	</div>
	
<!--
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
-->
	
</div>
<?php
	echo $this->Minify->script(array('controllers/usersController'));
?>