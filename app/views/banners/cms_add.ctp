<div class="banners form">
<?php echo $this->Form->create('Banner');?>
	<fieldset>
 		<legend><?php __('Cms Add Banner'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Banners', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Imagenes', true), array('controller' => 'imagenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Imagen', true), array('controller' => 'imagenes', 'action' => 'add')); ?> </li>
	</ul>
</div>