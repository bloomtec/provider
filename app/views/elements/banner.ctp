<div id="banner">
	<div id="contenedor">
		<div id="cycle">
			<?php

			echo $this -> Html -> css('estilos.css');

			echo $this -> Html -> script("jquery-1.4.2.min.js");
			echo $this -> Html -> script("jquery.cycle.all.js");
			echo $this -> Html -> script("ready.js");

			$fotos = $this -> requestAction('/banners/get/' . $page);
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