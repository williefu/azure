
<!-- <div ng:include src="demo.template"></div> -->
<script type="text/javascript">
	var _config	= '<?php echo $demo['OriginDemo']['config'];?>';
</script>

<div  ng:controller="demoPublicController">
	<?php
		$config		= json_decode($demo['OriginDemo']['config']);
		echo $this->element('sites/'.$config->templateAlias);
	?>
</div>
