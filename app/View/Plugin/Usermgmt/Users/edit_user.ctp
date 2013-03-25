<h2 class="originUI-header">Edit Profile</h2>
<div id="user-edit" class="origin-usermgmt origin-usermgmt-edit originUI-bgColor">
	<form action="/administrator/editUser/1" method="post" id="UserEditUserForm">
		<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('id' ,array('type'=>'hidden', 'label'=>false, 'div'=>false))?>
		<ul>
			<li>
				<label>Group</label>
				<?php echo $this->Form->input('user_group_id', array('type'=>'select', 'label'=>false, 'div'=>false, 'class'=>''));?>
			</li>
			<li>
				<label>Username</label>
				<?php echo $this->Form->input('username', array('label'=>false, 'div'=>false, 'class'=>''));?>
			</li>
			<li>
				<label>First Name</label>
				<?php echo $this->Form->input('first_name', array('label'=>false, 'div'=>false, 'class'=>''));?>
			</li>
			<li>
				<label>Last Name</label>
				<?php echo $this->Form->input('last_name', array('label'=>false, 'div'=>false, 'class'=>''));?>
			</li>
			<li>
				<label>Email</label>
				<?php echo $this->Form->input('email', array('label'=>false, 'div'=>false, 'class'=>''));?>
			</li>
		</ul>
		<div id="userEdit-submit" class="originUI-icon originUiIcon-forward originUiButton-right" ng:click="formSubmit('UserEditUserForm')">Save</div>
		<!--
		<div id="templateAdd-submit" class="originUI-icon originUiIcon-save originUiButton-right" ng:click="templateSave()">Save</div>
		-->
		<?php
/*
			echo $this->Form->Submit(
				__('Update'), 
				array(
					'before'=>'Update',
					'div'=>array(
						'class'=>'originUI-icon originUiIcon-forward',
						'id'=>'user-edit-submit'
					)
				)
			);
*/
		?>
	</form>
</div>

<script>
document.getElementById("UserUserGroupId").focus();
</script>

<!--

<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Edit User'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="register">
				<div class="um_box_mid_content_mid_left">
					<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
			<?php   if (count($userGroups) >2) { ?>
						<div>
							<div class="umstyle3"><?php echo __('Group');?><font color='red'>*</font></div>
							<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
							<div style="clear:both"></div>
						</div>
			<?php   }   ?>
					<div>
						<div class="umstyle3"><?php echo __('Username');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('First Name');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('Last Name');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('Email');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"></div>
						<div class="umstyle4"><?php echo $this->Form->Submit(__('Update User'));?></div>
						<div style="clear:both"></div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>


-->