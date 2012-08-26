

<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Ver Productos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="productos form" id="crearProducto">
<?php echo $this->Form->create('Producto',array("id"=>"crearProducto"));?>
	<fieldset>
 		<legend><?php __('Añadir Producto'); ?></legend>
	<?php
	for($i=0;$i<1;$i++){
		echo "<div class='fila_product_add'>";
		echo "<div class='product_form' id='".$i."'>";
		echo $this->Form->input('id');
		echo $this->Form->input('linea_id',array("fila"=>$i,"modificar"=>true, 'id'=>'linea'));
		echo $this->Form->input('categoria_id',array("options"=>$categorias,"class"=>"selectCategoria","label"=>"Cátegoria","fila"=>$i,"modificar"=>true, 'id'=>'categoria'));
		echo $this->Form->input('subcategoria_id',array("class"=>"selectSubcategoria","label"=>"Subcátegoria","fila"=>$i,'id'=>'subcategoria','last-selected'=>$this->data['Producto']['subcategoria_id']));
		echo $this->Form->input('nombre',array("label"=>"nombre"));
		echo $this->Form->input('codigo',array("label"=>"código"));
		echo $this->Form->input('image_path',array("options"=>$opcionesFotos,"class"=>"selectImagePath","label"=>"Buscar Imagen","fila"=>$i));
		echo $this->Form->input('beneficios',array("label"=>"Beneficios","rows"=>"2"));
		echo $this->Form->input('acabados',array("rows"=>"2"));
		echo $this->Form->input('colores',array("rows"=>"2"));
		echo $this->Form->input('materiales',array("rows"=>"2"));
	//	echo $this->Form->input('dimensiones',array("rows"=>"2"));
		echo "</div>";
	   echo '<div class="product_image" id="'.$i.'"> </div>';
    echo '<div id="upload" path="productos"></div>';
    echo "</div>";
   
	}
	?>
	</fieldset>
<?php echo $this->Form->end("Guardar");?>
</div>