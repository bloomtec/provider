<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="scripts/js/jquery.min.js"></script>
<script src="scripts/js/jquery.cycle.all.js"></script>
<script src="scripts/js/ready.js"></script>
<title>Untitled Document</title>
<link href="estilos/estilos.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="contenedor">
  <div id="cycle">
    <?php
		$folderNum = $_GET["folder"];
		$folder = opendir("./img/" . $folderNum); 
		$pic_types = array("jpg", "jpeg", "gif", "png");
		$fotos = array();
		while ($file = readdir ($folder)) {
			if(in_array(substr(strtolower($file), strrpos($file,".") + 1),$pic_types)) {
				array_push($fotos,$file);
			}
		}
		closedir($folder);
		for ($i = 0; $i < count($fotos); $i++) {
			echo ('<img src="img/');
			echo ($folderNum);
			echo ('/');
			echo ($fotos [$i]);
			echo ('" width="850" height="378">');
		}
	?>
  </div>
  <div id="overlay">
    <div class="button" id="prev"><img src="img/common/prev.png" width="43" height="92" alt="Anterior"></div>
    <div class="button" id="next"><img src="img/common/next.png" width="43" height="92" alt="Siguiente"></div>
    <div id="nav"> </div>
  </div>
</div>
</body>
</html>
