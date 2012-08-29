$(document).ready(function() {
	var server='/cms/administracion_archivos/'
	var path='/cms/app/plugins/administracion_archivos/webroot/files';
	var message="No se pudo guardar el archivo, por favor intente de nuevo";
	var controller="archivos";
	var action="ajax_add";
	$('#upload').uploadify({
	'uploader': server+'swf/uploadify.swf',
	'script': '/cms/uploadify.php',
	'folder':  path,
	'width' : 109,
	'height': 32,
	'auto': true,
	'cancelImg': server+'img/cancel.png',
	'onError':function(a,b,c,d){
		alert(d.info);
	},
	'onComplete': function(a,b,c,d){
		
		var name=c.name;
		$.post(server+controller+"/"+action,{"data[Archivo][nombre]":name},function(data){
			$("body").append(data);
			if(data!="NO"){
				$(".nuevosArchivos").children("table").append(data);
				$(".nuevosArchivos").show();
				//$(".uploaded").html(data);
			}
		});	
		
	}
	});
	

});