<?php
class AppController extends Controller {
	var $uses = array("Config", "Autenticacion");
	var $components = array("Auth", "Session");
	function beforeFilter() {
		$config = $this -> Config -> read(null, 1);
		//Lee la configuraciòn
		$this -> autenticacion($config);
		//$this -> Auth -> allow("*");
		$this -> Auth -> allow("view", "index", "info", "obtenerProductos", "display", "home", "nuestra_empresa", "clientes", "contact", "get", "getBannerImages");
		// debug($this->action);
	}

	function autenticacion($config) {//  ejecuta la configuracion de la autenticación
		//Configura la ruta para que no se vea toda la ruta sino qeu solo aparezca autenticacion
		//Router::connect('/autenticacion', array('controller' => 'usuarios',"action"=>"login", 'plugin'=>$config["Autenticacion"]["nombre"],"admin"=>true));
		$this -> Auth -> loginRedirect = '/cms/productos/index';
		$this -> Auth -> logoutRedirect = '/autenticacion';
		if ($config["Config"]["autenticacion_id"]) {
			eval($config["Autenticacion"]["codigo_configuracion"]);
			//Ejecuta el codigo de configuracion de la autenticaciòn
		}
	}

	function getList() {
		return $this -> {$this -> modelNames[0]} -> find("list");
	}

}
?>