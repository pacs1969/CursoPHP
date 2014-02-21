<?php
#####DOCUMENT HEADER######
/**
  * @desc Base class for all the classes in application to access the common functionality
  * @author Murugan krishnamoorthy <phpinbox@gmail.com>
  * @version $Id: class_base.class.php, v 1.0 2007/01/01
  * @package classes
  */
#####DOCUMENT HEADER######

class class_base
{
	public $dbObj;
	public $reqarray;
	
	public function __construct(){
	$this->request_vars=request_wrapper::get_request_vars(); // Right now this no need to be implemented,
														     //since the php files derives its own request var 
	
	$this->db_connect();// not required as of now
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