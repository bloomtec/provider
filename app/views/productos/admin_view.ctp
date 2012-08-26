<div class="productos view">
<h2><?php  __('Producto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subcategoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($producto['Subcategoria']['id'], array('controller' => 'subcategorias', 'action' => 'view', $producto['Subcategoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['image_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Informacion De Producto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['informacion_de_producto']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Producto', true), array('action' => 'edit', $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Producto', true), array('action' => 'delete', $producto['Producto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategoria', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
