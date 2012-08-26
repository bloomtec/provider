$(document).ready(function(){
	var server='/cms/administracion_archivos/';
	$(".administacion_archivos  td").live("click",function(){
		$(this).children(".hide").hide();
		$(this).children(".ajax_input").show();
		var $input=$(this).children(".ajax_input").children("input");
	});
	$(".administacion_archivos .actualizarCampo").live("click",function(){
		var $input=$(this).siblings(".ajax_input").children(".campo");
		var $td=$(this).parent();
		var $tr=$(this).parent().parent();
		$.post(server+"archivos/ajax_actualizarCampo",{"data[Archivo][id]":$tr.attr("id"),"data[valor]":$input.val(),"data[campo]":$input.attr("campo")},function(data){
			if(data=="YES"){
				$td.children(".hide").html($input.val()).show();
				$input.parent().hide();
				$td.children(".boton").hide();
			}
		
		});
	});
});