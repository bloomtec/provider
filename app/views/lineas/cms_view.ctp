<div class="lineas view">
	<h2><?php echo $linea['Linea']['nombre'];?></h2>
	
	<div class="related">
		<h3><?php __('Categorías:');?></h3>
		<?php if (!empty($linea['Categoria'])):
		?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php __('Id');?></th>
				
				<th><?php __('Posición');?></th>
				<th><?php __('Nombre');?></th>
				<!--<th><?php // __('Image Path');?></th> -->
				<th class="actions"><?php __('Acciones');?></th>
			</tr>
			<?php
$i = 0;
foreach ($linea['Categoria'] as $categoria):
$class = null;
if ($i++ % 2 == 0) {
$class = ' class="altrow"';
}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $categoria['id'];?></td>
				<td><?php echo $categoria['posicion'];?></td>
				<td><?php echo $categoria['nombre'];?></td>
				<!--<td><?php //echo $categoria['image_path'];?></td>-->
				<td class="actions"><?php echo $this -> Html -> link(__('View', true), array('controller' => 'categorias', 'action' => 'view', $categoria['id']));?>
				<?php echo $this -> Html -> link(__('Modificar', true), array('controller' => 'categorias', 'action' => 'edit', $categoria['id']));?>
				<?php echo $this -> Html -> link(__('Borrar', true), array('controller' => 'categorias', 'action' => 'delete', $categoria['id']), null, sprintf(__('Está seguro?', true), $categoria['id']));?></td>
				</tr> <?php endforeach;?>
		</table>
		<?php endif;?>
	</div>
</div>
<?php echo $this -> element('cms-actions'); ?>
