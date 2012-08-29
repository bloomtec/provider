<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<!--<li><?php echo $this->Html->link(__('Cambiar Contraseña', true), array('controller'=>'usuarios','action' => 'edit','plugin'=>'autenticacion_simple','admin'=>true)); ?></li>-->
		<li><?php echo $this->Html->link(__('Ver Productos', true), array('controller' => 'productos', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Crear Producto', true), array('controller' => 'productos', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Categoría', true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add')); ?> </li>
	</ul>
</div>