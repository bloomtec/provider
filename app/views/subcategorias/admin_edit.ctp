<div class="subcategorias form">
<?php echo $this->Form->create('Subcategoria');?>
	<fieldset>
 		<legend><?php __('Admin Edit Subcategoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Subcategoria.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subcategoria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>