<?
class mydb
{
	var $sql;

	function mydb(){
		$link=mysql_connect(HOST,DBUSER,DBPASS);
		$db_selected=mysql_select_db(DBNAME);
		if(!$link or !$db_selected) {
			die('Not connected : ' . mysql_error());
		}
		$this->sql="";
	}

	function putdata($table_name,$input)
	{
		$sql="INSERT INTO $table_name (";
		$number_col=count($input);
		$col=0;
		foreach(array_keys($input) as $column_name)
		{
			$col++;
			$sql.=$column_name;
			if($col!=$number_col){
				$sql.=',';
			}
		}
		$sql.=') VALUES(';
		$col=0;
		foreach(array_values($input) as $column_values)
		{
			$col++;
			$sql.=(strpos($column_values,'()'))?addslashes($column_values):"'".addslashes($column_values);
			if($col!=$number_col){
				$sql.=',';
			}
		}
		$sql.=')';


		if(mysql_query($sql))
		{
			$this->insert_id=mysql_insert_id();
			return $this->insert_id;
		}
		else{
			return false;
		}
	}
	function getid(){
		return $this->insert_id;
	}
	function deletedata($table_name,$con)
	{
		if(!empty($con))
		$sql="delete from $table_name where $con";
		else
		$sql="delete from $table_name";
		if(mysql_query($sql))
		return true;
		else
		return false;
	}
	function savedata($table_name,$input,$con)
	{
		$sql="UPDATE $table_name SET ";

		$number_col=count($input);
		$count=1;
		foreach($input as $key=>$val)
		{
			$sql.=$key.=(strpos($val,'()'))?"=".addslashes($val):"='".addslashes($val)."'";
			if($number_col!=$count){
				$sql.=",";
			}
			$count++;
		}
		if(!empty($con))
		$sql.=" where $con";
		$this->sql=$sql;
		if(mysql_query($sql))
		return true;
		else
		return false;
	}

	function getrows($table_name,$fields=NULL,$con=NULL,$orderbyfields=NULL,$order=NULL,$staring=NULL,$ending=NULL,$groupby=NULL)
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
			return $output;
		}
		else{
			return $output;
		}
	}
	function getrow($table_name,$fields=NULL,$con=NULL,$orderbyfields=NULL,$order=NULL,$staring=NULL,$ending=NULL,$groupby=NULL)
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
			return $output;
		}
	}

	function printsql()
	{
		echo "<br>".$this->sql."<br>";
	}

}
?>