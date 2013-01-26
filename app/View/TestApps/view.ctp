<div class="testApps view">
<h2><?php  echo __('Test App'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testApp['TestApp']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($testApp['TestApp']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Test App'), array('action' => 'edit', $testApp['TestApp']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test App'), array('action' => 'delete', $testApp['TestApp']['id']), null, __('Are you sure you want to delete # %s?', $testApp['TestApp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Apps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test App'), array('action' => 'add')); ?> </li>
	</ul>
</div>
