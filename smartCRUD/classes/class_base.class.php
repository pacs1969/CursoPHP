<?php
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * Base class for all the classes to access the common functionalities
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Form
  * @subpackage	MyZEND.FileManagement  
  * @category ClassFile
  * @version $Id: class_base.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

class class_base
{
	public $dbObj;
	public $reqarray;

	public function __construct(){
		$this->request_vars=request_wrapper::get_request_vars(); // Right now this no need to be implemented,
		//since the php files derives its own request var

		//$this->db_connect(); not required as of now
		$this->init();
	}

	public function __destruct(){
		unset($this->dbObj);
		$this->dispose();
	}

	// Base class constructors and destructors

	function init(){;}
	function dispose(){;}

	public function db_connect(){
		$registry=registry::getInstance();
		$this->dbObj=$registry->get('dbObj');

		if(!$this->dbObj){
			$this->dbObj=& new mydb();
			$registry->set('dbObj',$this->dbObj);
		}
	}
}

class registry {
	var $_objects = array();

	function set($name, $object) {
		if(is_object($object)){
			$this->_objects[$name]=$object;
		}
	}
	function get($name) {
		return (is_object($this->_objects[$name]))?$this->_objects[$name]:false;
	}
	function getInstance() {
		static $me;

		if (is_object($me) == true) {
			return $me;
		}
		$me = new Registry;
		return $me;
	}
}

// Request vars sanitizing script comes here
class request_wrapper{
	function __construct(){
	}
	function __destruct(){
	}

	public function get_request_vars(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			//do sanitization and die if required
			return $_GET;
		}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
			//do sanitization and die if required
			return $_POST;
		}else{
			return $_REQUEST;
		}
	}

}
?>