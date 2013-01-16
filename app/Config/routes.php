<?php

	Router::connect('/', array('controller' => 'pages', 'action' => 'frontpage', 'home'));
	Router::connect('/pages/display', array('controller' => 'pages', 'action' => 'display'));

	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';