<div class="banners view">
<h2><?php  __('Banner');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $banner['Banner']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $banner['Banner']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner', true), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Banner', true), array('action' => 'delete', $banner['Banner']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Imagenes', true), array('controller' => 'imagenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Imagen', true), array('controller' => 'imagenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Imagenes');?></h3>
	<?php if (!empty($banner['Imagene'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Model Class'); ?></th>
		<th><?php __('Foreign Key'); ?></th>
		<th><?php __('Path'); ?></th>
		<th><?php __('Posicion'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($banner['Imagene'] as $imagen):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $imagen['id'];?></td>
			<td><?php echo $imagen['model_class'];?></td>
			<td><?php echo $imagen['foreign_key'];?></td>
			<td><?php echo $imagen['path'];?></td>
			<td><?php echo $imagen['posicion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'imagenes', 'action' => 'view', $imagen['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'imagenes', 'action' => 'edit', $imagen['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'imagenes', 'action' => 'delete', $imagen['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $imagen['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Imagen', true), array('controller' => 'imagenes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
