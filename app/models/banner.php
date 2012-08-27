<?php
class Banner extends AppModel {
		
	var $name = 'Banner';
	var $displayField = 'nombre';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Imagene' => array(
			'className' => 'Imagene',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('model_class' => 'Banner'),
			'fields' => '',
			'order' => array('posicion' => 'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>