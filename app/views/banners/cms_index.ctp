<div class="banners index">
	<h2><?php __('Banners'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
			<th class="actions"><?php __('Actions'); ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($banners as $banner):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class; ?>>
		<td><?php echo $banner['Banner']['nombre']; ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this -> Html -> link(__('View', true), array('action' => 'view', $banner['Banner']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar', true), array('action' => 'edit', $banner['Banner']['id'])); ?>
			<?php //echo $this -> Html -> link(__('Delete', true), array('action' => 'delete', $banner['Banner']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $banner['Banner']['id'])); ?>
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