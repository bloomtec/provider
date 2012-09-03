<?php
	$fotos = array();
	if(isset($controller_banner) && !empty($controller_banner) && !(isset($categoria_banner) || isset($subcategoria_banner))) {
		$fotos = $this -> requestAction('/' . $controller_banner . '/getBannerImages/' . $this -> params['pass'][0]);
	} elseif(isset($categoria_banner) || isset($subcategoria_banner)) {
		if(isset($subcategoria_banner) && !empty($subcategoria_banner)) {
			$fotos = $this -> requestAction('/subcategorias/getBannerImages/' . $subcategoria_banner);
		} elseif(isset($categoria) && !empty($categoria)) {
			$fotos = $this -> requestAction('/categorias/getBannerImages/' . $categoria_banner);
		}		
	} elseif(isset($page_banner) && !empty($page_banner)) {
		$fotos = $this -> requestAction('/banners/get/' . $page_banner);
	}
?>
<?php if(!empty($fotos)) : ?>
<?php
	echo $this -> Html -> css('estilos.css');
	//echo $this -> Html -> script("jquery.min.js");
	echo $this -> Html -> script("jquery.cycle.all.js");
	echo $this -> Html -> script("ready.js");
?>
<div id="banner">
	<div id="contenedor">
		<div id="cycle">
			<?php			
			foreach ($fotos as $key => $foto) {
				echo '<img src="/img/uploads/' . $foto['path'] . ' " width="850" height="378">';
			}			
			?>
		</div>
		<div id="overlay">
			<div class="button" id="banner-prev"><img src="/img/banners/prev.png" width="43" height="92" alt="Anterior">
			</div>
			<div class="button" id="banner-next"><img src="/img/banners/next.png" width="43" height="92" alt="Siguiente">
			</div>
			<div id="banner-nav"></div>
		</div>
	</div>
</div>
<?php endif; ?>