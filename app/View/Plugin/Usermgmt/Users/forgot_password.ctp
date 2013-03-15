	<div id="user-forgot-password" class="origin-usermgmt origin-usermgmt-login">
		<?php 
			echo $this->Form->create('User', array('action' => 'forgotPassword'));
		?>
			<ul>
				<li><?php echo __('Enter Email / Username');?></li>
				<li><?php echo $this->Form->input('email', array('label'=>false, 'div'=>false, 'class'=>''));?></li>
			</ul>
		<?php
			echo $this->Form->Submit(
				__('Send Email'), 
				array(
					'before'=>'Send Email',
					'div'=>array(
						'class'=>'originUI-icon originUiIcon-forward',
						'id'=>'forgot-password-submit'
					)
				)
			);
			echo $this->Form->end();
		?>
	</div>
	
	<script>
	document.getElementById('UserEmail').focus();
	</script>