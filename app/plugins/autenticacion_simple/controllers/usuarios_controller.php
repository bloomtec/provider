<?php
class UsuariosController extends AutenticacionSimpleAppController {

	var $name = 'Usuarios';
	var $components = array('Auth');

	function beforeFilter() {
		//debug($this->action);
		parent::beforeFilter();
		$this -> Auth -> allow("cms_login", "cms_logout");
		//Este es el codigo de esta autenticacion
		/*
		 $this->Auth->userModel = 'Usuario';
		 $this->Auth->loginError = "Nombre de usuario o password no validos";
		 $this->Auth->authError = "No tiene permisos para ingresar a esta sección";

		 $this->Auth->fields = array(
		 'username' => 'nombre_de_usuario',
		 'password' => 'password'
		 );
		 $this->Auth->loginAction = array('controller' => 'usuarios', 'action' => 'login',"admin"=>true,'plugin'=>'autenticacion_simple');
		 */
	}

	function index() {
		$this -> Usuario -> recursive = 0;
		$this -> set('Usuarios', $this -> paginate());
	}

	function login() {
		$this -> layout = "login";
	}

	function logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	function cms_login() {
		$this -> layout = "login";
	}

	function cms_logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	function cms_index() {
		$this -> Usuario -> recursive = 0;
		//$documentos=$this->Usuario->Documento->find("list",array("fields"=>array("id","nombre")));
		$this -> set('Usuarios', $this -> paginate());
	}

	function cms_view($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid Usuario', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> set('Usuario', $this -> Usuario -> read(null, $id));
	}

	function cms_add() {
		if ($this -> data) {
			if ($this -> data['Usuario']['password'] == $this -> Auth -> password($this -> data['Usuario']['password_'])) {
				$this -> Usuario -> create();
				$this -> Usuario -> save($this -> data);
				$this -> Session -> setFlash(__("El Usuario ha sido creado exitosamente", true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__("Las contraseñas no coinciden", true));
				$this -> data['Usuario']['password'] = $this -> data['Usuario']['password_'] = "";
			}
		}
	}

	function cms_add2() {
		if (!empty($this -> data)) {
			$this -> Usuario -> create();
			if ($this -> Usuario -> save($this -> data)) {
				$this -> Session -> setFlash(__('The Usuario has been saved', true));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The Usuario could not be saved. Please, try again.', true));
			}
		}
		$extensiones = $this -> Usuario -> Extension -> find('list');
		$this -> set(compact('extensiones'));
	}

	function cms_edit($id = null) {
		$id = 1;
		$usuario = $this -> Usuario -> read(null, $id);
		if (!$id && empty($this -> data)) {
			$this -> Session -> setFlash(__('Invalid Usuario', true));
			$this -> redirect(array('action' => 'index'));
		}

		if ($this -> data) {
			// debug($this->Auth->password($this->data["Usuario"]["password_actual"]));
			if ($this -> Auth -> password($this -> data["Usuario"]["password_actual"]) == $usuario['Usuario']['password']) {// escribio el antiguo password bien
				if ($this -> data['Usuario']['password'] == $this -> data['Usuario']['password_']) {
					$this -> data['Usuario']['password'] = $this -> Auth -> password($this -> data['Usuario']['password']);
					$this -> Usuario -> create();
					$this -> Usuario -> save($this -> data);
					$this -> Session -> setFlash(__("Se ha cambiado la contraseña del usuario", true));
					$this -> redirect("/");
				} else {
					$this -> Session -> setFlash(__("Las contraseñas no coinciden", true));
					$this -> data['Usuario']['password'] = $this -> data['Usuario']['password_'] = "";
				}
			} else {
				$this -> Session -> setFlash(__("Verifique el password actual actual", true));
				$this -> data['Usuario']['password'] = $this -> data['Usuario']['password_'] = "";
			}

		}
		if (empty($this -> data)) {
			$this -> data = $usuario;
			$this -> data['Usuario']['password'] = "";
		}

	}

	function cms_delete($id = null) {
		$this -> layout = "login";
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid id for Usuario', true));
			$this -> redirect(array('action' => 'index'));
		}
		if ($this -> Usuario -> delete($id)) {
			$this -> Session -> setFlash(__('Usuario deleted', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Usuario was not deleted', true));
		$this -> redirect(array('action' => 'index'));
	}

}
?>