<div class="subcategorias form">
<?php echo $this->Form->create('Subcategoria');?>
	<fieldset>
 		<legend><?php __('Admin Add Subcategoria'); ?></legend>
	<?php
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>