<?php
$cakeDescription 	= __d('cake_dev', 'Origin');
$userAdmin			= ($this->UserAuth->isAdmin())? 'originUI-superAdmin': '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?> | Origin</title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php
		//echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('origin');
		//echo $this->Html->css('/usermgmt/css/umstyle');
		
		echo $this->Minify->css(array(/* 'cake.generic',  '/usermgmt/css/umstyle', */'normalize', 'bootstrap', 'codemirror', 'chardinjs', 'origin', 'origin-new'));
		echo $this->Minify->script(array('jquery/jquery', 'jquery/jquery.ui.widget', 'jquery/jquery.fileupload', 'jquery/chardinjs.min', 'angularjs', 'angular-ui', 'angularui-bootstrap', 'origin', 'controller', 'services', 'directives', 'filters'));
		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
</head>
<body class="originUI-bgTexture <?php echo $userAdmin;?> <?php echo 'originClass-'.$this->params['action'];?>" ng:app="originApp" ng:controller="originGeneral">
	<?php echo $this->element('bar');?>
	<div id="container" class="wrapper">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('footer');?>
</body>
</html>
