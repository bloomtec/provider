<div class="banners form">
<form id="ImageneCmsAddForm" method="post" action="/cms/imagenes/add/<?php echo $this -> params['pass'][0] . '/' . $this -> params['pass'][1]; ?>" accept-charset="utf-8">
	<fieldset>
 		<legend><?php __('Agregar imagen'); ?></legend>
 		<div class="images">
			<h2>Imagen</h2>
			<div id="ImagePreviewContainer" class="preview"><!--<img id="ImagePreview" src="/img/uploads/215x215/<?php echo $this -> request -> data['Brand']['image']; ?>" />--></div>
			<div id="single-image-upload" controller="<?php echo $controller; ?>"></div>
		</div>
		<input type="hidden" name="data[Imagene][model_class]" value="<?php echo $this -> params['pass'][0]; ?>">
		<input type="hidden" name="data[Imagene][foreign_key]" value="<?php echo $this -> params['pass'][1]; ?>">
		<input type="hidden" name="data[Imagene][path]" id="single-field">
	</fieldset>
	<div class="submit"><input type="submit" value="Enviar"></div>
</form>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Volver', true), array('controller' => $controller, 'action' => 'edit', $this -> params['pass'][1]));?></li>
	</ul>
</div>