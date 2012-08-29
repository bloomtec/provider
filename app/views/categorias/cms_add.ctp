<div class="categorias form">
<?php echo $this->Form->create('Categoria');?>
	<fieldset>
 		<legend><?php __('Añadir Categoría'); ?></legend>
	<?php
		echo "<div class='product_form'>";
		echo $this->Form->input('linea_id');
		echo $this->Form->input('nombre');
		//echo $this->Form->input('image_path',array("options"=>$opcionesFotos,"class"=>"selectImagePath","fila"=>0));
		echo "</div>";
		//echo '<div class="product_image" id="0"> </div>';
		//echo '<div id="upload" path="categorias"></div>';
		//echo '<div style="clear:none"> </div>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this -> element('cms-actions'); ?>