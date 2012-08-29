<div class="categorias index">
	<h2><?php __('Categorías');?></h2>
	<table cellpadding="0" cellspacing="0" id="sortable">
	<tr class='ui-state-disabled'>	
			<th><?php echo $this->Paginator->sort('posicion');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<?php // <th>Imagen</th> ?>
			<th class="actions" style='text-align:center;'><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($categorias as $categoria):
		$class =  ' class="ui-state-default "';
		if ($i++ % 2 == 0) {
			$class = ' class="altrow ui-state-default"';
		}
	?>
	<tr<?php echo $class;?> id="<?php echo $categoria['Categoria']['id'];?>" > 
		<td><?php echo $categoria['Categoria']['posicion']; ?>&nbsp;</td>
		<td><?php echo $categoria['Categoria']['nombre']; ?>&nbsp;</td>
		<!--<td><?php //echo $this->Html->image($categoria['Categoria']['image_path'],array("width"=>"100")); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link("Ordenar Productos",array("action"=>"ordenar_productos",$categoria["Categoria"]["id"]));?>
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $categoria['Categoria']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $categoria['Categoria']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $categoria['Categoria']['id']), null, sprintf(__('Esta seguro que quiere borrar la categoría %s?', true), $categoria['Categoria']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%,  %count% registros totales', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crear Categoria', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Subcategorias', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Subcategoria', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>

	<script>
	var sendData=function(order){
		var data={};
		for(i=0;i<order.length;i+=1){
			data["data[Categoria]["+order[i]+"]"]=(i+1);
		}
		$.post("/cms/categorias/reOrder",
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