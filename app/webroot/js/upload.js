$(document).ready(function() {

	var server='/'
	var path=$('#upload').attr('path');
	var message=$('#upload').attr('message');
	var controller=$('#upload').attr('controller');
	var action=$('#upload').attr('action');

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

});
