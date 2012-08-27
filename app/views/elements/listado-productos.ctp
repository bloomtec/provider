<ul class='productos'>
<?php foreach($productos as $producto):?>
	<li class='producto'>
		<img src="/img/<?php echo$producto['Producto']['image_path']?>" /> 
		<span><?php echo $producto['Producto']['nombre']?></span>
	</li>
<? endforeach; ?>
<div style='clear:both;'> </div>
</ul>
<div style='margin-top:1.5em;'>
	<p class='paginator'>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Página %page% de %pages%,  %count% registros totales', true)
		));
		?>
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
	 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	<div style='clear:both;'></div>
</div>
