<div class="productos form">
<?php echo $this->Form->create('Producto');?>
	<fieldset>
 		<legend><?php __('Admin Add Producto'); ?></legend>
	<?php
		echo $this->Form->input('subcategoria_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('image_path');
		echo $this->Form->input('informacion_de_producto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Productos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategoria', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>