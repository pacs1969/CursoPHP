<?php
#####DOCUMENT HEADER######
/**
  * @desc MySQL database wrapper class to do DML manipulations
  * @copyright Copyright (C) 2007 Murugan krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan krishnamoorthy <phpinbox@gmail.com>
  * @version $Id: db.class.php, v 1.0 2007/01/01
  * @package Database
  */
#####DOCUMENT HEADER######

class mydb
{
	public $sql;
	public $db_link;
	public $db_selected;
	public $error;
	public $safesql;

	/**
	  * Constructor function for wrapper class which establishes DB connection and DB selection. 
	  * Connection parameters and DB name is driven from configuration file 
	  */

	
	function __construct(){
		$this->sql="";
		$this->connect();	
		$this->safesql=true;
	}

	function __destruct(){
		mysql_close($this->db_link);		
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
	$fields='';
	$values='';
	$function_fields=array('now()','CURDATE()','CURTIME()');

		foreach($input as $field_name=>$field_value){	
			if(!empty($field_value)){
				if($this->safesql==true){
				$field_value=$this->safeSQL($field_value);
				}
				$fields.='`'.$field_name.'`,';
				$values.=(in_array($field_value,$function_fields))?$field_value.',':"'".addslashes($field_value)."'".',';
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
		$function_fields=array('now()','CURDATE()','CURTIME()');
		$sql="";
		
		foreach($input as $field_name=>$field_value){	
			if(!empty($field_value)){
			$field_value=$this->safeSQL($field_value);
			$sql.=$field_name.=(in_array($field_value,$function_fields))?"=".$field_value.',':"='".addslashes($field_value)."',";
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
			//development use
		if(SHOW_QUERY_UPON_ERROR==true){
			$this->DBW_printsql();
		}else{		
			//production use
			show_user_error(3);
		}
	}

	/**
	  * Returns last insert id
	  */
	function DBW_get_insert_id(){
		return $this->insert_id;
	}

	
	/** 
	  * Try to convert to plaintext
	  * @access protected
	  * @param String $source
	  * @return String $source
	  */
	function decode($source) {
		// url decode
		$source = html_entity_decode($source, ENT_QUOTES, "ISO-8859-1");
		// convert decimal
		$source = preg_replace('/&#(\d+);/me',"chr(\\1)", $source);				// decimal notation
		// convert hex
		$source = preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)", $source);	// hex notation
		return $source;
	}

	/** 
	  * Method to be called by another php script. Processes for SQL injection
	  * @access public
	  * @param Mixed $source - input string/array-of-string to be 'cleaned'
	  * @param Buffer $connection - An open MySQL connection
	  * @return String $source - 'cleaned' version of input parameter
	  */
	function safeSQL($source) {
		// clean all elements in this array
		if (is_array($source)) {
			foreach($source as $key => $value)
				// filter element for SQL injection
				if (is_string($value)) $source[$key] = $this->quoteSmart($this->decode($value));
			return $source;
		// clean this string
		} else if (is_string($source)) {
			// filter source for SQL injection
			if (is_string($source)) return $this->quoteSmart($this->decode($source));
		// return parameter as given
		} else return $source;	
	}
	/** 
	  * @author Chris Tobin
	  * @author Daniel Morris
	  * @access protected
	  * @param String $source
	  * @param Resource $connection - An open MySQL connection
	  * @return String $source
	  */
	function quoteSmart($source) {
		// strip slashes
		if (get_magic_quotes_gpc()) $source = stripslashes($source);
		// quote both numeric and text
		$source = $this->escapeString($source);
		return $source;
	}
	
	/** 
	  * @author Chris Tobin
	  * @author Daniel Morris
	  * @access protected
	  * @param String $source
	  * @param Resource $connection - An open MySQL connection
	  * @return String $source
	  */	
	function escapeString($string) {
		// depreciated function
		if (version_compare(phpversion(),"4.3.0", "<")) mysql_escape_string($string);
		// current function
		else mysql_real_escape_string($string);
		return $string;
	}

}
?>