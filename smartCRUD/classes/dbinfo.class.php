<?
#DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * Class for extraction db,table details for the given info
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Form
  * @subpackage	MyZEND.FormManagement  
  * @category Classfile
  * @version $Id: dbinfo.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

class dbinfo extends class_base{
	protected $server;
	protected $db;
	protected $table;

	private $dbcid;
	public $tblinfo;
	public $tables;

	public function init(){
		$this->server=!empty($_POST['DBHOST'])?$_POST['DBHOST']:$_SESSION['dbhost'];
		$this->db=!empty($_POST['DBNAME'])?$_POST['DBNAME']:$_SESSION['dbname'];
		$this->table="";
		$this->tblinfo=array();
		$this->tables=array();
	
	}//constructor

	public function dispose(){
		mysql_close($this->dbcid);
	}//constructor
	function is_connected(){
		$dbuser=!empty($_POST['DBUSERNAME'])?$_POST['DBUSERNAME']:$_SESSION['dbuser'];
		$dbpass=!empty($_POST['DBPASSWORD'])?$_POST['DBPASSWORD']:$_SESSION['dbpass'];
		
    	$this->dbcid=mysql_connect($this->server,$dbuser,$dbpass);
		
		mysql_select_db($this->db);

		if(mysql_error()){			
			return false;
		}else{
			return true;
		}
	}

	public function gettbls(){
		$result=mysql_list_tables($this->db,$this->dbcid);
		while($data=mysql_fetch_row($result)){
			$this->tables[$data[0]]=$data[0];
		}
		return $this->tables;
	}

	public function get_tbldetails($table=""){
		$this->table=$table;
		if ($this->dbcid && $this->db){
			$result = mysql_list_fields($this->db,$this->table);
			$this->tblinfo['table'] = mysql_field_table($result, $i);
			$this->tblinfo['total_fields']=mysql_num_fields($result);
			$this->tblinfo['total_rows']= mysql_num_rows($result);
			$this->get_extra();
			$i = 0;

			while ($i < $this->tblinfo['total_fields']) {

				$this->tblinfo['fields'][$i]['name']  = mysql_field_name  ($result, $i);
				//	$this->tblinfo['fields'][$i]['type']  = mysql_field_type  ($result, $i);
				$this->tblinfo['fields'][$i]['length']   = mysql_field_len   ($result, $i);

				$this->tblinfo['fields'][$i]['auto_increment'] = 0;
				$this->tblinfo['fields'][$i]['unique'] = 0;
				$this->tblinfo['fields'][$i]['primary'] = 0;

				$this->tblinfo['fields'][$i]['flags'] = mysql_field_flags ($result, $i);

				if (!strpos($this->tblinfo['fields'][$i]['flags'],"auto_inc") < 1){
					$this->tblinfo['fields'][$i]['auto_increment'] = 1;
				}
				if (strpos($this->tblinfo['fields'][$i]['flags'],"primary") >-1){
					$this->tblinfo['fields'][$i]['primary'] = 1;
					$this->tblinfo['primary']=$this->tblinfo['fields'][$i]['name'];
				}
				if (strpos($this->tblinfo['fields'][$i]['flags'],"unique") >-1){
					$this->tblinfo['fields'][$i]['unique'] = 1;
				}
				$this->tblinfo['fields'][$i]['flags']=explode(" ",$this->tblinfo['fields'][$i]['flags']);
				$i++;
			}
		}
		mysql_free_result($result);

		return $this->tblinfo;
	}



	function get_extra(){
		$result = mysql_query('SHOW COLUMNS FROM '.$this->table);

		if (!$result) {
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		while($data=mysql_fetch_assoc($result)){
			$this->tblinfo['fields'][$i]['Type']=$data['Type'];
			if(substr($data['Type'],0,4)=="enum"){
				//			echo ;
				$this->tblinfo['fields'][$i]['enumvals']=split(",",str_replace("'","",substr($data['Type'],6,strlen($data['Type'])-7)));
				//die;
			}
			$i++;
		}
		mysql_free_result($result);
	}
}
