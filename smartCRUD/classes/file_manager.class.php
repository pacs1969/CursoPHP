<?
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * File Manager - File Manager class
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Form
  * @subpackage	MyZEND.FileManagement  
  * @category ClassFile
  * @version $Id: file_manager.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

class file_manager{
	protected $fp;

	function __construct(){
		$this->fp="";
	}//constructor

	function __destruct(){
	}//destructor
	/**
	 * For writing files - the main objective behind this is to have centralized control
	 * @param string - file name
	 * @param string - content to be written
	 */
	function writethis($file,$string){
		if(file_exists($file)){
			unlink($file);
		}
		$this->fp=fopen($file,"w");
		if(!$this->fp){
		header('Location:'.SITE_URL.'forms.php?filecreation=failed');
		}
		fwrite($this->fp,$string);
		fclose($this->fp);
	}

	/**
	 * For reading files - the main objective behind this is to have centralized control
	 * @param string - file name
	 * @return string - file content 
	 */

	function readthis($file){
		$returnstr = file_get_contents($file);
		return $returnstr;
	}
}
?>