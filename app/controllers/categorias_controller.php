<?php
class CategoriasController extends AppController {

	var $name = 'Categorias';
	var $paginate = array('limit' => 10, 'order' => array('Categoria.posicion' => 'asc'));
	
	function getBannerImages($id = null) {
		$this -> Categoria -> recursive = 1;
		if ($id) {
			$galeria = $this -> Categoria -> findById($id);
			return $galeria['Imagene'];
		} else {
			return false;
		}
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow("pruebas", "menu", "info", "obtenerProductos", "obtenerSubcategorias", 'linea');
	}

	function cms_index() {
		$this -> Categoria -> recursive = 0;
		$this -> set('categorias', $this -> paginate());
	}

	function cms_ordenar_productos($categoryId) {
		$this -> Categoria -> bindModel(array("hasMany" => array("Producto" => array("order" => "Producto.orden_en_categoria ASC"))));
		$categoria = $this -> Categoria -> read(null, $categoryId);
		$this -> set(compact("categoria"));
	}

	function cms_reOrder() {
		/*
		 * Ordena las categorias se une con el widget de sortable

		 * */
		foreach ($this->data["Categoria"] as $id => $posicion) {
			$this -> Categoria -> id = $id;
			$this -> Categoria -> saveField("posicion", $posicion);
		}

		echo "yes";
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function cms_getList($lineaId = null) {
		echo json_encode($this -> Categoria -> find('list', array('conditions' => array('linea_id' => $lineaId))));
		$this -> autoRender = false;
		exit(0);

	}

	function cms_view($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Categorìa no válida', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> set('categoria', $this -> Categoria -> read(null, $id));
	}

	function cms_add() {
		if (!empty($this -> data)) {
			$this -> Categoria -> create();
			if ($this -> Categoria -> save($this -> data)) {
				$this -> Session -> setFlash(__('La categoría ha sido guardada', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la categoría. Por favor, intente de nuevo.', true));
			}
		}
		/*App::import('Core','Folder');
		 $fotos= '';
		 $fotosFolder =& new Folder(WWW_ROOT.'/img/categorias/');
		 $fotos=$fotosFolder->read();
		 $opcionesFotos=array();
		 foreach($fotos[1] as $foto){
		 if(isset($foto)) $opcionesFotos["categorias/".$foto]=$foto;
		 }*/
		$lineas = $this -> Categoria -> Linea -> find('list');
		$this -> set(compact('lineas'));
	}

	function cms_edit($id = null) {
		if (!$id && empty($this -> data)) {
			$this -> Session -> setFlash(__('Invalid categoria', true));
			$this -> redirect(array('action' => 'index'));
		}
		if (!empty($this -> data)) {
			if ($this -> Categoria -> save($this -> data)) {
				$this -> Session -> setFlash(__('La categoría ha sido guardada', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la categoría. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this -> data)) {
			$this -> data = $this -> Categoria -> read(null, $id);
		}
		/*App::import('Core','Folder');
		 $fotos= '';
		 $fotosFolder =& new Folder(WWW_ROOT.'/img/categorias/');
		 $fotos=$fotosFolder->read();
		 $opcionesFotos=array();
		 foreach($fotos[1] as $foto){
		 if(isset($foto)) $opcionesFotos["categorias/".$foto]=$foto;
		 }*/
		$lineas = $this -> Categoria -> Linea -> find('list');
		$this -> set(compact('lineas'));
		$this -> set('controller', 'categorias');
	}

	function cms_delete($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Categoría no válida', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Categoria -> Producto -> deleteAll(array("Producto.categoria_id" => $id));
		$this -> Categoria -> Subcategoria -> deleteAll(array("Subcategoria.categoria_id" => $id));
		if ($this -> Categoria -> delete($id)) {
			$this -> Session -> setFlash(__('Categoría borrada', true));
			$this -> redirect($this -> referer());
		}
		$this -> Session -> setFlash(__('No se pudo borrar la categoría. Por favor, intente de nuevo.', true));
		$this -> redirect($this -> referer());
	}

	function getSubcategorias() {
		$categoriaId = $this -> params["form"]["categoria_id"];
		$subcategorias = $this -> Categoria -> Subcategoria -> find("list", array("conditions" => array("Subcategoria.categoria_id" => $categoriaId)));
		$opciones = "";
		foreach ($subcategorias as $id => $nombre) {
			$opciones .= '<option value="' . $id . '">' . $nombre . '</option>';
		}
		echo $opciones;
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

}
?>