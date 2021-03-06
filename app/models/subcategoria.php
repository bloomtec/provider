<?php
class Subcategoria extends AppModel {
	var $name = 'Subcategoria';
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

	var $belongsTo = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'subcategoria_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => array('orden_en_subcategoria' => 'ASC'),
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
			'conditions' => array('model_class' => 'Subcategoria'),
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