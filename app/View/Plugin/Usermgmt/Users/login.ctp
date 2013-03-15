	<div id="user-login" class="origin-usermgmt origin-usermgmt-login">
		<?php 
			echo $this->Form->create('User', array('action' => 'login')); 
		?>
			<ul>
				<li id="login-email">
					<?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'class'=>''));?>
				</li>
				<li id="login-password">
					<?php echo $this->Form->input('password', array('type'=>'password', 'label' => false, 'div' => false, 'class'=>''));?>
				</li>
				<li id="login-settings">
				<?php 
					if(!isset($this->request->data['User']['remember'])) {$this->request->data['User']['remember']=true;}
					
					echo $this->Form->input('remember', array('type'=>'checkbox', 'label' =>__('Remember me'), 'div'=>'inline login-remember-input'));
					//echo $this->Html->tag('span', __('Remember me'), array('class'=>'inline login-remember'));
					echo __(' | ');
					echo $this->Html->link(__('Forgot Password?', true),'/administrator/forgotPassword', array('class'=>'inline login-forgot'));
				?>
				</li>
			</ul>
		<?php
			echo $this->Form->Submit(
				__('Sign In'), 
				array(
					'before'=>'Sign In',
					'div'=>array(
						'class'=>'originUI-icon originUiIcon-forward',
						'id'=>'login-submit'
					)
				)
			);
			echo $this->Form->end();
		?>
	</div>
	
	<script>
	document.getElementById("UserEmail").focus();
	</script>