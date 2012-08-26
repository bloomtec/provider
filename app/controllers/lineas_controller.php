<?php
class LineasController extends AppController {

	var $name = 'Lineas';
	 var $paginate = array(
        'limit' => 10,        
        'order' => array(
            'Linea.posicion' => 'asc'
        )
    );

	function cms_index() {
		$this->Linea->recursive = 0;
		$this->set('lineas', $this->paginate());
	}

	function cms_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid linea', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('linea', $this->Linea->read(null, $id));
	}
		function cms_reOrder(){
	  /* 
	   * Ordena las categorias se une con el widget de sortable
	
	    * */
	    foreach($this->data["Linea"] as $id=>$posicion){
		    $this->Linea->id=$id;
		    $this->Linea->saveField("posicion",$posicion);
	    }
	    
	    echo "yes";
	    Configure::write('debug', 0);   
	    $this->autoRender = false;   
	    exit(); 
  	}
	function cms_add() {
		if (!empty($this->data)) {
			$this->Linea->create();
			if ($this->Linea->save($this->data)) {
				$this->Session->setFlash(__('The linea has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linea could not be saved. Please, try again.', true));
			}
		}
	}

	function cms_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid linea', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Linea->save($this->data)) {
				$this->Session->setFlash(__('The linea has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linea could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Linea->read(null, $id);
		}
	}

	function cms_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for linea', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Linea->delete($id)) {
			$this->Session->setFlash(__('Linea deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Linea was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>