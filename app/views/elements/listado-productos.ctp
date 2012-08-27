<ul class='productos'>
<?php foreach($productos as $producto):?>
	<li class='producto'>
		<img src="/img/<?php echo$producto['Producto']['image_path']?>" /> 
		<span><?php echo $producto['Producto']['nombre']?></span>
	</li>
<? endforeach; ?>
<div style='clear:both;'> </div>
</ul>