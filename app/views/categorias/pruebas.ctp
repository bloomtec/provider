<script>
var server="/cms/";
$(document).ready(function(){
obtenerMenu($("#content"));
 
  
  
  
});


//FUNCIONES
function obtenerMenu(div){
    /*
    hace solicitud ajax a /categorias/menu y pega el menu al div dado
    */
   
    $.getJSON(server+"categorias/menu",{},function(categorias){
      div.append("<ul class='menu'>");
            $.each(categorias,function(i,categoria){
              $(".menu").append("<li class='categoria' id='"+categoria.Categoria.id+"'>"+categoria.Categoria.nombre+"</li>");
                var numeroSubcategorias=categoria.Subcategoria.length;
                if(numeroSubcategorias>0){
                $("li.categoria[id='"+categoria.Categoria.id+"']" ).append("<ul class='subcategoria' categoriaId='"+categoria.Categoria.id+"'>");
                  $.each(categoria.Subcategoria,function(j,subcategoria){
                    $("li.categoria[id='"+categoria.Categoria.id+"'] ul").append("<li class='subcategoria' id='"+subcategoria.id+"'>"+subcategoria.nombre+"</li>");

                  });
                 $("li.categoria[id='"+categoria.Categoria.id+"']").append("</ul>");
                }
                
            });
    $("#content").append("</ul>");
    });
   
  
  }
  
 //CATEGORIAS------------------------------------------------------------------------
function obtenerInfoCategoria(div,categoriaId){
$.getJSON(server+"categorias/info",{"data['Categoria']['id']":categoriaId},function(categoria){
  var nombre=categoria.Categoria.nombre;
  var imagen=categoria.Categoria.imagen;
  //PINTAR CATEGORIA
 });
}

function obtenerProductoPorCategoria(div,categoriaId,limit,page){
$.getJSON(server+"categorias/obtenerProductos",{"data['Categoria']['id']":categoriaId,data["limit"]:limit,data["page"]:page},function(productos){
    $.each(productos,function(i,producto){
     var nombre=producto.Producto.nombre;
     var codigo=producto.Producto.codigo;
     var imagen=producto.Producto.image_path;
     var beneficios=producto.Producto.beneficios;
     var acabados=producto.Producto.acabados;
     var colores=producto.Producto.colores;
     var materiales=producto.Producto.materiales;
     var dimensiones=producto.Producto.dimensiones;
     //PINTAR PRODUCTO
    });
 });
}

//SUBCATEGORIAS------------------------

function obtenerInfoSubcategoria(div,subcategoriaId){
$.getJSON(server+"subcategorias/info",{"data['Subcategoria']['id']":subcategoriaId},function(subcategoria){
  var nombre=subcategoria.Subcategoria.nombre;
  var imagen=subcategoria.Subcategoria.imagen;
  //PINTAR Subcategoria
 });
}

function obtenerProductoPorSubcategoria(div,subcategoriaId,limit,page){
$.getJSON(server+"subcategorias/obtenerProductos",{"data['Subcategoria']['id']":subcategoriaId,data["limit"]:limit,data["page"]:page},function(productos){
   pintarListadoProducto(productos);
  
 });
}


function pintarListadoProducto($productos){
    $.each(productos,function(i,producto){
     var nombre=producto.Producto.nombre;
     var codigo=producto.Producto.codigo;
     var imagen=producto.Producto.image_path;
     var beneficios=producto.Producto.beneficios;
     var acabados=producto.Producto.acabados;
     var colores=producto.Producto.colores;
     var materiales=producto.Producto.materiales;
     var dimensiones=producto.Producto.dimensiones;
     //PINTAR PRODUCTO
    });
}
function pintarProducto($producto){
}
function pintarCategoria(){
}
function pintarSubcategoria(){
}
</script>