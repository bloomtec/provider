<div id="contenido_linea">
	<?php echo $linea['Linea']['nombre'];?> 
	<?php if(isset($categoria)) echo " -> ".$categoria['Categoria']['nombre']; ?>
	<?php if(isset($subcategoria) && $subcategoria['Subcategoria']['nombre']!="ninguna") echo " -> ".$subcategoria['Subcategoria']['nombre']; ?>
	<?php if(isset($producto)) echo " -> ".$producto['Producto']['nombre']; ?>
</div>