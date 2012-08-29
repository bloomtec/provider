<?php
class LineasController extends AppController {

	var $name = 'Lineas';
	var $paginate = array('limit' => 10, 'order' => array('Linea.posicion' => 'asc'));

	function get() {
		return $this -> Linea -> find('all');
	}

	function getBannerImages($id = null) {
		if ($id) {
			$galeria = $this -> Linea -> findById($id);
			return $galeria['Imagene'];
		} else {
			return false;
		}
	}

	function view($id = null) {

		$this -> layout = "front";
		$this -> Linea -> recursive = 2;
		$this -> Linea -> Categoria -> unbindModel(array('hasMany' => array('Producto'), 'belongsTo' => array('Linea')));
		$this -> set('linea', $this -> Linea -> read(null, $id));
		$conditions = array();
		if (!isset($this -> params['named']['categoria'])) {
			$categorias = $this -> Linea -> Categoria -> find('list', array('conditions' => array('Categoria.linea_id' => $id), 'fields' => array('id', 'id')));

		} else {
			$categorias = $this -> params['named']['categoria'];
			$this -> Linea -> Categoria -> recursive = -1;
			$this -> set('categoria', $this -> Linea -> Categoria -> read(null, $categorias));
		}
		$conditions['Producto.categoria_id'] = $categorias;
		if (isset($this -> params['named']['subcategoria'])) {
			$conditions['Producto.subcategoria_id'] = $this -> params['named']['subcategoria'];
			$this -> Linea -> Categoria -> Subcategoria -> recursive = -1;
			$this -> set('subcategoria', $this -> Linea -> Categoria -> Subcategoria -> read(null, $this -> params['named']['subcategoria']));
		}

		$this -> loadModel('Producto');
		$this -> paginate = array('Producto' => array('limit' => 12, 'conditions' => $conditions));
		$this -> set('productos', $this -> paginate('Producto'));
	}

	function cms_index() {
		$this -> Linea -> recursive = 0;
		$this -> set('lineas', $this -> paginate());
	}

	function cms_view($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid linea', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> set('linea', $this -> Linea -> read(null, $id));
	}

	function cms_reOrder() {
		/*
		 * Ordena las categorias se une con el widget de sortable

		 * */
		foreach ($this->data["Linea"] as $id => $posicion) {
			$this -> Linea -> id = $id;
			$this -> Linea -> saveField("posicion", $posicion);
		}

		echo "yes";
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function cms_add() {
		if (!empty($this -> data)) {
			$this -> Linea -> create();
			if ($this -> Linea -> save($this -> data)) {
				$this -> Session -> setFlash(__('The linea has been saved', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The linea could not be saved. Please, try again.', true));
			}
		}
	}

	function cms_edit($id = null) {
		if (!$id && empty($this -> data)) {
			$this -> Session -> setFlash(__('Invalid linea', true));
			$this -> redirect(array('action' => 'index'));
		}
		if (!empty($this -> data)) {
			if ($this -> Linea -> save($this -> data)) {
				$this -> Session -> setFlash(__('The linea has been saved', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The linea could not be saved. Please, try again.', true));
			}
		}
		if (empty($this -> data)) {
			$this -> data = $this -> Linea -> read(null, $id);
		}
		$this -> set('controller', 'lineas');
	}

	function cms_delete($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid id for linea', true));
			$this -> redirect(array('action' => 'index'));
		}
		if ($this -> Linea -> delete($id)) {
			$this -> Session -> setFlash(__('Linea deleted', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Linea was not deleted', true));
		$this -> redirect(array('action' => 'index'));
	}

}
?>