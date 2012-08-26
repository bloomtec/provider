<?php
/* Documentos Test cases generated on: 2010-09-29 20:09:42 : 1285804842*/
App::import('Controller', 'AdministracionArchivos.Documentos');

class TestDocumentosController extends DocumentosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class DocumentosControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Documentos =& new TestDocumentosController();
		$this->Documentos->constructClasses();
	}

	function endTest() {
		unset($this->Documentos);
		ClassRegistry::flush();
	}

}
?>