<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Description" content="Fabricación y venta de mobiliario escolar y de oficina, sillas estudiantiles, divisiones de oficina, sistemas de archivo, sistemas de oficina abierta, divisiones modulares-RTA.">

<meta name="Keywords" content="sillas universitarias, sillas escolares, sillas profesor, venta de sillas, diseño de sillas, diseño de muebles, mobiliario escolar, mobiliario de oficina, archivadores, sistemas de almacenamiento, divisiones modulares, divisiones RTA, rta, divisiones, sistemas de oficina abierta, sillas interlocutoras, provider palmira, provider cali, Provider, fabricante de sillas, fabricante de mobiliario, fabricante de mobiliario escolar, fabricante de divisiones de oficina, fabricante, fabricante de sistemas de almacenamiento, fabricante de sillas escolares, fabricante de oficina abierta, fabricante de mobiliario, sillas de diseño, espacios comunes, fabricante de espacios comunes, sillas giratorias, fabricante de sillas giratorias, venta de sillas giratorias, sillas interlocutoras, fabricación de sillas interlocutoras, venta de sillas interlocutoras, crea tu espacio" >

<title>Provider y Cia Ltda.</title>

<link href="/favicon.ico" type="image/x-icon" rel="icon" />


<link rel="stylesheet" href="stylesheet.css" type="text/css"/>

<script src="stuHover.js" type="text/javascript"></script>
	
<script src="var.JS" type="text/javascript"></script>


</head>

<body>
<div id="conteiner" style="height:771px">
<div id="content">
<?php echo file_get_contents("header.php"); ?>


<div id="banner">

<iframe src="banners/b_index.php?folder=contacto" width="850" height="378" frameborder="0" scrolling="no">
  <p>Your browser does not support iframes.</p>
</iframe>

</div>



<div id="banner_underline"> </div>

<?php echo file_get_contents("redes_sociales.php"); ?>

 <div id="contenido" style="height:250px;">

<p>&nbsp;</p>
<table width="850" border="0" align="center">
  <tr>
    <td width="40"><h3>&nbsp;</h3></td>
    <td><h2> CONTÁCTENOS</h2></td>
    <td width="40">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<div style="width:800px; height:250px; margin:0 auto;">

<div style="width:100%; height:250px; background-color:none; float:left;">
  <table width="97%" border="0" align="center">
    <tr>
      <td width="34%" height="100%" align="center"><p>&nbsp;</p>
        <p>
          <?php

$name=$_POST["name"];
$lastname=$_POST["lastname"];
$phone=$_POST["phone"];
$cel=$_POST["cel"];
$empresa=$_POST["empresa"];
$cargo=$_POST["cargo"];
$pais=$_POST["pais"];
$city=$_POST["city"];
$email=$_POST["email"];
$url=$_POST["url"];
$title=$_POST["title"];
$sub=$_POST["sub"];
$text=$_POST["text"];


    $headers = "From: $email";

      $message .= "

	Correo recibido desde la página web: www.provider.com.co
	
	
      De: $name 
	  Apellido: $lastname

	  Empresa: $empresa
	  Cargo: $cargo

      E-Mail: $email
	  Pagina Web: $url
	  E-mail: $email
	  Telefono: $phone
	  Celular: $cel
	  
	  País: $pais
	  Ciudad: $city

      ____________________________________

	Asunto: $sub

    Cuerpo del mensaje:
	$text
	
      ____________________________________
    ";
#
    $message2 .= "
	
	Tu mensaje a www.Provider.com.co fué enviado con éxito.
	Asunto del mensaje: $sub.\n

      Para su referencia, se ha añadido el texto original del mensaje al final de este correo.\n

      Tu mensaje original era:

      $text


Att: Equipo de ventas Provider y Cia. Ltda.
    ";
#
      $headers2 .= "From: ventas@provider.com.co, gerencia@provider.com.co";
#
      $sub2.="Re: $sub";
#
    ?>
        </p>
        <p><strong>Gracias!</strong></p>
        <p>Tu mensaje ha sido enviado, usando la dirección de remitente:</p>
        <p><span style="color:red;font-size:150%;font-weight:bold;"><?php print $email; ?></span></p>
        <p>&nbsp;</p>
        <p>Si no es correcto,
          <script type='text/javascript'>
/*#*/
      document.write('<a href="javascript:history.go(-1);">vuelve atras</a>');
/*#*/
                  </script>
          vuelve atras y envialo de nuevo</p>
        <p class="details">Pulsa el boton &quot;atras&quot; en tu navegador para volver a la página anterior.</p>
        <p class="details">
          <?php
#
      $message = stripslashes($message);
#
      $message2 = stripslashes($message2);
#
      $message = strip_tags ($message);
#
      $message2 = strip_tags ($message2);
#
      // RECUERDAR CAMBIAR LA DIRECCION DE CORREO
#
      mail("ventas@provider.com.co, gerencia@provider.com.co", $sub, $message, $headers);
#
      mail($email, $sub2, $message2, $headers2);
#
      ?>
        </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
</div>

</div>
</div>

</div>

<?php echo file_get_contents("footer.php"); ?>


</div>


</body>
</html>