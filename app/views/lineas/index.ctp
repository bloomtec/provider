<div class="lineas index">
	<h2><?php __('Lineas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('posicion');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($lineas as $linea):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $linea['Linea']['nombre']; ?>&nbsp;</td>
		<td><?php echo $linea['Linea']['posicion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $linea['Linea']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $linea['Linea']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $linea['Linea']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $linea['Linea']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count% totales', true)
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
		<li><?php echo $this->Html->link(__('Cambiar Contraseña', true), array('controller'=>'usuarios','action' => 'edit','plugin'=>'autenticacion_simple','admin'=>true)); ?></li>
		<li><?php echo $this->Html->link(__('Crear Productos', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Categorías', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>