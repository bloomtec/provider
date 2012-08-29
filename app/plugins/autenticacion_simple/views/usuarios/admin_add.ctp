<div class="archivos form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
 		<legend><?php __('Crear Usuario'); ?></legend>
	<?php
		
		echo $this->Form->input('nombre_de_usuario');
		echo $this->Form->input('password');
		echo $this->Form->input('password_',array("type"=>"password","label"=>"Confirmar Password"));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Usuarios', true), array('action' => 'index'));?></li>
		
	</ul>
</div>