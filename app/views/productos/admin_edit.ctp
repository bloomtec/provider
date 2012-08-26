<div class="productos form">
<?php echo $this->Form->create('Producto');?>
	<fieldset>
 		<legend><?php __('Admin Edit Producto'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Producto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Producto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategoria', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>