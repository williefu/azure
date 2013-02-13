<div class="">
	<h2><?php echo __('Syndi'); ?></h2>
</div>
<div class="actions">
	<h3><?php echo __('List'); ?></h3>
	<?php echo $this->Html->link(__('Origin'), array('action' => '../../../../Origin')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
	
		<th class="actions"><?php echo __('ID'); ?></th>
		<th class="actions"><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Manager'); ?></th>
		<th class="actions"><?php echo __('Preview'); ?></th>
	</tr>
	<?php
	foreach ($orochis as $orochi): ?>
	<tr>
		<td><?php echo h($orochi['WebsvcOrochi']['id']); ?>&nbsp;</td>
		<td><?php echo h($orochi['WebsvcOrochi']['title']); ?>&nbsp;</td>
		<td><?php echo h($orochi['WebsvcOrochi']['manager']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__('View'), array('action' => 'view', $orochi['WebsvcOrochi']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
	</table>
	
	
	<ul>
		<li><?php //echo $this->Html->link(__('Syndi'), array('action' => 'syndi')); ?></li>
	</ul>
</div>