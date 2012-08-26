<div class="productos index">
	<h2><?php echo "Productos en la Categoría: ".$categoria["Categoria"]["nombre"];?></h2>
	<table cellpadding="0" cellspacing="0" id="sortable">
	<tr class='ui-state-disabled'>	
			<th>Posición</th>
			<th>Nombre</th>
			<th>Imagen</th>
	</tr>
	<?php
	$i = 0;
	foreach ($categoria["Producto"] as $producto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?> id="<?php echo $producto['id'];?>" > 
		<td><?php echo $producto['orden_en_categoria']; ?>&nbsp;</td>
		<td><?php echo $producto['nombre']; ?>&nbsp;</td>
		<td><?php echo $html->image($producto['image_path'],array("height"=>60)); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<script>
	var sendData=function(order){
		var data={};
		for(i=0;i<order.length;i+=1){
			data["data[Producto]["+order[i]+"]"]=(i+1);
		}
		$.post("/cms/productos/reOrderEnCategoria",
				data,
				function(response){
					if(response=="yes"){
						for(i=0;i<order.length;i+=1){
							$("tr#"+order[i]).children(":first-child").text(i+1);
						}
					}
				}
		);
		
		}
	$(function() {
			$( "#sortable tbody" ).sortable({
			revert: true,
			items:"tr:not(.ui-state-disabled)",
			update:function(event, ui){
		
			sendData($(this).sortable("toArray"));
			
			
			}
				
		});

		$( "#sortable tbody > tr" ).disableSelection();

	});
	</script>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
	</ul>
</div>