<div class="testApps form">
<?php echo $this->Form->create('TestAppArticle'); ?>
	<fieldset>
		<legend><?php //echo __('Add Test App'); ?></legend>
		<h3>Add Articles</h3>
	<?php
		echo $this->Form->input('TestAppsArticle.image', array('label'=>'Image Path' ));
		echo $this->Form->input('TestAppsArticle.desc', array('label'=>'Description' ));
		echo $this->Form->input('TestAppsArticle.test_app_id', array('type'=>'hidden', 'value'=>$this->params['pass']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Next')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Test Apps'), array('action' => 'index')); ?></li>
	</ul>
</div>

<script type="text/javascript">

function showOptions(listItem) {
var listItemDiv = document.getElementById(listItem);

if(listItemDiv.style.visibility == 'hidden') {
        listItemDiv.style.visibility = 'visible';
    } else {
        listItemDiv.style.visibility = 'hidden';
    }


}

</script>
