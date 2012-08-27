<?php
class BannersController extends AppController {

	var $name = 'Banners';
	
	function get($page = null) {
		if($page) {
			$banner = $this -> Banner -> findByNombre($page); //debug($banner['Imagene']);
			return $banner['Imagene'];
		} else {
			return false;
		}
	}
	
	function cms_index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->paginate());
	}
	
	function cms_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid banner', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Banner->save($this->data)) {
				$this->Session->setFlash(__('The banner has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Banner->read(null, $id);
		}
		$this -> set('controller', 'banners');
	}

	/* function cms_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid banner', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}

	function cms_add() {
		if (!empty($this->data)) {
			$this->Banner->create();
			if ($this->Banner->save($this->data)) {
				$this->Session->setFlash(__('The banner has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.', true));
			}
		}
	} */

}
?>