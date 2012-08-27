<div class="subcategorias form">
<?php echo $this->Form->create('Subcategoria');?>
	<fieldset>
 		<legend><?php __('Modificar Subcategoria'); ?></legend>
	<?php
		echo "<div class='product_form'>";
		echo $this->Form->input('id');
		echo $this->Form->input('linea_id',array('id'=>'linea','value'=>$this -> data['Categoria']['linea_id']));
		echo $this->Form->input('categoria_id',array('id'=>'categoria','last-selected'=>$this -> data['Subcategoria']['categoria_id']));
		echo $this->Form->input('nombre');
		//echo $this->Form->input('image_path',array("options"=>$opcionesFotos,"class"=>"selectImagePath","fila"=>0));
		echo "</div>";
		//echo '<div class="product_image" id="0"> </div>';
		//echo '<div id="upload" path="subcategorias"></div>';
		//echo '<div style="clear:none"> </div>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $this->Form->value('Subcategoria.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subcategoria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
	</ul>
</div>