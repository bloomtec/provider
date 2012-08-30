<div class="lineas index">
	<h2><?php __('Lineas');?></h2>
	<table cellpadding="0" cellspacing="0" id="sortable">
	<tr class='ui-state-disabled'>	
			<th><?php echo $this->Paginator->sort('Posición', 'posicion');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($lineas as $linea):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?> id="<?php echo $linea['Linea']['id'];?>" >
		<td><?php echo $linea['Linea']['posicion']; ?>&nbsp;</td>
		<td><?php echo $linea['Linea']['nombre']; ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $linea['Linea']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $linea['Linea']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $linea['Linea']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $linea['Linea']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count% totales', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this -> element('cms-actions'); ?>
<script>
	var sendData=function(order){
		var data={};
		for(i=0;i<order.length;i+=1){
			data["data[Linea]["+order[i]+"]"]=(i+1);
		}
		$.post("/cms/lineas/reOrder",
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