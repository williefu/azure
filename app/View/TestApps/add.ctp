<div class="testApps form">
<?php echo $this->Form->create('TestApp'); ?>
	<fieldset>
		<legend><?php echo __('Add Test App'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Test Apps'), array('action' => 'index')); ?></li>
	</ul>
</div>
