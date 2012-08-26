<?php
class CategoriasController extends AppController {

	var $name = 'Categorias';
	 var $paginate = array(
        'limit' => 10,        
        'order' => array(
            'Categoria.posicion' => 'asc'
        )
    );
	
  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow("pruebas","menu","info","obtenerProductos","obtenerSubcategorias",'linea');
  }
  function pruebas(){
    
  }
	function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->paginate());
	}
  function menu(){// devuelve el arreglo de categorias como objeo json;
    $this->Categoria->bindModel(array("hasMany" => array(
    'Subcategoria' => array(
      'className' => 'Subcategoria',
      'foreignKey' => 'categoria_id',
      'dependent' => false,
      'conditions' => array("Subcategoria.nombre <>"=>"ninguna"),
    ))));
    $categorias=$this->Categoria->find("all",array('order' => array(
            'Categoria.posicion' => 'asc'
        )));
    echo json_encode($categorias);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
   function linea($linea){// devuelve el arreglo de categorias como objeo json;
    $this->Categoria->bindModel(array("hasMany" => array(
    'Subcategoria' => array(
      'className' => 'Subcategoria',
      'foreignKey' => 'categoria_id',
      'dependent' => false,
      'conditions' => array("Subcategoria.nombre <>"=>"ninguna"),
    ))));
    $categorias=$this->Categoria->find("all",array(
    		'order' => array('Categoria.posicion' => 'asc'),
    		'conditions' => array("Categoria.linea_id"=>$linea)
		));
    echo json_encode($categorias);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
  function info(){
  /* 
   * devuelve la informacion de la categoria. 
    1) parametros=> data["Categoria"]["id"]: id de la categoria.

    * */
    $this->Categoria->recursive=-1;
    $categoria=$this->Categoria->read(null,$this->data["Categoria"]["id"]);
    echo json_encode($categoria);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
  function obtenerProductos(){
  /* 
   * devuelve n productos  de una categoria como objeto json. 
    1) parametros=> data["Categoria"]["id"]: id de la categoria, data["limit"]:numero de registros a devolver,data["page"]:pagina a devolver.
    2) los productos en el arreglo productos con un campo adicional productos["paginas"] numero total de paginas.
    * */
    $n=$this->data["limit"];
    $this->Categoria->Producto->recursive=-1;
   // $productos=$this->Categoria->Producto->find("all",array("conditions"=>array("categoria_id"=>$this->data["Categoria"]["id"]),"limit"=>$n,"page"=>$this->data["pagina"]));
    $productos=$this->Categoria->Producto->find("all",array("conditions"=>array("categoria_id"=>$this->data["Categoria"]["id"]),"order"=>"Producto.orden_en_categoria ASC"));
    echo json_encode($productos);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
  function obtenerSubcategorias(){
    $categorias=$this->Categoria->Subcategoria->find("all",array("conditions"=>array("categoria_id"=>$this->data["Categoria"]["id"],"Subcategoria.nombre <>"=>"ninguna")));
    echo json_encode($categorias);
    Configure::write('debug', 0);   
    $this->autoRender = false;   
    exit(); 
  }
  function ordenar_productos($categoryId){
  	$this->Categoria->bindModel(array("hasMany"=>array(
  		"Producto"=>array(
  			"order"=>"Producto.orden_en_categoria ASC"
  			)
  		)
  	));
  	$categoria=$this->Categoria->read(null,$categoryId);
  	$this->set(compact("categoria"));
  }
  	function reOrder(){
	  /* 
	   * Ordena las categorias se une con el widget de sortable
	
	    * */
	    foreach($this->data["Categoria"] as $id=>$posicion){
	    $this->Categoria->id=$id;
	    $this->Categoria->saveField("posicion",$posicion);
	    }
	    
	    echo "yes";
	    Configure::write('debug', 0);   
	    $this->autoRender = false;   
	    exit(); 
  	}
	
	function getList($lineaId=null){
		echo json_encode($this -> Categoria -> find('list',array('conditions'=>array('linea_id' => $lineaId))));
		$this -> autoRender=false;
		exit(0);
			
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Categorìa no válida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoria', $this->Categoria->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->data)) {
				$this->Session->setFlash(__('La categoría ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar la categoría. Por favor, intente de nuevo.', true));
			}
		}
		App::import('Core','Folder');
		$fotos= '';
		$fotosFolder =& new Folder(WWW_ROOT.'/img/categorias/');
		$fotos=$fotosFolder->read();
		$opcionesFotos=array();
		foreach($fotos[1] as $foto){
			if(isset($foto)) $opcionesFotos["categorias/".$foto]=$foto;
		}
		$lineas = $this -> Categoria -> Linea -> find('list');
		$this->set(compact("opcionesFotos",'lineas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid categoria', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Categoria->save($this->data)) {
				$this->Session->setFlash(__('La categoría ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar la categoría. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Categoria->read(null, $id);
		}
		App::import('Core','Folder');
		$fotos= '';
		$fotosFolder =& new Folder(WWW_ROOT.'/img/categorias/');
		$fotos=$fotosFolder->read();
		$opcionesFotos=array();
		foreach($fotos[1] as $foto){
			if(isset($foto)) $opcionesFotos["categorias/".$foto]=$foto;
		}
		$lineas = $this -> Categoria -> Linea -> find('list');
		$this->set(compact("opcionesFotos",'lineas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Categoría no válida', true));
			$this->redirect(array('action'=>'index'));
		}
    $this->Categoria->Producto->deleteAll(array("Producto.categoria_id"=>$id));
    $this->Categoria->Subcategoria->deleteAll(array("Subcategoria.categoria_id"=>$id));
		if ($this->Categoria->delete($id)) {
			$this->Session->setFlash(__('Categoría borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar la categoría. Por favor, intente de nuevo.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getSubcategorias(){
		$categoriaId=$this->params["form"]["categoria_id"];
		$subcategorias=$this->Categoria->Subcategoria->find("list",array("conditions"=>array("Subcategoria.categoria_id"=>$categoriaId)));	
		$opciones="";
			foreach($subcategorias as $id=>$nombre){
			$opciones.='<option value="'.$id.'">'.$nombre.'</option>';
			}
		echo $opciones;
		Configure::write('debug', 0);   
	    $this->autoRender = false;   
	    exit();
	}
}
?>