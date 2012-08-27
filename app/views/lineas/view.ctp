<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Description" content="Fabricación y venta de mobiliario escolar y de oficina, sillas estudiantiles, divisiones de oficina, sistemas de archivo, sistemas de oficina abierta, divisiones modulares-RTA.">

<meta name="Keywords" content="sillas universitarias, sillas escolares, sillas profesor, venta de sillas, diseño de sillas, diseño de muebles, mobiliario escolar, mobiliario de oficina, archivadores, sistemas de almacenamiento, divisiones modulares, divisiones RTA, rta, divisiones, sistemas de oficina abierta, sillas interlocutoras, provider palmira, provider cali, Provider, fabricante de sillas, fabricante de mobiliario, fabricante de mobiliario escolar, fabricante de divisiones de oficina, fabricante, fabricante de sistemas de almacenamiento, fabricante de sillas escolares, fabricante de oficina abierta, fabricante de mobiliario, sillas de diseño, espacios comunes, fabricante de espacios comunes, sillas giratorias, fabricante de sillas giratorias, venta de sillas giratorias, sillas interlocutoras, fabricación de sillas interlocutoras, venta de sillas interlocutoras, crea tu espacio" >

<title>Provider y Cia Ltda.</title>

<link href="/favicon.ico" type="image/x-icon" rel="icon" />


<link rel="stylesheet" href="/css/stylesheet.css" type="text/css"/>
<style type="text/css">
a:link {
	color: #333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #000;
}
a:active {
	text-decoration: none;
}
</style>
<script src="/js/stuHover.js" type="text/javascript"></script>

</head>
<body>
	<div id="conteiner" style="height:894px">
		<div id="content">
			<?php echo $this -> element("header"); ?>

			<?php echo $this -> element('banner');?>

			<div id="banner_underline"> </div>

			<?php echo $this -> element("redes_sociales"); ?>

			<div id="contenido" style="min-height:372px;">

				<div id="contenido_linea"> <?php echo $linea['Linea']['nombre'];?> </div>

				<div id="contenido_sublinea"> </div>

				<ul id="contenido_categoria"> 
					<?php foreach($linea['Categoria'] as $categoria):?>
						<li class='categoria'>
							<a  href="/linea/<?php echo $linea['Linea']['id'] ?>/categoria:<?php echo $categoria['id']?>">
								● <?php echo $categoria['nombre']?>
							</a> 
							<div class="subcategorias">
								<?php foreach($categoria['Subcategoria'] as $subcategoria):?>
								<a href="/linea/<?php echo $linea['Linea']['id'] ?>/categoria:<?php echo $categoria['id']?>/subcategoria:<?php echo $subcategoria['id']?>">	●<?php echo $subcategoria['nombre']?> </a>
							<?php endforeach;?>
							</div>
						</li>
					<?php endforeach;?>
					
					
				</ul>

				<?php echo $this -> element('listado-productos');?>
			</div>
		</div>
		<div style='clear:both;'></div>
		<?php echo $this -> element("footer"); ?>

	</div>
</body>
</html>