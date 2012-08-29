<div class="archivos form">
<?php echo $this->Form->create('Archivo');?>
	<fieldset>
 		<legend><?php __('Edit Archivo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('extension_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('publico');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Archivo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Archivo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Extensiones', true), array('controller' => 'extensiones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Extension', true), array('controller' => 'extensiones', 'action' => 'add')); ?> </li>
	</ul>
</div>