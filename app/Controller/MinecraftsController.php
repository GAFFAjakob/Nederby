<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MinecraftsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Minecraft';

/**
 *
 * @var array
 */
	public $uses = array('MinecraftLog', 'User');

/**
 * Displays the index/Welcome screen
 *
 * @param mixed What page to display
 * @return void
 */
	public function index(){
		//Controller::loadModel('MinecraftLog');

		$user_logs = $this->MinecraftLog->find('all');
		

		$file = 'D:\ServerFolders\Documents\Games\Minecraft\server.log';
		$lines = array();
		$linecount = 0;
		$handle = fopen($file, "r");
		while(!feof($handle)){
		  $line = fgets($handle);
		  $lines[$linecount] = htmlentities($line);
		  $linecount++;
		}

		fclose($handle);

		$this->set("lineCount", $linecount);
		$this->set("lines", array_reverse($lines));
		$this->set("userLogs", $user_logs);
		
		
	}
	
	public function map(){
		$this->layout="minecraftmap";
	}
}
