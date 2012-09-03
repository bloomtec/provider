<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Description" content="Fabricación y venta de mobiliario escolar y de oficina, sillas estudiantiles, divisiones de oficina, sistemas de archivo, sistemas de oficina abierta, divisiones modulares-RTA.">

<meta name="Keywords" content="sillas universitarias, sillas escolares, sillas profesor, venta de sillas, diseño de sillas, diseño de muebles, mobiliario escolar, mobiliario de oficina, archivadores, sistemas de almacenamiento, divisiones modulares, divisiones RTA, rta, divisiones, sistemas de oficina abierta, sillas interlocutoras, provider palmira, provider cali, Provider, fabricante de sillas, fabricante de mobiliario, fabricante de mobiliario escolar, fabricante de divisiones de oficina, fabricante, fabricante de sistemas de almacenamiento, fabricante de sillas escolares, fabricante de oficina abierta, fabricante de mobiliario, sillas de diseño, espacios comunes, fabricante de espacios comunes, sillas giratorias, fabricante de sillas giratorias, venta de sillas giratorias, sillas interlocutoras, fabricación de sillas interlocutoras, venta de sillas interlocutoras, crea tu espacio" >

<title>Provider y Cia Ltda.</title>

<link href="/favicon.ico" type="image/x-icon" rel="icon" />


<link rel="stylesheet" href="/css/stylesheet.css" type="text/css"/>
<script src="/js/jquery.tools.min.js" type="text/javascript"></script>
<script src="/js/stuHover.js" type="text/javascript"></script>
	
<script src="/js/var.JS" type="text/javascript"></script>


</head>

<body>
<div id="conteiner" style="height:1021px">
<div id="content">
<?php echo $this -> element("header"); ?>

<?php echo $this -> element('banner', array('page_banner' => 'contacto')); ?>

<div id="banner_underline"> </div>

<?php echo $this -> element("redes_sociales"); ?>

 <div id="contenido" style="height:500px;">

<p>&nbsp;</p>
<table width="850" border="0" align="center">
  <tr>
    <td width="40"><h3>&nbsp;</h3></td>
    <td><h2> CONTÁCTENOS</h2></td>
    <td width="40">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<div style="width:800px; height:400px; margin:0 auto;">

<div style="width:400px; height:400px; background-color:none; float:left;">
  <table width="400" border="0" align="center">
    <tr>
      <td width="34%" align="center"><form id="contact-form" method="post" onsubmit="return emailCheck(this.email.value);" action="/contact">
        <fieldset>
          <legend><strong>Datos Personales &raquo;</strong><br />
            </legend>
          <p>&nbsp;</p>
<div style="width:400px;">
          <table width="190" border="0" align="left">
            <tr>
                <td width="22%" align="left"><span style="color:#c00;">*</span>Nombre:</td>
                <td><p>
                  <input name="data[Email][name]" type="text" id="visitorname" title="Tu Nombre" size="15" />
                </p></td>
              </tr>
              <tr>
                <td align="left"><label for="visitorsurname"><span style="color:#c00;">*</span>Telefono: </label></td>
                <td><input name="data[Email][phone]" type="text" id="phone" title="Tu telefono" size="15" /></td>
              </tr>
              <tr>
                <td align="left"><span style="color:#c00;">*</span>Empresa</td>
                <td><input name="data[Email][empresa]" type="text" id="empresa" title="Tu dirección de correo" value="" size="15" /></td>
              </tr>
              <tr>
                <td align="left"><label for="url"> <span style="color:#c00;">*</span>Pais:</label></td>
                <td><input name="data[Email][pais]" type="text" class="text" id="pais" title="Tu página web" size="15" /></td>
              </tr>
              <tr>
                <td align="left"><span style="color:#c00;">*</span>E-mail:</td>
                <td><input name="data[Email][email]" type="text" class="text" id="visitormail" title="Tu número de telefono" size="15" /></td>
              </tr>
              <tr>
                <td align="left"><span style="color:#c00;">*</span>Asunto: </td>
                <td><p>
                  <input name="data[Email][sub]" type="text" id="subject" title="El motivo de tu mensaje" size="15" />
                  </p>
                  </td>
              </tr>
          </table>
          <table width="190" border="0" align="left">
            <tr>
              <td width="22%" align="left"><span style="color:#c00;">*</span>Apellido:</td>
              <td><p>
                <input name="data[Email][lastname]" type="text" id="visitorlastname" title="Tu Apellido" size="15" />
                <br />
                </p></td>
            </tr>
            <tr>
              <td align="left"><label for="visitorsurname"><span style="color:#c00;">*</span>Celular: </label></td>
              <td><input name="data[Email][cel]" type="text" id="celular" title="Tu celular" size="15" /></td>
            </tr>
            <tr>
              <td align="left"><span style="color:#c00;">*</span>Cargo:</td>
              <td><input name="data[Email][cargo]" type="text" id="cargo" title="Tu dirección de correo" value="" size="15" /></td>
            </tr>
            <tr>
              <td align="left"><label for="url"> <span style="color:#c00;">*</span>Ciudad:</label></td>
              <td><input name="data[Email][city]" type="text" class="text" id="ciudad" title="Tu página web" size="15" /></td>
            </tr>
            <tr>
              <td align="left">Pagina:</td>
              <td><input name="data[Email][url]" type="text" class="text" id="url" title="Tu número de telefono" size="15" /></td>
            </tr>
          </table>
</div>
          <p>&nbsp; </p>
            <p>
              <label for="notes2"><span style="color:#c00;"><br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />

                  * </span>Cuerpo del Mensaje:<br />
              </label>
              <textarea name="data[Email][text]" id="notes2" rows="5" cols="48" onkeyup="val=this.value; if (val.length &gt; 1000) { alert('Lo siento, has sobrepasado el limite de 1000 caracteres'); this.value = val.substring(0,1000); }  this.form.count.value=1000-parseInt(this.value.length); "></textarea>
              <br />
            </p>
            <p>
              <label for="count">Caracteres disponibles:</label>
              <input type="text" name="count" id="counter" value="1000" size="7" />
              <?php $str=0; $text_len = preg_match_all('/./', $str, $dummy); ?>
              <span style="color:#c00;"><em><br />
                *</em></span><em>Campos Obligatorios</em></p>
            <p>&nbsp;</p>
            <p><span style="color:red;font-weight:bold;">
              <input type="submit" id="submit" name="send" value="Enviar »" title="Pulsa una vez para enviar el mensaje, y espera a la pantalla de confirmación" />
            </span><span style="color:red;font-weight:bold;"><?php $error = ''; echo $error; ?></span></p>
          </fieldset>
      </form></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<div style="width:20px; height:400px; background-color:none; float:left;">

</div>

<div style="width:380px; height:400px; background-color:none; float:left;">
<table width="100%" border="0">
  <tr>
    <td><p><strong>INFORMACIÓN DE CONTACTO:</strong></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="98"><table width="80%" border="0" align="center">
      <tr>
        <td width="12%"><img src="recursos/telefono.JPG" width="18" height="18" alt="telefono de contacto" /></td>
        <td width="88%">Tel: (57) (2) 8855766</td>
      </tr>
      <tr>
        <td><img src="recursos/celular.JPG" width="18" height="18" alt="celular de contacto" /></td>
        <td>Cel: (57) (315) 555 5555</td>
      </tr>
      <tr>
        <td><img src="recursos/correo.JPG" width="18" height="18" alt="correo de contacto" /></td>
        <td>oficina_principal@provider.com.co</td>
      </tr>
      <tr>
        <td><img src="recursos/direccion.JPG" width="18" height="18" alt="direccion de contacto" /></td>
        <td>Dirección: Cr 4 14-50 Cali - Colombia</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="112" align="center"><img src="recursos/mapa.jpg" width="400" height="294" alt="ubicacion Provider" /></td>
  </tr>
</table>


</div>
</div>

  </div>
<div style="clear:both;"></div>
</div>


<?php echo $this -> element("footer"); ?>
</div>

</body>
</html>