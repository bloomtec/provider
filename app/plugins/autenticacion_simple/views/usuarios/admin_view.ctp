<div class="archivos view">
<h2><?php  __('Archivo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Extension'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['Extension']['nombre'], array('controller' => 'extensiones', 'action' => 'view', $archivo['Extension']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['publico']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archivo', true), array('action' => 'edit', $archivo['Archivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Archivo', true), array('action' => 'delete', $archivo['Archivo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['Archivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Extensiones', true), array('controller' => 'extensiones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Extension', true), array('controller' => 'extensiones', 'action' => 'add')); ?> </li>
	</ul>
</div>
