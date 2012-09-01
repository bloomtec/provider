<div class="lineas form">
<?php echo $this->Form->create('Linea');?>
	<fieldset>
 		<legend><?php __('Crear Linea'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('color');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<?php echo $this -> element('cms-actions'); ?>