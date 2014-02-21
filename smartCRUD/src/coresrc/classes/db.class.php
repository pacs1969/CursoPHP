<?php
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * MySQL database wrapper class to do DML manipulations
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package Database
  * @category Classfile
  * @version $Id: db.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

class mydb
{
	public $sql;
	public $db_link;
	public $db_selected;
	public $error;

	/**
	  * Constructor function for wrapper class which establishes DB connection and DB selection. 
	  * Connection parameters and DB name is driven from configuration file 
	  */

	
	function __construct(){
		$this->sql="";
		$this->connect();		
	}

	function __destruct(){
//		mysql_close($this->db_link);		
		unset($this->sql);
	}

	function connect(){
//		echo DBHOST." user ".DBUSER." pass ".DBPASS." ".DBNAME;
		$this->db_link=mysql_connect(DBHOST,DBUSER,DBPASS);
		$this->db_selected=mysql_select_db(DBNAME);
		if(!$this->db_link OR !$this->db_selected) {
			$this->DBW_log_errors("CONNECT");			
		}
	}
	
	/**
	  * To Insert record into mysql DB
	  * @params string,array
	  * @return int|bool
	  */

	function DBW_insert($table_name,$input){// __INSERT
		foreach($input as $field_name=>$field_value){	
			if(isset($field_value)){
				$fields.=$field_name.',';
				$values.=(strpos($field_value,'()'))?$field_value.',':"'".addslashes($field_value)."'".',';
			}
		}

		$fields=rtrim($fields,",");
		$values=rtrim($values,",");
		
		$this->sql='INSERT INTO '.$table_name.' ('.$fields.') VALUES('.$values.');'."\n";
		
		if(mysql_query($this->sql)){
			$this->insert_id=mysql_insert_id();
			return $this->insert_id;
		}else{
			$this->DBW_log_errors("INSERT_RECORDS");
			return false;
		}
	}
	/**
	  * To Delete record from mysql DB
	  * @params string,string
	  * @return bool
	  */
	function DBW_delete($table_name,$con){
		$this->sql="delete from ".$table_name;
		$this->sql.=(!empty($con))?" where $con":"";
		
		if(mysql_query($this->sql)){
			return true;
		}else{
			$this->DBW_log_errors("DELETE_RECORDS");
			return false;
		}
	}
	/**
	  * To Update record into mysql DB
	  * @params string,array
	  * @return bool
	  */
	function DBW_update($table_name,$input,$con)
	{
		$sql="";
		
		foreach($input as $field_name=>$field_value){	
			if(isset($field_value)){
			$sql.=$field_name.=(strpos($field_value,'()'))?"=".addslashes($field_value).',':"='".addslashes($field_value)."',";
			}
		}

		$sql=rtrim($sql,",");
		$sql='UPDATE '.$table_name.' SET '.$sql."\n";
		$sql.=(!empty($con))?" where $con;":";";		
		$this->sql=$sql;

		if(mysql_query($sql)){
			return true;
		}else{
			$this->DBW_log_errors("UPDATE_RECORD");
			return false;
		}
	}
	/**
	  * To selects multiple records from mysql DB
	  * @params string,string,string,string,string,string,string,string
	  * @return array
	  */
	function DBW_getrows($table_name,$fields=NULL,$con=NULL,$orderbyfields=NULL,$order=NULL,$staring=NULL,$ending=NULL,$groupby=NULL)
	{
		$sql="select";
		if(!isset($fields))
		$sql.=' * ';
		else
		$sql.=' '.$fields;
		$sql.=" from $table_name";
		if(isset($con))
		$sql.=" where $con";
		if(isset($groupby))
		$sql.=" GROUP BY $groupby";
		if(isset($orderbyfields))
		$sql.=" ORDER BY $orderbyfields $order";
		if(isset($staring))
		$sql.=" LIMIT $staring,$ending";
		$this->sql=$sql;

		$output=array();
		if($result = mysql_query($sql))
		{
			$this->number_of_records=mysql_num_rows($result);
			$count=0;
			while ($row = mysql_fetch_assoc($result))
			{
				foreach($row as $key=>$val){
					$output[$count][$key]=stripslashes($val);
				}
				$count++;
			}
			mysql_free_result($result);
			return $output;
		}
		else{
			$this->DBW_log_errors("GETROWS");
			return $output;
		}
	}
	/**
	  * To selects single record from mysql DB
	  * @params string,string,string,string,string,string,string,string
	  * @return array
	  */
	function DBW_getrow($table_name,$fields=NULL,$con=NULL,$orderbyfields=NULL,$order=NULL,$staring=NULL,$ending=NULL,$groupby=NULL)
	{
		$sql="select";
		if(!isset($fields))
		$sql.=' * ';
		else
		$sql.=' '.$fields;
		$sql.=" from $table_name";
		if(isset($con))
		$sql.=" where $con";
		if(isset($groupby))
		$sql.=" GROUP BY $groupby";
		if(isset($orderbyfields))
		$sql.=" ORDER BY $orderbyfields $order";
		if(isset($staring))
		$sql.=" LIMIT $staring,$ending";
		$this->sql=$sql;

		$output=array();
		if($result = mysql_query($sql))
		{
			$this->number_of_records=mysql_num_rows($result);			
			$output = mysql_fetch_assoc($result);
			mysql_free_result($result);
			return $output;
		}else{
			$this->DBW_log_errors("GETROW");
			return false;
		}
	}
	function DBW_prepare_query($query_input){
	}
	function DBW_execute_query($sql){
		$output=array();
		if($result = mysql_query($sql))
		{
			$this->number_of_records=mysql_num_rows($result);
			$count=0;
			while ($row = mysql_fetch_assoc($result))
			{
				foreach($row as $key=>$val){
					$output[$count][$key]=stripslashes($val);
				}
				$count++;
			}
			mysql_free_result($result);
			return $output;
		}
		else{
			$this->DBW_log_errors("GETROWS");
			return $output;
		}
	}
	/**
	  * Selects number of records from mysql DB
	  * @params string,string,string,string,string,string,string,string
	  * @return int
	  */
	function get_no_of_records($table_name,$fields=NULL,$con=NULL,$orderbyfields=NULL,$order=NULL,$staring=NULL,$ending=NULL,$groupby=NULL)
	{
		$sql="select";
		if(!isset($fields))
		$sql.=' * ';
		else
		$sql.=' '.$fields;
		$sql.=" from $table_name";
		if(isset($con))
		$sql.=" where $con";
		if(isset($groupby))
		$sql.=" GROUP BY $groupby";
		if(isset($orderbyfields))
		$sql.=" ORDER BY $orderbyfields $order";
		if(isset($staring))
		$sql.=" LIMIT $staring,$ending";
		$this->sql=$sql;

		$output=array();
		if($result = mysql_query($sql))
		{
			$this->number_of_records=mysql_num_rows($result);			
			mysql_free_result($result);
			return $this->number_of_records;
		}else{
			$this->DBW_log_errors("GET_NO_OF_RECORDS");
			return false;
		}
	}
	/**
	  * To print the previuosly executed query on DB
	  */
	function DBW_printsql()
	{
		echo "<br>".$this->sql."<br>";
	}
	/**
	  * To print the error generated by the query on DB
	  */

	function DBW_show_error(){
		echo "<br>".$this->error."<br>";
	}

	function DBW_log_errors($whichfunc){
		$log_data="[".date("d-m-Y H:i:s")."]\t".$whichfunc."\t".mysql_errno()."\t".mysql_error()."\t".$_SERVER['PHP_SELF']."\n";
		if(LOG_MYSQL_ERRORS==true){
		$fp=fopen(MYSQL_ERROR_LOG_FILE,"a+");		
		fwrite($fp,$log_data);
		fclose($fp);
		}
		if(SHOW_QUERY_UPON_ERROR==true){
			$this->DBW_printsql();
		}
		if(DIE_IF_MYSQL_ERROR==true){
			die($log_data);
		}
	}

	/**
	  * Returns last insert id
	  */
	function DBW_get_insert_id(){
		return $this->insert_id;
	}

}
?>