<?php
/**
 * Images Controller
 *
 * @property Imagen $Imagen
 */
class ImagenesController extends AppController {
	
	var $name = 'Imagenes';
	
	var $components = array('Attachment');
	
	function uploadify_add() {
		
		if ($_POST['name'] && $_POST['folder'] && $_POST['multiple']) {

			$fileName = $_POST['name'];
			$folder = IMAGES . $_POST['folder'];
			$multiple = $_POST['multiple'];
			$model_class = null;
			$foreign_key = null;
			
			if($multiple == 'true') {
				$model_class = $_POST['model_class'];
				$foreign_key = $_POST['foreign_key'];
			}
			
			if(!$this -> Attachment -> resize_image('resize', $folder . '/' . $fileName, $folder . '/50x50', $fileName, 50,	50)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/100x100", $fileName, 100, 100)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/150x150", $fileName, 150, 150)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/215x215", $fileName, 215, 215)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/360x360", $fileName, 360, 360)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/750x750", $fileName, 750, 750)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			
			echo json_encode(array('success' => true, 'archivo' => $fileName));
				
		}

		exit(0);

	}
	
	/**
	 * Obtener las imagenes de un producto
	 * 
	 * @param string $model_class Nombre de la clase relacionada a la imagen
	 * @param int $foreign_key ID del ítem relacionado perteneciente a $model_class
	 * @param bool $json Indica si se debe dar respuesta con un objeto JSON
	 * @return Información de las imagenes relacionadas en el formato indicado; por defecto NO esta en JSON
	 */
	function getImages($model_class, $foreign_key, $json = false) {
		$images = $this -> Imagene -> find('all', array('conditions' => array('Imagene.model_class' => $model_class, 'Imagene.foreign_key' => $foreign_key)));
		if(!$json) {
			$this -> autoRender = false;
			Configure::write('debug', 0);
			echo json_encode($images);
			exit(0);
		} else {
			return $images;
		}
	}
	
	function cms_delete($id) {
		if (!$id) {
			$this -> Session -> setFlash(__('Imagen no válida', true));
		}
		if ($this->Imagene -> delete($id)) {
			$this->Session->setFlash(__('Se eliminó la imagen', true));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar la imagen. Por favor, intente de nuevo.', true));
		}
		$this->redirect($this -> referer());
	}
	
	function cms_add($model_class, $foreign_key) {
		if (!empty($this->data)) {
			$this -> Imagene -> create();
			if ($this -> Imagene -> save($this -> data)) {
				$this -> Session -> setFlash(__('Se agregó la imagen', true));
				$this -> redirect(
					array(
						'controller' => Inflector::tableize($model_class),
						'action' => 'edit',
						$foreign_key
					)
				);
			} else {
				$this -> Session -> setFlash(__('No se agregó la imagen', true));
				debug($this -> Imagene -> validationErrors);
			}
		}
		$this -> set('controller', Inflector::tableize($model_class));
	}
	
	function ordenar() {
		$this -> autoRender = false;
		$success = true;
		$this -> Imagene -> recursive = -1;
		foreach($this -> data['Imagene'] as $imagen_id => $posicion) {
			$imagen = $this -> Imagene -> findById($imagen_id);
			$imagen['Imagene']['posicion'] = $posicion;
			if(!$this -> Imagene -> save($imagen)) {
				$success = false;
			}
		}
		if($success) {
			echo 'yes';
		} else {
			echo 'no';
		}
	}
	
}
