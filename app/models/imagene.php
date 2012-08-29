<?php
/**
 * Image Model
 *
 */
class Imagene extends AppModel {
	
	var $name = 'Imagene';
	
	//var $useTable = 'imagenes';
	
	/**
	 * Upload directories
	 */
	var $dirs = array(1 => '50x50', 2 => '100x100', 3 => '150x150', 4 => '215x215', 5 => '360x360', 6 => '750x750');

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	var $validate = array(
		'model_class' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Falta la clase',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe ser un número',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'path' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Falta la ruta',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function afterSave() {
		$this -> cleanupDirectory();
		foreach ($this -> dirs as $key => $dir) {
			$this -> cleanupDirectory($dir);
		}
	}
	
	function afterDelete() {
		$this -> cleanupDirectory();
		foreach ($this -> dirs as $key => $dir) {
			$this -> cleanupDirectory($dir);
		}
	}
	
	function cleanupDirectory($dir = null) {
		// Ruta a la carpeta uploads de imagenes
		$path_to_uploads = IMAGES . 'uploads';
		
		if($dir) {
			$path_to_uploads .= DS . $dir;
		}
		
		// Encontrar todas la imagenes subidas
		$images = $this -> find('all');
		
		// Rutas de imagenes en la base de datos
		$db_images = array();
		
		foreach ($images as $key => $image) {
			$db_images[] = $image['Imagene']['path'];
		}
		
		$dir_images = array();
		
		if ($handle = opendir($path_to_uploads)) {
			while (false !== ($entry = readdir($handle))) {
				// Raíz de uploads	
				$tmp_file = $path_to_uploads . DS . $entry;
				if ($entry != 'empty' && is_file($tmp_file))
					$dir_images[] = $tmp_file;
			}
			closedir($handle);
		}
		
		// Eliminar las imagenes que no esten registradas en la base de datos
		foreach ($dir_images as $file) {
			$file = explode('/', $file);
			$file = $file[count($file) - 1];
			if (!in_array($file, $db_images)) {
				$tmp_file_path = $path_to_uploads . DS . $file;
				unlink($tmp_file_path);
			}
		}
		
	}
	
}