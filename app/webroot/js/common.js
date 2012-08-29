var server="/";
$(document).ready(function(){
	
	//Actualizacion Subcategorias
	if($("#selectCategoria")&&$("#selectSubcategoria")){
		$.each($(".selectCategoria"),function(i,val){
			var fila=$(this).attr("fila");
			var id=$(this).attr("id");
			var modificar=$(this).attr("modificar");
			if(!modificar){
				$.post(server+"/categorias/getSubcategorias",{categoria_id:$("#"+id+" option:selected").val()},function(data){
					$(".selectSubcategoria[fila='"+fila+"']").html(data);
				});	
			}
		});
	}
	$(".selectCategoria").change(function(){
		var fila=$(this).attr("fila");
		var id=$(this).attr("id");
		$.post(server+"/categorias/getSubcategorias",{categoria_id:$("#"+id+" option:selected").val()},function(data){
			$(".selectSubcategoria[fila='"+fila+"']").html(data);
		});	
	});
	
	
	//Actualizacion imagenes
	if($(".selectImagePath")){
		$.each($(".selectImagePath"),function(i,val){
			var fila=$(this).attr("fila");
			$(".product_image[id='"+fila+"']").html('<img src="'+server+'img/'+$("select.selectImagePath[fila='"+fila+"'] option:selected").val()+'" />');
		});
	}
	
	$(".selectImagePath").change(function(){
		var fila=$(this).attr("fila");
		$(".product_image[id='"+fila+"']").html('<img  src="'+server+'img/'+$("select.selectImagePath[fila='"+fila+"'] option:selected").val()+'" />');
	});
	
});