<?php

	$fotos = array();
	if(isset($controller) && !empty($controller)) {
		$fotos = $this -> requestAction('/' . $controller . '/getBannerImages/' . $this -> params['pass'][0]);
	} elseif(isset($page) && !empty($page)) {
		$fotos = $this -> requestAction('/banners/get/' . $page);
	}
?>
<?php if(!empty($fotos)) : ?>
<?php
	echo $this -> Html -> css('estilos.css');
	echo $this -> Html -> script("jquery.min.js");
	echo $this -> Html -> script("jquery.cycle.all.js");
	echo $this -> Html -> script("ready.js");
?>
<div id="banner">
	<div id="contenedor">
		<div id="cycle">
			<?php			
			foreach ($fotos as $key => $foto) {
				echo '<img src="img/uploads/' . $foto['path'] . ' " width="850" height="378">';
			}			
			?>
		</div>
		<div id="overlay">
			<div class="button" id="banner-prev"><img src="img/banners/prev.png" width="43" height="92" alt="Anterior">
			</div>
			<div class="button" id="banner-next"><img src="img/banners/next.png" width="43" height="92" alt="Siguiente">
			</div>
			<div id="banner-nav"></div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php //debug($controller); ?>
<?php //debug($fotos); ?>