<div class="contenedor-categorias" style="border: #666 1px solid;">
	<a  class="prev browse left" alt="anterior"></a>
	<div  id="contenido_categoria" class="scrollable">
		<ul  class="items" >						
			<?php foreach($linea['Categoria'] as $cate):?>
			<li class='categoria' rel="<?php echo $cate['id']?>">
				<a  href="/linea/<?php echo $linea['Linea']['id'] ?>/categoria:<?php echo $cate['id']?>"> ● <?php echo $cate['nombre']?> </a>
				<div class="subcategorias the-items" rel='<?php echo  $cate['id'] ?>'>
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
	<div class="scroll"> </div>
</div>
<script type='text/javascript'>
		$(function(){
			var categoria="<?php if(isset($categoria)) echo $categoria['Categoria']['id'] ?>";
			var subcategoria="<?php if(isset($subcategoria)) echo $subcategoria['Subcategoria']['id'] ?>";
			if(categoria){				
				updateSubcategories(function(){
					$("#subcategorias .scroll").html($('div.subcategorias[rel="'+categoria+'"]').clone());
					return $('div.subcategorias[rel="'+categoria+'"]').find('a').length;
				});
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
					$that=$(this);
					updateSubcategories(function(){
						$("#subcategorias .scroll").html($that.find('div.subcategorias').clone());
						return $that.find('.subcategorias').find('a').length;
					});
				},
				function(){

			});
			

		});
		function updateSubcategories(cloneFunction){
			$("#subcategorias .the-next").remove();
			$("#subcategorias .the-prev").remove();
			$.removeData($(".scroll")[0],"scrollable");
			if(cloneFunction()){
				theNext=$( document.createElement('div') ).attr('class','the-next browse');
				thePrev=$( document.createElement('div') ).attr('class','the-prev browse');
				$("#subcategorias").prepend(thePrev);				
				$("#subcategorias").append(theNext);
				$(".scroll").scrollable({
					next:".the-next",
					prev:".the-prev"
				});
			}
			
		}
	</script>