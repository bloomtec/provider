<?php
/* Archivos Test cases generated on: 2010-09-29 16:09:56 : 1285791416*/
App::import('Controller', 'AdministracionArchivos.Archivos');

class TestArchivosController extends ArchivosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArchivosControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Archivos =& new TestArchivosController();
		$this->Archivos->constructClasses();
	}

	function endTest() {
		unset($this->Archivos);
		ClassRegistry::flush();
	}

}
?>