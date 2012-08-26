<?php
class SubcategoriasController extends AppController {

	var $name = 'Subcategorias';
  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow("info","obtenerProductos");
  }
	function index() {
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
  
  function obtenerProductos(){// devuelve n productos  de una subcategoria como objeto json
    /* 
   * devuelve n productos  de una subcategoria como objeto json. 
    1) parametros=> data["Subcategoria"]["id"]: id de la categoria, data["limit"]:numero de registros a devolver,data["page"]:pagina a devolver.
    2) los productos en el arreglo productos con un campo adicional productos["paginas"] numero total de paginas.
    * */
    $n=$this->data["limit"];
    $this->Subcategoria->Producto->recursive=0;
   // $productos=$this->Subcategoria->Producto->find("all",array("conditions"=>array("subcategoria_id"=>$this->data["Subcategoria"]["id"]),"limit"=>$n,"page"=>$this->data["pagina"]));
    $productos=$this->Subcategoria->Producto->find("all",array("conditions"=>array("subcategoria_id"=>$this->data["Subcategoria"]["id"]),"order"=>"Producto.orden_en_subcategoria ASC"));
    echo json_encode($productos);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
  
	function ordenar_productos($subcategoryId){
	  	$this->Subcategoria->bindModel(array("hasMany"=>array(
	  		"Producto"=>array(
	  			"order"=>"Producto.orden_en_subcategoria ASC"
	  			)
	  		)
	  	));
	  	$subcategoria=$this->Subcategoria->read(null,$subcategoryId);
	  	$this->set(compact("subcategoria"));
	}
	
	function getList($categoriaId){
		echo json_encode($this -> Subcategoria -> find('list',array('conditions'=>array('categoria_id' => $categoriaId))));	
		$this -> autoRender=false;
		exit(0);
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Subcategoría no valida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('subcategoria', $this->Subcategoria->read(null, $id));
	}

	function add() {
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

	function edit($id = null) {
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
		
		/*$categorias = $this->Subcategoria->Categoria->find('list');
		$this->set(compact('categorias'));*/
	}

	function delete($id = null) {
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
	function admin_index() {
		$this->Subcategoria->recursive = 0;
		$this->set('subcategorias', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid subcategoria', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('subcategoria', $this->Subcategoria->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Subcategoria->create();
			if ($this->Subcategoria->save($this->data)) {
				$this->Session->setFlash(__('The subcategoria has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategoria could not be saved. Please, try again.', true));
			}
		}
		$categorias = $this->Subcategoria->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid subcategoria', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Subcategoria->save($this->data)) {
				$this->Session->setFlash(__('The subcategoria has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategoria could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Subcategoria->read(null, $id);
		}
		$categorias = $this->Subcategoria->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for subcategoria', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Subcategoria->delete($id)) {
			$this->Session->setFlash(__('Subcategoria deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Subcategoria was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>