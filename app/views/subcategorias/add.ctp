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
<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Categoría', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>