<?php 
class Autenticacion extends AppModel{
	var $name="Autenticacion";
	var $useTable="autenticaciones";
	

     var $hasOne = array(
        'Config' => array(
            'className'    => 'Config'
        )
    );  
}
?>