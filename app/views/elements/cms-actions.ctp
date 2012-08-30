<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ver Lineas', true), array('controller' => 'lineas', 'action' => 'index', 'plugin' => false)); ?></li>
		<li><?php echo $this->Html->link(__('Crear Linea', true), array('controller' => 'lineas', 'action' => 'add', 'plugin' => false)); ?></li>
		<li><?php echo $this->Html->link(__('Ver Productos', true), array('controller' => 'productos', 'action' => 'index', 'plugin' => false)); ?></li>
		<li><?php echo $this->Html->link(__('Crear Producto', true), array('controller' => 'productos', 'action' => 'add', 'plugin' => false)); ?></li>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categorias', 'action' => 'index', 'plugin' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Categoría', true), array('controller' => 'categorias', 'action' => 'add', 'plugin' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Subcategorías', true), array('controller' => 'subcategorias', 'action' => 'index', 'plugin' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Subcategoría', true), array('controller' => 'subcategorias', 'action' => 'add', 'plugin' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Banners', true), array('controller' => 'banners	', 'action' => 'index', 'plugin' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('Cambiar Contraseña', true), array('controller'=>'usuarios','action' => 'edit','plugin'=>'autenticacion_simple','cms'=>true)); ?></li>
	</ul>
</div>