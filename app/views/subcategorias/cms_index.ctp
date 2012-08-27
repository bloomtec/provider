<div class="subcategorias index">
	<h2><?php __('Subcategorías');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort("Categoría",'categoria_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($subcategorias as $subcategoria):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	
		<td>
			<?php echo $this->Html->link($subcategoria['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $subcategoria['Categoria']['id'])); ?>
		</td>
			
		<td><?php echo $subcategoria['Subcategoria']['nombre']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link("Ordenar Productos",array("action"=>"ordenar_productos",$subcategoria["Subcategoria"]["id"]));?>
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $subcategoria['Subcategoria']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $subcategoria['Subcategoria']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $subcategoria['Subcategoria']['id']), null, sprintf(__('Esta seguro que quiere eliminar la subcategoría %s?', true), $subcategoria['Subcategoria']['nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, %count% registros totales', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Categoría', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>