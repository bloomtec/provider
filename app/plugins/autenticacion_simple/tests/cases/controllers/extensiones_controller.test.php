<?php
/* Extensiones Test cases generated on: 2010-09-29 16:09:22 : 1285791442*/
App::import('Controller', 'AdministracionArchivos.Extensiones');

class TestExtensionesController extends ExtensionesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ExtensionesControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Extensiones =& new TestExtensionesController();
		$this->Extensiones->constructClasses();
	}

	function endTest() {
		unset($this->Extensiones);
		ClassRegistry::flush();
	}

}
?>