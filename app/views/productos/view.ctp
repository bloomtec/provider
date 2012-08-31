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
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.tools.min.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(function() {
			  // initialize scrollable
			  $(".scrollable").scrollable();
			});
		</script>
</head>
<body id="producto">
	<div id="conteiner" style="height:894px">
		<div id="content">
			<?php echo $this -> element("header"); ?>

			<?php echo $this -> element('banner', array('controller_banner' => 'productos')); ?>

			<div id="banner_underline"> </div>

			<?php echo $this -> element("redes_sociales"); ?>

			<div id="contenido" style="min-height:372px;">

				<div id="contenido_linea">
				 <?php echo $linea['Linea']['nombre'];?> 
				  <?php if(isset($categoria)) echo " -> ".$categoria['Categoria']['nombre']; ?>
				  <?php if(isset($subcategoria)) echo " -> ".$subcategoria['Subcategoria']['nombre']; ?>
				  <?php echo " -> ".$producto['Producto']['nombre']; ?>
				</div>

				<div id="contenido_sublinea"> </div>

				<div class="contenedor-categorias" style="border: #666 1px solid;">
						<a  class="prev browse left" alt="anterior"></a>
						<div  id="contenido_categoria" class="scrollable">
						<ul  class="items" >						
							<?php foreach($linea['Categoria'] as $cate):?>
							<li class='categoria' rel="<?php echo $cate['id']?>">
								<a  href="/linea/<?php echo $linea['Linea']['id'] ?>/categoria:<?php echo $cate['id']?>"> ● <?php echo $cate['nombre']?> </a>
								<div class="subcategorias" rel='<?php echo  $cate['id'] ?>'>
									<?php foreach($cate['Subcategoria'] as $subcate):
									?>
									<?php if($subcate['nombre'] != 'ninguna'):
									?>
									<a rel='<?php echo  $subcate['id'] ?>' href="/linea/<?php echo $linea['Linea']['id'] ?>/categoria:<?php echo $cate['id']?>/subcategoria:<?php echo $subcate['id']?>">	●<?php echo $subcate['nombre']?>
									</a>
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</li>
							<?php endforeach; ?>

						</ul>
						</div>
						<a  class="next browse right" alt="siguiente"></a>
						<div style="clear:both;"></div>
					</div>
				<div id="subcategorias">
				</div>

				<?php echo $this -> element('listado-productos');?>
				<div class="view-producto">
					<img src="/img/<?php echo $producto['Producto']['image_path']?>" /> </a>
					<h1> <?php echo $producto['Producto']['nombre']; ?> </h1>
					
					<h2> Beneficios </h2>
					<p>
						<?php echo $producto['Producto']['beneficios']; ?> 
					</p>
					<h2> Acabados </h2>
					<p>
						<?php echo $producto['Producto']['acabados']; ?> 
					</p>
					<h2> Colores </h2>
					<p>
						<?php echo $producto['Producto']['colores']; ?> 
					</p>
					<h2> Materiales </h2>
					<p>
						<?php echo $producto['Producto']['materiales']; ?> 
					</p>

				</div>
				<div style="clear:both;"></div>
		
			</div>
		</div>
		<div style='clear:both;'></div>
		<?php echo $this -> element("footer"); ?>

	</div>
	<script type='text/javascript'>
		$(function(){
			var categoria="<?php if(isset($categoria)) echo $categoria['Categoria']['id'] ?>";
			var subcategoria="<?php if(isset($subcategoria)) echo $subcategoria['Subcategoria']['id'] ?>";
			if(categoria){				
				$("#subcategorias").html($('div.subcategorias[rel="'+categoria+'"]').clone());
				$('li.categoria[rel="'+categoria+'"] > a').addClass('current');
			}
			if(subcategoria){				
				$('div.subcategorias[rel="'+categoria+'"]  a[rel="'+subcategoria+'"]').addClass('current');
			}
			var lastSubcategorias=$("#subcategorias").html();
			$('li.categoria').hover(
				function(){
					$('li.categoria a').removeClass('over');
					$(this).find('a').addClass('over');
					$("#subcategorias").html($(this).find('.subcategorias').clone());
				},
				function(){

			});

		});
	</script>
</body>
</html>