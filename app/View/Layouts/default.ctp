<?php
$cakeDescription = __d('cake_dev', 'Origin');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Origin - <?php echo $title_for_layout; ?></title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php
		//echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('origin');
		//echo $this->Html->css('/usermgmt/css/umstyle');
		
		echo $this->Minify->css(array(/* 'cake.generic',  */'/usermgmt/css/umstyle', 'normalize', 'origin', 'bootstrap'));
		echo $this->Minify->script(array('jquery', 'angularjs', 'angularui-bootstrap', 'origin', 'creator/controller', 'creator/services', 'creator/directives', 'creator/filters'));
		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
</head>
<body class="originUI-bgTexture originUI-text route-<?php echo $this->request->url;?>" ng:controller="originCtrl" ng:app="originApp">
	<div id="origin-bar">
		<div class="wrapper">
			<a href="/" id="originBar-logo">Origin</a>
			
			
			<div id="originBar-settings">
				<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings dropdown-toggle">Settings</a>
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">Settings</a>
					</li>
					<li>
						<a href="javascript:void(0);">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="container" class="wrapper">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<div id="footer">
		&copy;2013 All Rights Reserved. EVOLVE MEDIA, LLC
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
