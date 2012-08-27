<ul class='productos'>
<?php foreach($productos as $product):?>
	<li class='producto'>

		<a href="/productos/view/<?php echo $product['Producto']['id']?>"><img src="/img/<?php echo $product['Producto']['image_path']?>" /> </a>
		<a href="/productos/view/<?php echo $product['Producto']['id']?>" class='name'><?php echo $product['Producto']['nombre']?></a>
	</li>
<? endforeach; ?>
<div style='clear:both;'> </div>
</ul>

