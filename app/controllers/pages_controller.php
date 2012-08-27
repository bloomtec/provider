<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/958/The-Pages-Controller
 */
class PagesController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 * @access public
	 */
	var $name = 'Pages';

	/**
	 * Default helper
	 *
	 * @var array
	 * @access public
	 */
	var $helpers = array('Html', 'Session');

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 * @access public
	 */
	var $uses = array();

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @access public
	 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this -> redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this -> set(compact('page', 'subpage', 'title_for_layout'));
		$this -> render(implode('/', $path));
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this -> layout = 'front';
		$this -> Auth -> allow('*');
	}

	function home() {

	}

	function nuestra_empresa() {

	}

	function clientes() {

	}

	function contact() {
		
		if($this -> data) {			
			// multiple recipients
			$to  = 'juliodominguez@gmail.com'; //'oficina_principal@provider.com.co';
			
			// subject
			$subject = 'Solicitud de contacto PROVIDER :: ' . $this -> data['Email']['sub'];
			
			// message
			$message = '
			<html>
			<head>
			  <title>Solicitud de contacto PROVIDER</title>
			</head>
			<body>
			  <p>Datos de contacto</p>
			  <table>
			  	<tr>
			    	<td>Asunto<td>
			    	<td>' . $this -> data['Email']['sub'] . '</td>
			    </tr>
			    <tr>
			    	<td>Nombre<td>
			    	<td>' . $this -> data['Email']['name'] . '</td>
			    </tr>
			    <tr>
			    	<td>Apellido<td>
			    	<td>' . $this -> data['Email']['lastname'] . '</td>
			    </tr>
			    <tr>
			    	<td>Empresa<td>
			    	<td>' . $this -> data['Email']['empresa'] . '</td>
			    </tr>
			    <tr>
			    	<td>Cargo<td>
			    	<td>' . $this -> data['Email']['cargo'] . '</td>
			    </tr>
			    <tr>
			    	<td>Teléfono<td>
			    	<td>' . $this -> data['Email']['phone'] . '</td>
			    </tr>
			    <tr>
			    	<td>Celular<td>
			    	<td>' . $this -> data['Email']['cel'] . '</td>
			    </tr>
			    <tr>
			    	<td>Correo electrónico<td>
			    	<td>' . $this -> data['Email']['email'] . '</td>
			    </tr>
			    <tr>
			    	<td>País<td>
			    	<td>' . $this -> data['Email']['pais'] . '</td>
			    </tr>
			    <tr>
			    	<td>Ciudad<td>
			    	<td>' . $this -> data['Email']['city'] . '</td>
			    </tr>
			    <tr>
			    	<td>Página web<td>
			    	<td>' . $this -> data['Email']['url'] . '</td>
			    </tr>
			    <tr>
			    	<td>Página web<td>
			    	<td>' . $this -> data['Email']['text'] . '</td>
			    </tr>
			  </table>
			</body>
			</html>
			';
			
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To: Provider <oficina_principal@provider.com.co>' . "\r\n";
			$headers .= 'From: Página de contacto PROVIDER <oficina_principal@provider.com.co>' . "\r\n";
			
			// Mail it
			mail($to, $subject, $message, $headers);
			$this -> Session -> setFlash(__('Se ha enviado la información de contacto', true));
			$this -> redirect('/contact');
		}
	}

}
