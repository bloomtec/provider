<?php
/* Documento Test cases generated on: 2010-09-29 20:09:31 : 1285804831*/
App::import('Model', 'AdministracionArchivos.Documento');

class DocumentoTestCase extends CakeTestCase {
	function startTest() {
		$this->Documento =& ClassRegistry::init('Documento');
	}

	function endTest() {
		unset($this->Documento);
		ClassRegistry::flush();
	}

}
?>