<div class="productos index">
	<h2><?php __('Productos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('subcategoria_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('image_path');?></th>
			<th><?php echo $this->Paginator->sort('informacion_de_producto');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productos as $producto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $producto['Producto']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($producto['Subcategoria']['id'], array('controller' => 'subcategorias', 'action' => 'view', $producto['Subcategoria']['id'])); ?>
		</td>
		<td><?php echo $producto['Producto']['nombre']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['image_path']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['informacion_de_producto']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $producto['Producto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['Producto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Producto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Subcategorias', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategoria', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>