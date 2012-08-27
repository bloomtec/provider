<div class="archivos form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
 		<legend><?php __('Acmbiar Contraseña'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre_de_usuario',array("disabled"=>true));
		echo $this->Form->input('password_actual',array("type"=>"password"));
		echo $this->Form->input('password');
		echo $this->Form->input('password_',array("type"=>"password","label"=>"Confirmar Password"));

	?>
	</fieldset>
<?php echo $this->Form->end(__('guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Volver', true), "/");?></li>
		
	</ul>
</div>