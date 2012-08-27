<div id="banner">
	<div id="contenedor">
		<div id="cycle">
			<?php
			for ($i = 0; $i < count($fotos); $i++) {
				echo('<img src="img/');
				echo($folderNum);
				echo('/');
				echo($fotos[$i]);
				echo('" width="850" height="378">');
			}
			?>
		</div>
		<div id="overlay">
			<div class="button" id="prev"><img src="img/common/prev.png" width="43" height="92" alt="Anterior">
			</div>
			<div class="button" id="next"><img src="img/common/next.png" width="43" height="92" alt="Siguiente">
			</div>
			<div id="nav"></div>
		</div>
	</div>
</div>