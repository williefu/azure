<div class="testApps form">
<?php echo $this->Form->create('TestApp'); ?>
	<fieldset>
		<legend><?php echo __('Edit Test App'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('config');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TestApp.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TestApp.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Test Apps'), array('action' => 'index')); ?></li>
	</ul>
</div>
