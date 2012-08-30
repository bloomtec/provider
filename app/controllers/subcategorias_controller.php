<?php
class SubcategoriasController extends AppController {

	var $name = 'Subcategorias';
	
	function getBannerImages($id = null) {
		$this -> Subcategoria -> recursive = 1;
		if ($id) {
			$galeria = $this -> Subcategoria -> findById($id);
			return $galeria['Imagene'];
		} else {
			return false;
		}
	}
	
	function cms_index() {
		$this->Subcategoria->recursive = 0;
		$this->set('subcategorias', $this->paginate(array("Subcategoria.nombre <>"=>"ninguna")));
	}

	function info(){//devuelve la info de una subcategoria como objeto json
	  	$this->Subcategoria->recursive=1;
	  	$subCategoria=$this->Subcategoria->read(null,$this->data["Subcategoria"]["id"]);
	  	echo json_encode($subCategoria);
	  	Configure::write('debug', 0);   
	  	$this->autoRender = false;   
	  	exit(); 
	 }
	  

	function cms_ordenar_productos($subcategoryId){
		$this->Subcategoria->bindModel(array("hasMany"=>array(
			"Producto"=>array(
				"order"=>"Producto.orden_en_subcategoria ASC"
				)
			)
		));
		$subcategoria=$this->Subcategoria->read(null,$subcategoryId);
		$this->set(compact("subcategoria"));
	}

	function cms_getList($categoriaId){
		echo json_encode($this -> Subcategoria -> find('list',array('conditions'=>array('categoria_id' => $categoriaId))));	
		$this -> autoRender=false;
		exit(0);
	}

	function cms_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Subcategoría no valida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('subcategoria', $this->Subcategoria->read(null, $id));
	}

	function cms_add() {
		if (!empty($this->data)) {
			$this->Subcategoria->create();
			if ($this->Subcategoria->save($this->data)) {
				$this->Session->setFlash(__('La subcategoría ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guaradar la subcategoría. Pro favor, intente de nuevo.', true));
			}
		}
		App::import('Core','Folder');
		$fotos= '';
		$fotosFolder =& new Folder(WWW_ROOT.'/img/subcategorias/');
		$fotos=$fotosFolder->read();
		$opcionesFotos=array();
		foreach($fotos[1] as $foto){
			if(isset($foto)) $opcionesFotos["subcategorias/".$foto]=$foto;
		}
		$this->set(compact("opcionesFotos"));
		$lineas = $this -> Subcategoria -> Categoria -> Linea -> find('list');
			//$categorias = $this->Subcategoria->Categoria->find('list');
		$this->set(compact('categorias','opcionesFotos', 'lineas'));
	}

	function cms_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Subcategoría no valida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Subcategoria->save($this->data)) {
				$this->Session->setFlash(__('La subcategoría ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guaradar la subcategoría. Pro favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Subcategoria->read(null, $id);
		}
		App::import('Core','Folder');
		$fotos= '';
		$fotosFolder =& new Folder(WWW_ROOT.'/img/subcategorias/');
		$fotos=$fotosFolder->read();
		$opcionesFotos=array();
		foreach($fotos[1] as $foto){
			if(isset($foto)) $opcionesFotos["subcategorias/".$foto]=$foto;
		}
		$lineas = $this -> Subcategoria -> Categoria -> Linea -> find('list');
		$this->set(compact("opcionesFotos",'lineas'));
		$this -> set('controller', 'subcategorias');

			/*$categorias = $this->Subcategoria->Categoria->find('list');
		$this->set(compact('categorias'));*/
	}

	function cms_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Subcategoría no valida', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Subcategoria->Producto->deleteAll(array("Producto.subcategoria_id"=>$id));
		if ($this->Subcategoria->delete($id)) {
			$this->Session->setFlash(__('Subcategoría borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar la subcategoría. Pro favor, intente de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}

	
}
?>