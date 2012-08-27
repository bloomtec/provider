$(document).ready(function() {

	var server = '/'
	var path = $('#upload').attr('path');
	var message = $('#upload').attr('message');
	var controller = $('#upload').attr('controller');
	var action = $('#upload').attr('action');

	$('#upload').uploadify({
		'uploader' : server + 'swf/uploadify.swf',
		'script' : server + 'uploadify.php',
		'folder' : server + 'app/webroot/img/' + path,
		'width' : 109,
		'height' : 32,
		'auto' : true,
		'cancelImg' : server + 'img/cancel.png',
		'onComplete' : function(a, b, c, d) {
			var name = c.name;

			$(".selectImagePath").append('<option value="productos/' + name + '" selected="selected">' + name + '</option>');
			$(".product_image").html('<img width="300px" src="' + server + 'img/productos/' + name + '" />');

		}
	});

	$('#single-image-upload').uploadify({
		'uploader' : '/swf/uploadify.swf',
		'script' : '/uploadify.php',
		'folder' : '/app/webroot/img/uploads',
		'auto' : true,
		'cancelImg' : '/img/cancel.png',
		'onComplete' : function(a, b, c, d) {
			var oldImage = $("#single-field").val();
			//$(".preview").html('<img  src="' + d + '" />');
			var file = d.split("/");
			var nombre = file[(file.length - 1)];
			var name = c.name;
			$("#single-field").val(name);
			$.post("/imagenes/uploadify_add", {
				name : name,
				folder : 'uploads',
				multiple : false
			}, function(result) {
				result = $.parseJSON(result);
				if(result.success) {
					$("#ImagePreviewContainer").empty();
					$("#ImagePreviewContainer").html('<img src="/img/uploads/' + result.archivo + '" />');
				} else {
					alert('Ha ocurrido un error al subir la imagen. Intente con otro nombre de archivo.');
				}
			});
		}
	});

});
