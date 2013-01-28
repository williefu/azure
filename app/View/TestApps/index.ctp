<div class="testApps index">
	<h2><?php echo __('Test Apps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--th><?php print_r($this->userAuth->getUser()); ?></th-->
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($testApps as $testApp): ?>
	<tr>
		<td><?php echo h($testApp['TestApp']['id']); ?>&nbsp;</td>
		<td><?php echo h($testApp['TestApp']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $testApp['TestApp']['id'])); ?>
			<?php 
				if($this->userAuth->getGroupId()==1 || $this->userAuth->getGroupId()==4) {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $testApp['TestApp']['id'])); 
			}?>
			<?php 
			if($this->userAuth->getGroupId()==1) {
				echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testApp['TestApp']['id']), null, __('Are you sure you want to delete # %s?', $testApp['TestApp']['id'])); 
			}?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Test App'), array('action' => 'add')); ?></li>
	</ul>
</div>
