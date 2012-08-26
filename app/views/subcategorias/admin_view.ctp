<div class="subcategorias view">
<h2><?php  __('Subcategoria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($subcategoria['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $subcategoria['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subcategoria', true), array('action' => 'edit', $subcategoria['Subcategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Subcategoria', true), array('action' => 'delete', $subcategoria['Subcategoria']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subcategoria['Subcategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategoria', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Productos');?></h3>
	<?php if (!empty($subcategoria['Producto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Subcategoria Id'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Image Path'); ?></th>
		<th><?php __('Informacion De Producto'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subcategoria['Producto'] as $producto):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $producto['id'];?></td>
			<td><?php echo $producto['subcategoria_id'];?></td>
			<td><?php echo $producto['nombre'];?></td>
			<td><?php echo $producto['image_path'];?></td>
			<td><?php echo $producto['informacion_de_producto'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'productos', 'action' => 'delete', $producto['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Producto', true), array('controller' => 'productos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
