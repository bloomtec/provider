<div class="lineas form">
<?php echo $this -> Form -> create('Linea'); ?>
	<fieldset>
 		<legend><?php __('Modificar Linea ' . $this -> data['Linea']['nombre']); ?></legend>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('nombre');
		echo $this->Form->input('color');
		?>
		<?php if(empty($this -> data['Imagene'])) : ?>
		<h3>Actualmente no hay imagenes para este banner.</h3>
		<?php endif; ?>
		<?php if(!empty($this -> data['Imagene'])) : ?>
		<div class="related">
			<h3>Imagenes Relacionadas</h3>
			<table id="sortable" cellpadding="0" cellspacing="0" controller="imagenes">
				<tbody>
					<tr class="ui-state-disabled">
						<th><?php echo __('Posición'); ?></th>
						<th><?php echo __('Imagen'); ?></th>
						<th class="actions"><?php echo __('Acciones'); ?></th>
					</tr>
					<?php $i = 0; foreach ($this -> data['Imagene'] as $imagen):	?>
					<tr id="<?php echo $imagen['id']?>" class="ui-state-default">
						<td class="position"><?php echo $imagen['posicion']; ?></td>
						<td><?php echo $this -> Html -> image('uploads/100x100/' . $imagen['path']); ?></td>
						<td class="actions">
							<?php echo $this -> Html -> link(__('Eliminar', true), array('controller' => 'imagenes', 'action' => 'delete', $imagen['id']), null, sprintf(__('¿Seguro desea eliminar %s?', true), $imagen['path'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo $this -> Html -> script('jquery-ui-1.8.6.custom.min.js'); ?>
			<script type="text/javascript">
				$(function() {// Order and reorder
					var sendData = function(order, controller) {
						var data = {};
						for( i = 0; i < order.length; i += 1) {
							data["data[Imagene][" + order[i] + "]"] = (i + 1);
						}
						$.post("/" + controller + "/ordenar", data, function(response) {
							if(response == "yes") {
								for( i = 0; i < order.length; i += 1) {
									$("tr#" + order[i]).children(".position").text(i + 1);
								}
							}
						});
					}
					$("#sortable tbody").sortable({
						revert : true,
						items : "tr:not(.ui-state-disabled)",
						update : function(event, ui) {
							sendData($(this).sortable("toArray"), $("table").attr("controller"));
						}
					});
			
					$("#sortable tbody > tr").disableSelection();
				}); 
			</script>
		</div>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this -> Html -> link(__('Agregar Imagen Al Banner', true), array('controller' => 'imagenes', 'action' => 'add', 'Linea', $this -> data['Linea']['id']), array('style' => 'text-align:center; width: 200px;')); ?></li>
			</ul>
		</div>
	</fieldset>
<?php echo $this -> Form -> end(__('Enviar', true)); ?>
</div>
<?php echo $this -> element('cms-actions'); ?>