<?php
class Linea extends AppModel {
	var $name = 'Linea';
	var $displayField = 'nombre';
	var $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'linea_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Categoria.posicion asc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Imagene' => array(
			'className' => 'Imagene',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('model_class' => 'Linea'),
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