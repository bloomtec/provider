<div class="categorias form">
<?php echo $this -> Form -> create('Categoria'); ?>
	<fieldset>
 		<legend><?php __('Modificar Categoría'); ?></legend>
		<?php
		echo "<div class='product_form'>";
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('linea_id');
		echo $this -> Form -> input('nombre');
		//echo $this->Form->input('image_path',array("options"=>$opcionesFotos,"class"=>"selectImagePath","fila"=>0,"modificar"=>true));
		echo "</div>";
		//echo '<div class="product_image" id="0"> </div>';
		//echo '<div id="upload" path="categorias"></div>';
		//echo '<div style="clear:none"> </div>';
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
	</fieldset>
<?php echo $this -> Form -> end(__('Guardar', true)); ?>
</div>
<div class="actions">
	<h3><?php __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Ver Categorías', true), array('action' => 'index')); ?></li>
		<li><?php echo $this -> Html -> link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('Agregar Imagen', true), array('controller' => 'imagenes', 'action' => 'add', 'Categoria', $this -> data['Categoria']['id'])); ?> </li>
	</ul>
</div>