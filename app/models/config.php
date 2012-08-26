<?php 
class Config extends AppModel{
	var $name="Config";
	var $useTable="config";
	
	var $belongsTo = array(
        'Autenticacion' => array(
            'className'    => 'Autenticacion',
            'foreignKey'    => 'autenticacion_id'
        )
    );  
}
?>