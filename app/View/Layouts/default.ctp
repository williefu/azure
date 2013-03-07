<?php
/**
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Origin');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Origin - <?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('origin');
		//echo $this->Html->css('/usermgmt/css/umstyle');
		
		echo $this->Minify->css(array('cake.generic', '/usermgmt/css/umstyle', 'normalize', 'origin'));
		echo $this->Minify->script(array('origin.plugin', 'origin'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="originUI-bgTexture route-<?php echo $this->request->url;?>">
	<div id="origin-bar">
		<div class="wrapper">
			<a href="#" id="originBar-logo">Origin</a>
			<a href="#" id="originBar-settings">Settings</a>
		</div>
	</div>
	<div id="container">
		<div id="content" class="wrapper">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			&copy;2013 All Rights Reserved. EVOLVE MEDIA, LLC
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
