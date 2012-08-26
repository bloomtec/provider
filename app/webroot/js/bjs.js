$(function(){
	BJS = {};

	BJS.get = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "GET",
			cache : false,
			data : params,
			success : callback
		});
	}

	BJS.post = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "POST",
			cache : false,
			data : params,
			success : callback
		});
	}

	BJS.JSON = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "GET",
			cache : false,
			dataType : "json",
			data : params,
			success : callback
		});
	}

	BJS.JSONP = function(url, params, callback) {
		jQuery.ajax({
			url : url,
			type : "POST",
			cache : false,
			dataType : "json",
			data : params,
			success : callback
		});
	}
	BJS.setParam = function(param, value,withUrl) {
		/* añande o modifica un parametro de la forma param:value */
		var url = (typeof(withUrl) == 'undefined' || typeof(withUrl) == null )? document.URL : withUrl;
		var params = url.substring(url.indexOf("/", 0));
		if (params.substring(0, 2) == "//") {
			params = params.substring(params.indexOf("/", 2));
		}
		if (params.slice(-1) != "/") {
			params += "/";
		}
		paramInUrl = params.indexOf(param + ":");// desde donde esta el
		// parametro
		if (paramInUrl >= 0) {
			var indexValue = paramInUrl + param.length + 1/*
															 * incluyo los dos
															 * puntos
															 */;
			var urlTillValue = params.substring(0, indexValue);
			var newValue = params.substring(indexValue, params.indexOf("/",
					paramInUrl));
			var urlAfterValue = params.substring(indexValue + newValue.length);
			return urlTillValue + value + urlAfterValue;
		} else {
			return params + param + ":" + value+'/';
		}
	}
	BJS.removeParam = function(param, withUrl) {
		/* añande o modifica un parametro de la forma param:value */
		var url = (typeof(withUrl) == 'undefined' || typeof(withUrl) == null )? document.URL : withUrl;
		var params = url.substring(url.indexOf("/", 0));
		if (params.substring(0, 2) == "//") {
			params = params.substring(params.indexOf("/", 2));
		}
		
		var initParamInString = params.indexOf(param,0);
		if(initParamInString < 0){
			return params;
		}
		var endParamInString = params.indexOf('/',initParamInString);
		if( endParamInString < 0){
			cosole.log('al final');
			endParamInString = params.length;
		}
		var paramsWithouParam = params.substring(0,initParamInString)+params.substring(endParamInString + 1);
	
		return paramsWithouParam;
	}
	BJS.updateSelect = function($select, $address, $callback){
		var selected = ($select.attr('last-selected')) ? $select.attr('last-selected') : false;
		$select.html('');
		firstArguments = arguments;
		BJS.JSON($address,{},function(options){
			var count=0;
			var objectSize= BJS.objectSize(options);
			if($select.is('.empty')){
					$select.append('<option value="0"> seleccione </option>');
			}
			$.each(options,function(i,val){
				if(selected && selected == i){
					$select.append('<option selected="selected" value="'+i+'">'+val+'</option>');
				}else{
					$select.append('<option value="'+i+'">'+val+'</option>');
				}
				count += 1;
				if(firstArguments.length == 3 && count ==  objectSize){
					$select.find('option[value="'+selected+'"').attr('selected','selected');
					$callback();
				}
				
			});
		});	
	}
	BJS.objectSize = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
	}
	//FUNCIONALIDADES SELECTS
	if($("#linea").length){
		BJS.updateSelect($('#categoria'),'/cms/categorias/getList/'+$("#linea option:selected").val(),function(){
			if($("#subcategoria").length){
				BJS.updateSelect($('#subcategoria'),'/cms/subcategorias/getList/'+$("#categoria option:selected").val());
			}
		});
	}else{
		if($("#subcategoria").length && $("#categoria").length){
			BJS.updateSelect($('#subcategoria'),'/cms/subcategorias/getList/'+$("#categoria option:selected").val());
		}
	}
	$("#linea").change(function(){
		BJS.updateSelect($('#categoria'),'/cms/categorias/getList/'+$("#linea option:selected").val(),function(){
			if($("#subcategoria").length){
				BJS.updateSelect($('#subcategoria'),'/cms/subcategorias/getList/'+$("#categoria option:selected").val());
			}
		});
	});
	$("#categoria").change(function(){
		if($("#subcategoria").length){
			BJS.updateSelect($('#subcategoria'),'/cms/subcategorias/getList/'+$("#categoria option:selected").val());
		}
	});
	$("#filtrar").click(function(){
		document.location ="/cms/productos/index/linea:"+$("#linea option:selected").val()+"/categoria:"+$("#categoria option:selected").val()+"/subcategoria:"+$("#subcategoria option:selected").val();
	});
	
	/*$('.filtros select').change(function(){
		var newUrl= BJS.setParam($(this).attr('rel'),$(this).val());
		
		if(newUrl.indexOf( "productos/index") >= 0){ // si la ruta tiene la cadena producctos/index
			document.location =newUrl;
		}else{
			if(newUrl.indexOf( "productos") >= 0){
				document.location =newUrl.replace(/productos/g, "productos/index"); // si la ruta tiene la cadena productos pero no index
			}else{
				document.location =newUrl.replace(/cms/g, "cms/productos/index"); // si la ruta no tiene ni la cadenda productos ni la cadena index
			}
		}
		
	});*/
	
});
