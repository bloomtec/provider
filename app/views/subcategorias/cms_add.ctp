<div class="subcategorias form">
<?php echo $this->Form->create('Subcategoria');?>
	<fieldset>
 		<legend><?php __('Añadir Subcategoría'); ?></legend>
	<?php
		echo "<div class='product_form'>";
		echo $this->Form->input('linea_id',array('id'=>'linea'));
		echo $this->Form->input('categoria_id',array('id'=>'categoria'));
		echo $this->Form->input('nombre');
	//	echo $this->Form->input('image_path',array("options"=>$opcionesFotos,"class"=>"selectImagePath","fila"=>0));
		echo "</div>";
		
		echo '<div style="clear:none"> </div>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this -> element('cms-actions'); ?>