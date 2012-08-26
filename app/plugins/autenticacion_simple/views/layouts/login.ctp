<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Administrador de Archivos:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('/autenticacion_simple/css/cake.generic');
		echo $this->Html->script("/administracion_archivos/js/jquery-1.4.2.min.js");
		echo $this->Html->script("/administracion_archivos/js/jquery.uploadify.v2.1.0.js");
		echo $this->Html->script("/administracion_archivos/js/swfobject.js");
		echo $this->Html->script("/administracion_archivos/js/upload.js");
		echo $this->Html->script("/administracion_archivos/js/common.js");
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container" class="administacion_archivos">
	 <div id="header">
      <h1><?php echo $this->Html->link($this->Html->image("header.jpg"), "/",array('escape'=>false)); ?></h1>
    </div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('/img/gesta-logo.jpg', array('alt'=> __("Powered by GESTA", true), 'border' => '0',"height"=>50)),
					'http://www.gestadesign.com/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>