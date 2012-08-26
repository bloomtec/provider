<?php
/* Extension Test cases generated on: 2010-09-29 16:09:03 : 1285791483*/
App::import('Model', 'AdministracionArchivos.Extension');

class ExtensionTestCase extends CakeTestCase {
	function startTest() {
		$this->Extension =& ClassRegistry::init('Extension');
	}

	function endTest() {
		unset($this->Extension);
		ClassRegistry::flush();
	}

}
?>