<div class="archivos index">
	<div class="nuevosArchivos" style="display:none;">
		<h2><?php __('Nuevos Archivos');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
	
			
				<th>Nombre</th>
					<th>Extensión</th>
				<th>Descripción</th>
				<th>Publico</th>
	
		</table>
	</div>
	<h2><?php __('Archivos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>

			
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort("Extensión",'extension_id');?></th>
			<th><?php echo $this->Paginator->sort("Descripción",'descripcion');?></th>
			<th><?php echo $this->Paginator->sort('publico');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($archivos as $archivo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?> id="<?php echo $archivo['Archivo']['id'];?>">
		<td><div class="hide"><?php echo $archivo['Archivo']['nombre']; ?></div>&nbsp;<?php echo $this->Form->input("name",array("name"=>"data[Archivo][nombre]","class"=>"campo","label"=>false,"value"=>$archivo['Archivo']['nombre'],"div"=>"ajax_input","campo"=>"nombre"));?><div class="ajax_input boton actualizarCampo">guardar</div</td>
			
		<td>
			<?php echo $this->Html->link($archivo['Extension']['nombre'], array('controller' => 'extensiones', 'action' => 'view', $archivo['Extension']['id'])); ?>
		</td>
		<td><div class="hide"><?php echo $archivo['Archivo']['descripcion']; ?></div><?php echo $this->Form->input("descripcion",array("type"=>"textarea","name"=>"data[Archivo][descripcion]","class"=>"campo","label"=>false,"value"=>$archivo['Archivo']['descripcion'],"div"=>"ajax_input","campo"=>"descripcion"));?> <div class="ajax_input boton actualizarCampo">guardar</div></td>
		<td><?php echo $archivo['Archivo']['publico']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $archivo['Archivo']['id'])); ?>
			<?php //echo $this->Html->link(__('Editar', true), array('action' => 'edit', $archivo['Archivo']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $archivo['Archivo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['Archivo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de  %count% totales, comenzando en el registro %start%, terminando en el registro %end%', true)
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
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><div id="upload"></div></li>
		<li><?php echo $this->Html->link(__('Nuevo Archivo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Extensiones', true), array('controller' => 'extensiones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Extension', true), array('controller' => 'extensiones', 'action' => 'add')); ?> </li>
	</ul>
</div>