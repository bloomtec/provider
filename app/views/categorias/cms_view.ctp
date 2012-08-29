<div class="categorias view">
<h2><?php  __('Categoria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoria['Categoria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoria['Categoria']['nombre']; ?>
			&nbsp;
		</dd>
		<!--
		<dt<?php //if ($i % 2 == 0) echo $class;?>><?php __('Imagen'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $this->Html->image($categoria['Categoria']['image_path']); ?>
			&nbsp;
		</dd>
	-->
	</dl>
</div>
<?php echo $this -> element('cms-actions'); ?>
<div class="related">
	<h3><?php __('Subcategorías Relacionadas');?></h3>
	<?php if (!empty($categoria['Subcategoria'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
	
		<th><?php __('Nombre'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Subcategoria'] as $subcategoria):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subcategoria['nombre'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'subcategorias', 'action' => 'view', $subcategoria['id'])); ?>
				<?php echo $this->Html->link(__('Modificar', true), array('controller' => 'subcategorias', 'action' => 'edit', $subcategoria['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'subcategorias', 'action' => 'delete', $subcategoria['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subcategoria['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
