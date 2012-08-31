<?php
class ProductosController extends AppController {

	var $name = 'Productos';
	
	function getBannerImages($id = null) {
		$this -> Producto -> Categoria -> recursive = 1;
		if ($id) {
			$galeria = $this -> Producto -> Categoria -> findById($id);
			return $galeria['Imagene'];
		} else {
			return false;
		}
	}

	function view($id = null) {
		$this -> layout = "front";
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid producto', true));
			$this -> redirect(array('action' => 'index'));
		}
		$producto = $this -> Producto -> read(null, $id);
		$this -> Producto -> Categoria -> recursive = -1;
		$categoria = $this -> Producto -> Categoria -> read(null, $producto['Producto']['categoria_id']);

		$this -> Producto -> Categoria -> Subcategoria -> recursive = -1;
		$subcategoria = $this -> Producto -> Categoria -> Subcategoria -> read(null, $producto['Producto']['subcategoria_id']);
		$this -> Producto -> Categoria -> Linea -> recursive = 2;
		$linea = $this -> Producto -> Categoria -> Linea -> read(null, $categoria['Categoria']['linea_id']);
		$this -> set(compact('categoria', 'subcategoria', 'linea'));
		$this -> set('producto', $producto);
		//$conditions['Producto.subcategoria_id']=$subcategoria['Subcategoria']['id'];
		$conditions['Producto.categoria_id'] = $categoria['Categoria']['id'];

		$this -> loadModel('Producto');
		$this -> paginate = array('Producto' => array('limit' => 2000, 'conditions' => $conditions));
		$this -> set('productos', $this -> paginate('Producto'));
	}

	function cms_index() {
		$this -> Producto -> recursive = 0;

		$linea = (isset($this -> params['named']['linea']) && !empty($this -> params['named']['linea'])) ? $this -> params['named']['linea'] : null;
		$categoria = (isset($this -> params['named']['categoria']) && !empty($this -> params['named']['categoria'])) ? $this -> params['named']['categoria'] : null;
		$subcategoria = (isset($this -> params['named']['subcategoria']) && !empty($this -> params['named']['subcategoria'])) ? $this -> params['named']['subcategoria'] : null;
		$categorias = $this -> Producto -> Subcategoria -> Categoria -> find('list', array("conditions" => array("linea_id" => $linea), 'fields' => array('id', 'id')));
		$subcategorias = $this -> Producto -> Subcategoria -> find('list', array("conditions" => array("categoria_id" => $categoria), 'fields' => array('id', 'id')));
		if (isset($linea)) {
			if ($categoria && $subcategoria) {
				$this -> set('productos', $this -> paginate(array('Producto.subcategoria_id' => $subcategoria)));
			} else {
				$this -> set('productos', $this -> paginate(array('Producto.categoria_id' => $categorias)));
			}
		} else {
			$this -> set('productos', $this -> paginate());
		}
		$lineas = $this -> Producto -> Subcategoria -> Categoria -> Linea -> find('list');

		$this -> set(compact('categorias', 'fotos', 'opcionesFotos', 'subcategorias', 'lineas', 'linea', 'categoria', 'subcategoria'));
	}

	function info() {
		/*
		 * devuelve la informacion del producto.
		 1) parametros=> data[Producto][id]: id de la categoria.

		 * */
		$this -> Producto -> recursive = -1;
		$producto = $this -> Producto -> read(null, $this -> data["Producto"]["id"]);
		echo json_encode($producto);
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function cms_view($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid producto', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> set('producto', $this -> Producto -> read(null, $id));
	}

	function cms_add() {
		//debug($this->data);
		if (!empty($this -> data)) {
			//$productosGuardados=0;
			//	foreach($this->data["Producto"] as $producto){
			/*if(!empty($producto["nombre"])&&!empty($producto["beneficios"])){
			 $this->Producto->id=0;		*/
			$this -> Producto -> create();
			//	debug($producto);
			if ($this -> Producto -> save($this -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el Producto', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('El producto no se pudo guardar. Por favor, intente de nuevo.', true));
			}

			//}

			//	}
			/*if($productosGuardados)$this->Session->setFlash(__('Se han guardado '.$productosGuardados." Productos", true));
			 $this->redirect(array('action' => 'index'));*/
		}
		App::import('Core', 'Folder');
		$fotos = '';
		$fotosFolder = &new Folder(WWW_ROOT . '/img/productos/');
		$fotos = $fotosFolder -> read();
		$opcionesFotos = array();
		foreach ($fotos[1] as $foto) {
			if (isset($foto))
				$opcionesFotos["productos/" . $foto] = $foto;
		}

		$lineas = $this -> Producto -> Subcategoria -> Categoria -> Linea -> find('list');
		$this -> set(compact('categorias', 'fotos', 'opcionesFotos', 'lineas'));
	}

	function cms_edit($id = null) {
		if (!$id && empty($this -> data)) {
			$this -> Session -> setFlash(__('Invalid producto', true));
			$this -> redirect(array('action' => 'index'));
		}
		if (!empty($this -> data)) {
			if ($this -> Producto -> save($this -> data)) {
				$this -> Session -> setFlash(__('Producto modificado', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo modificar el producto. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this -> data)) {
			$this -> data = $this -> Producto -> read(null, $id);
		}
		$fotos = '';
		$fotosFolder = &new Folder(WWW_ROOT . '/img/productos/');
		$fotos = $fotosFolder -> read();
		$opcionesFotos = array();
		foreach ($fotos[1] as $foto) {
			if (isset($foto))
				$opcionesFotos["productos/" . $foto] = $foto;
		}
		$categorias = $this -> Producto -> Subcategoria -> Categoria -> find('list');
		$subcategorias = $this -> Producto -> Subcategoria -> find('list', array("conditions" => array("categoria_id" => $this -> data["Producto"]["categoria_id"])));
		$lineas = $this -> Producto -> Subcategoria -> Categoria -> Linea -> find('list');
		$this -> set(compact('categorias', 'fotos', 'opcionesFotos', 'subcategorias', 'lineas'));
		$this -> set('controller', 'productos');
	}

	function cms_delete($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid id for producto', true));
			$this -> redirect(array('action' => 'index'));
		}
		if ($this -> Producto -> delete($id)) {
			$this -> Session -> setFlash(__('Producto borrado', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar el producto. Por favor, intente de nuevo ', true));
		$this -> redirect(array('action' => 'index'));
	}

	function getByCategory() {
		$categoriaId = $this -> params["form"]["categoria_id"];
		$productos = $this -> Producto -> find("all", array("conditions" => array("Producto.categoria_id" => $categoriaId)));
		debug($productos);
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function getBySubCategory() {
		$subcategoriaId = $this -> params["form"]["subcategoria_id"];
		$productos = $this -> Producto -> find("all", array("conditions" => array("Producto.subcategoria_id" => $subcategoriaId)));
		debug($productos);
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function cms_reOrderEnCategoria() {
		/*
		 * Ordena los producto en una categoría

		 * */
		foreach ($this->data["Producto"] as $id => $posicion) {
			$this -> Producto -> id = $id;
			$this -> Producto -> saveField("orden_en_categoria", $posicion);
		}

		echo "yes";
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

	function cms_reOrderEnSubcategoria() {
		/*
		 * Ordena los producto en una subcategoría

		 * */
		foreach ($this->data["Producto"] as $id => $posicion) {
			$this -> Producto -> id = $id;
			$this -> Producto -> saveField("orden_en_subcategoria", $posicion);
		}

		echo "yes";
		Configure::write('debug', 0);
		$this -> autoRender = false;
		exit();
	}

}
?>