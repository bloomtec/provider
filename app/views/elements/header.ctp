<div id="header">

<div id="header_up">

<div id="header_up_provider">
  <img src="/recursos/provider_logo_header.JPG" alt="Logo provider" position="relative" width="190" height="93" usemap="#Map_inicial" border="0">
  <map name="Map_inicial" id="Map_inicial">
    <area shape="rect" coords="4,6,186,86" href="http://www.provider.com.co" alt="Provider y Cia Ltda." />
  </map>
</div>

<div id="header_up_center">
</div>

<div id="header_up_search">

<div id="search_conteiner">

<div id="search_box">
Buscar...
</div>

<div style="float:right; position:relative; left:-10px; top:5px;"> <img src="/recursos/magnify.jpg" alt="search" width="30" height="30" usemap="#Map" border="0" />
  <map name="Map" id="Map">
    <area shape="rect" coords="-17,-24,37,37" href="#" />
  </map>
</div>
 </div>

</div>
  
</div>

<div id="header_menu">

<ul id="nav">
	<li class="top"><a href="/" id="Inicio" class="inicio"><span>Inicio</span></a></li>
	<li class="top"><a href="nuestra_empresa" id="nuestra_empresa" class="nuestra"><span>Nuestra Empresa</span></a></li>
   	<li class="top"><a href="clientes" id="clientes" class="clientes"><span>Clientes</span></a></li>
	  <li class="top"><a href="#" id="productos" class="productos"><span class="down">Productos</span></a>
		  <ul class="sub">		
      <?php $lineas = $this -> requestAction("/lineas/get"); ?>	
      <?php foreach($lineas as $linea):?>
        <li><a href="/linea/<?php echo $linea['Linea']['id'] ?>"><?php echo $linea['Linea']['nombre'] ?></a>
          <?php if(isset($linea['Categoria']) && !empty($linea['Categoria']) ): ?>
            <ul>
              <?php foreach($linea['Categoria'] as $sublinea): ?>
                 <li><a href="/linea/<?php echo $linea['Linea']['id']?>/categoria:<?php echo $sublinea['id'] ?>"><?php echo $sublinea['nombre'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>        
      </ul>
    </li>
 	  <li class="top"><a href="contact" id="contacto" class="contacto"><span>Contáctenos</span></a></li>

</ul>
	

</div>


</div>