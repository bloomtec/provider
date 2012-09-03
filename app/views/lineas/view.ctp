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
	<body id="linea">
		<div id="conteiner" style="height:894px">
			<div id="content">
				<?php echo $this -> element("header"); ?>

				<?php
					if(isset($this -> params['named']) && !empty($this -> params['named'])) {
						if(key_exists('subcategoria', $this -> params['named'])) {
							echo $this -> element('banner', array('controller_banner' => 'lineas', 'subcategoria_banner' => $this -> params['named']['subcategoria']));
						} elseif(key_exists('categoria', $this -> params['named'])) {
							echo $this -> element('banner', array('controller_banner' => 'lineas', 'categoria_banner' => $this -> params['named']['categoria']));
						}
					} else {
						echo $this -> element('banner', array('controller_banner' => 'lineas'));
					}
				?>

				<div id="banner_underline"></div>

				<?php echo $this -> element("redes_sociales"); ?>

				<div id="contenido" style="min-height:372px;">

					<div id="contenido_linea">

						<?php echo $linea['Linea']['nombre']; ?>
						<?php if(isset($categoria)) echo " -> ".$categoria['Categoria']['nombre'] ?>
						<?php if(isset($subcategoria)) echo " -> ".$subcategoria['Subcategoria']['nombre'] ?>
					</div>

					<div id="contenido_sublinea" style="background:<?php echo $linea['Linea']['color']; ?>"></div>
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
					<div id="subcategorias"></div>

					<?php echo $this -> element('listado-productos'); ?>
					<!--<div style='margin-top:1.5em;'>
						<p class='paginator'>
							<?php
							echo $this -> Paginator -> counter(array('format' => __('Página %page% de %pages%,  %count% registros totales', true)));
							?>
						</p>

						<div class="paging">
							<?php echo $this -> Paginator -> prev('<< ' . __('anterior', true), array(), null, array('class' => 'disabled')); ?>
							| 	<?php echo $this -> Paginator -> numbers(); ?>
							|
							<?php echo $this -> Paginator -> next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
						</div>
						<div style='clear:both;'></div>
					</div>-->
				</div>
			</div>
			<div style='clear:both;'></div>
			<?php echo $this -> element("footer"); ?>

		</div>
		<script type='text/javascript'>
			$(function(){
var categoria="<?php if(isset($categoria)) echo $categoria['Categoria']['id'] ?>
	";
	var subcategoria="<?php if(isset($subcategoria)) echo $subcategoria['Subcategoria']['id'];  else echo "";?>";
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