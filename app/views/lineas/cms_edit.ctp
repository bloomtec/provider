<div class="lineas form">
<?php echo $this->Form->create('Linea');?>
	<fieldset>
 		<legend><?php __('Edit Linea'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('posicion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Linea.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Linea.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lineas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>