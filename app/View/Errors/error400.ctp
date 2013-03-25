<h2 class="originUI-header">Page Not Found</h2>
<div id="error" class="originUI-bgColor">
	<img id="error-image" src="/img/error-404.png"/>
	<div id="error-message">
		<strong><?php echo __d('cake', 'Error'); ?>: </strong>
		<?php printf(
			__d('cake', 'The requested address %s was not found on this server.'),
			"<strong>'{$url}'</strong>"
		); ?>
	</div>
</div>
<?php
if (Configure::read('debug') > 0 ):
	echo $this->element('exception_stack_trace');
endif;
?>
