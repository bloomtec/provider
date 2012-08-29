<div class="subcategorias view">
<h2><?php  __('Subcategoría');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($subcategoria['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $subcategoria['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this -> element('cms-actions'); ?>
<div class="related">
	<h3><?php __('Productos Relacionados');?></h3>
	<?php if (!empty($subcategoria['Producto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
	
		
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Image Path'); ?></th>
		<th><?php __('beneficios'); ?></th>
		<th class="actions"><?php __('acciones');?></th>
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
			
			
			<td><?php echo $producto['nombre'];?></td>
			<td><?php if($producto['image_path']) echo $this->Html->image($producto['image_path'],array("width"=>"150"));?></td>
			<td><?php echo $producto['beneficios'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Modificar', true), array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'productos', 'action' => 'delete', $producto['id']), null, sprintf(__('Esta seguro que quiere borrar el producto %s?', true), $producto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Crear Producto', true), array('controller' => 'productos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
