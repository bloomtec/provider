<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/autenticacion', array('controller' => 'usuarios',"action"=>"login", 'plugin'=>"autenticacion_simple","cms"=>true));
	Router::connect('/cms', array('controller' => 'lineas', 'action' => 'index','cms'=>true));		
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/index', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/nuestra_empresa', array('controller' => 'pages', 'action' => 'nuestra_empresa'));
	Router::connect('/clientes', array('controller' => 'pages', 'action' => 'clientes'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/linea/*', array('controller' => 'lineas', 'action' => 'view'));
	//Router::connect('/productos/index/*', array('action' => 'index'));

	//Router::connect('/admin', array('controller' => 'documentos', 'action' => 'index', "plugin"=>"administracion_archivos","admin"=>true));
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
