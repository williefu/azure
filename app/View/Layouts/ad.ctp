<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?></title>
	<?php
		//echo $this->Minify->css(array('normalize', 'bootstrap', 'chardinjs', 'origin', 'demo'));
		//echo $this->Minify->script(array('jquery/jquery', 'jquery/jquery.ui.widget', 'jquery/jquery.fileupload', 'jquery/chardinjs.min', 'angularjs', 'angular-ui', 'angularui-bootstrap', 'origin', 'controller', 'controllers/demoController', 'services', 'directives', 'filters'));
	?>
</head>
<body ng:app="originAdApp" ng:controller="originAdController" ng:cloak>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
