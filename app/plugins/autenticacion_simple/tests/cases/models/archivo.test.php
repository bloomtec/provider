<?php
/* Archivo Test cases generated on: 2010-09-29 16:09:11 : 1285791491*/
App::import('Model', 'AdministracionArchivos.Archivo');

class ArchivoTestCase extends CakeTestCase {
	function startTest() {
		$this->Archivo =& ClassRegistry::init('Archivo');
	}

	function endTest() {
		unset($this->Archivo);
		ClassRegistry::flush();
	}

}
?>