<div class="productos index">
	<h2><?php __('Productos');?></h2>
	<div class='filtros'>
		<?php echo $form -> input ('linea',array('options'=>$lineas,'id'=>'linea' , 'rel' => 'linea', 'empty'=>'seleccione','selected'=>$linea));?>
		<?php echo $form -> input ('categoria',array('options'=>array(),'id'=>'categoria','class'=>'empty', 'rel'=>'categoria','last-selected'=>$categoria));?>
		<?php echo $form -> input ('subcategoria',array('options'=>array(),'id'=>'subcategoria','class' => 'empty', 'rel' => 'subcategoria','last-selected'=>$subcategoria));?>
		<?php echo $form -> button('filtrar',array('id'=>'filtrar'));?>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Categoria -> Cubcategoria</th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort("Código",'codigo');?></th>
			<th><?php echo $this->Paginator->sort('image_path');?></th>
			<th><?php echo $this->Paginator->sort('beneficios');?></th>
			<th><?php echo $this->Paginator->sort('acabados');?></th>
			<th><?php echo $this->Paginator->sort('colores');?></th>
			<th><?php echo $this->Paginator->sort('materiales');?></th>
			<th class="actions"><?php __('Acciones');?></th>
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

		<td>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id']))." -> ".$this->Html->link($producto['Subcategoria']['nombre'], array('controller' => 'subcategorias', 'action' => 'view', $producto['Subcategoria']['id'])); ?>
		</td>
		<td><?php echo $producto['Producto']['nombre']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['codigo']; ?>&nbsp;</td>
		<td><?php if($producto['Producto']['image_path']) echo $this->Html->image($producto['Producto']['image_path'],array("width"=>100)); ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['beneficios']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['acabados']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['colores']; ?>&nbsp;</td>
		<td><?php echo $producto['Producto']['materiales']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $producto['Producto']['id']), null, sprintf(__('Esta seguro que quiere borrar el producto %s?', true), $producto['Producto']['nombre'])); ?>
		</td>
	</tr>
	
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%,  %count% registros totales', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this -> element('cms-actions'); ?>