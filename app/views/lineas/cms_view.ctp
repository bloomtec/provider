<div class="lineas view">
	<h2><?php echo $linea['Linea']['nombre'];?></h2>
	
	<div class="related">
		<h3><?php __('Categorias:');?></h3>
		<?php if (!empty($linea['Categoria'])):
		?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php __('Id');?></th>
				<th><?php __('Linea Id');?></th>
				<th><?php __('Posicion');?></th>
				<th><?php __('Nombre');?></th>
				<th><?php __('Image Path');?></th>
				<th class="actions"><?php __('Actions');?></th>
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
				<td><?php echo $categoria['linea_id'];?></td>
				<td><?php echo $categoria['posicion'];?></td>
				<td><?php echo $categoria['nombre'];?></td>
				<td><?php echo $categoria['image_path'];?></td>
				<td class="actions"><?php echo $this -> Html -> link(__('View', true), array('controller' => 'categorias', 'action' => 'view', $categoria['id']));?>
				<?php echo $this -> Html -> link(__('Edit', true), array('controller' => 'categorias', 'action' => 'edit', $categoria['id']));?>
				<?php echo $this -> Html -> link(__('Delete', true), array('controller' => 'categorias', 'action' => 'delete', $categoria['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoria['id']));?></td>
				</tr> <?php endforeach;?>
		</table>
		<?php endif;?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions');?></h3>
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Cambiar Contraseña', true), array('controller' => 'usuarios', 'action' => 'edit', 'plugin' => 'autenticacion_simple', 'admin' => true));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Crear Productos', true), array('action' => 'add'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Crear Categorías', true), array('controller' => 'categorias', 'action' => 'add'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add'));?>
		</li>
	</ul>
</div>
