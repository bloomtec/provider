<div class="lineas form">
<?php echo $this->Form->create('Linea');?>
	<fieldset>
 		<legend><?php __('Add Linea'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('posicion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php echo $this -> element('cms-actions'); ?>