<!--
<div id="originUI-header">
	<a href="/administrator/dashboard" class="inline">
		<img src="/img/icon-back.png" alt="back"/>
	</a>
	<h2 id="" class="origin-header inline">Origin Users</h2>
	<a href="/administrator/addUser" id="user-add" class="originUI-bgColor inline">Add New User</a>
</div>
-->

<h2 class="originUI-header">User List</h2>

<div id="user-list" class="origin-usermgmt" ng:controller="originAllUsers">	
	
	<div id="userList-left" class="">
		<div id="userList-add" class="userList-item originUI-tiles" ng:click="userCreate()">
    		<div class="originTile-title">New User</div>
    	</div>
	</div>
	<div id="userList-right" class="">
	    <div class="userList-item originUI-bgColor originUI-tiles" ng:repeat="user in originUsers|filter:searchOrigin" ng:click="templateEdit(template)">
	    	<h3 class="userListItem-title">{{user.User.first_name}} {{user.User.last_name}}</h3>
	    </div>
	    <div class="clear"></div>
	</div>    
    
    
<!--
	<table cellspacing="0" cellpadding="0" width="100%" border="0">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th ng:click="sortBy = 'User.id';reverse=!reverse"><?php echo __('ID');?></th>
				<th ng:click="sortBy = 'User.first_name';reverse=!reverse"><?php echo __('Name');?></th>
				<th ng:click="sortBy = 'User.username';reverse=!reverse"><?php echo __('Username');?> (<?php echo __('Email');?>)</th>
				<th><?php echo __('Group');?></th>
				<th><?php echo __('Modified');?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="user-list-row" ng:repeat="user in originUsers | orderBy:sortBy:reverse" ng:class:even="'originUI-even'" ng:class:odd="'originUI-odd'">
				<td ng:show="user.User.active == '1'" class="list-row-status">
					<a href="/usermgmt/users/makeActiveInactive/{{user.User.id}}/0">
						<img src="/img/icon-check.png" alt="Active" ng:click=""/>
					</a>
				</td>
				<td ng:show="user.User.active != '1'" class="list-row-status">
					<a href="/usermgmt/users/makeActiveInactive/{{user.User.id}}/1">
						<img src="/img/icon-cancel.png" alt="Inactive" ng:click=""/>
					</a>
				</td>
				<td class="list-row-id">{{user.User.id}}</td>
				<td class="list-row-name">
					<a href="/administrator/editUser/{{user.User.id}}">{{user.User.first_name}} {{user.User.last_name}}</a>
				</td>
				<td class="list-row-username">{{user.User.username}} ({{user.User.email}})</td>
				<td class="list-row-group">{{user.UserGroup.name}}</td>
				<td class="list-row-date">{{user.User.modified|date:'medium'}}</td>
				<td></td>
			</tr>
		</tbody>
	</table>
-->

<!--
					if ($row['User']['active']==0) {
							echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/1')."'><img src='".SITE_URL."usermgmt/img/dis-approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
						} else {
							echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/0')."'><img src='".SITE_URL."usermgmt/img/approve.png' border='0' alt='Make Inactive' title='Make Inactive'></a></span>";
						}

					echo"</td>";
					echo "<td>".$sl."</td>";
					echo "<td><a href='".$this->Html->url('/administrator/editUser/'.$row['User']['id'])."'>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</a></td>";
					echo "<td><a href='".$this->Html->url('/administrator/editUser/'.$row['User']['id'])."'>".h($row['User']['username'])."/".h($row['User']['email'])."</a></td>";
					echo "<td>".h($row['UserGroup']['name'])."</td>";
					echo "<td>".date('d-M-Y',strtotime($row['User']['created']))."</td>";
					echo "<td>";
						//echo "<span class='icon'><a href='".$this->Html->url('/editUser/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
						echo "<span class='icon'><a href='".$this->Html->url('/changeUserPassword/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a></span>";
						if ($row['User']['email_verified']==0) {
							echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/verifyEmail/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/email-verify.png' border='0' alt='Verify Email' title='Verify Email'></a></span>";
						}
						if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
							echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $row['User']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
						}
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
			} ?>
		</tbody>
	</table>
-->
</div>