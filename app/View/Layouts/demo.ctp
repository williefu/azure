<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?> | Origin</title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php
		echo $this->Minify->css(array('normalize', 'bootstrap', 'chardinjs', 'origin', 'origin-new', 'demo'));
		echo $this->Minify->script(array('jquery/jquery', 'jquery/jquery.ui.widget', 'jquery/jquery.fileupload', 'jquery/chardinjs.min', 'angularjs', 'angular-ui', 'angularui-bootstrap', 'origin', 'controller', 'controllers/demoController', 'services', 'directives', 'filters'));
	?>
</head>
<body class="originUI-bgTexture" ng:app="originApp" ng:controller="originGeneral">
	<?php echo $this->fetch('content'); ?>
</body>
</html>
