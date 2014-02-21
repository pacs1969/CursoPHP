<?php
class form_validation{

	var $form_name = "";

	/**
 * constructor function for form_validation class
 * @param string
 */

	function form_validation(){
		$this->form_name="";
	}

	/**
 * Validation function for server validation
 * @return bool|string 
 */

	function validate($form_name){
		global $include_path;
		require($include_path."form_validation.inc.php");

		foreach ($requiredfields[$form_name] as $fields=>$alert) {
			if(empty($_REQUEST[$fields])){
				$need="function serveralert(){\n";
				$need.="alert('$alert');\n";//(empty($_REQUEST[$fields]))?$alert:"";
				$need.="document.".$form_name.".".$fields.".focus();\n";
				$need.="\n}";
				return $need;
			}
		}
		//	$this->email_validator();
		return false;
	}

	function server_email_validator(){
		global $include_path;
		require($include_path."form_validation.inc.php");
		if(array_key_exists($this->form_name,$email_validator)){
			$this->check_email($_REQUEST[$email_validator[$this->form_name][0]]);
			return $need;
		}
	}


	function client_email_validator(){
		global $include_path;
		require($include_path."form_validation.inc.php");
		if(array_key_exists($this->form_name,$email_validator)){
			$jsscript="if(ValidateEmail(document.".$this->form_name.".".$email_validator[$this->form_name][0].".value) != true){\n";
			$jsscript.="alert(\"".$email_validator[$this->form_name][1]."\");\n";
			$jsscript.="document.".$this->form_name.".".$email_validator[$this->form_name][0].".focus();\n";
			$jsscript.="return false;\n";
			$jsscript.="}\n";
			return $jsscript;
		}
	}
	/**
 * Javascript ganeration function for client side validation
 * @return string
 */

	function generatejs($form_name){

		global $include_path;

		$this->form_name=$form_name;
		require($include_path."form_validation.inc.php");

		$jsscript="<script>\n";
		$jsscript.="function validate_".$this->form_name."(){\n";

		foreach ($requiredfields[$this->form_name] as $fields=>$alert) {
			$jsscript.="if( document.".$this->form_name.".".$fields.".value == \"\" )\n";
			$jsscript.="{\n";
			$jsscript.="alert(\"".$alert."\");\n";
			$jsscript.="document.".$this->form_name.".".$fields.".focus();\n";
			$jsscript.="return false;\n";
			$jsscript.="}\n";
		}
		$jsscript.=$this->get_field_length_validation();
		$jsscript.=$this->get_compare_validation();
		$jsscript.=$this->client_email_validator();

		$jsscript.="return true;\n";
		$jsscript.="}\n";
		$jsscript.="</script>\n";
		return $jsscript;
	}

	function custom_validator(){
		global $include_path;
		require($include_path."form_validation.inc.php");

	}

	function get_field_length_validation(){
		global $include_path;
		require($include_path."form_validation.inc.php");
		if(array_key_exists($this->form_name,$field_length_validator)){
			foreach($field_length_validator[$this->form_name] as $key=>$val){
				if($val[0] == "GREATER"){
					$condition="document.".$this->form_name.".".$key.".value.length != $val[1]";
					$alertmsg="$val[2] field needs $val[1] characters";
				}elseif($val[0] == "INBETWEEN"){
					$condition="document.".$this->form_name.".".$key.".value.length < $val[1] || document.".$this->form_name.".".$key.".value.length > $val[2]";
					$alertmsg="$val[3] field should be greater than $val[1] and less $val[2] characters";
				}
				$jsscript.="if( $condition ){\n";
				$jsscript.="alert(\"$alertmsg\");\n";
				$jsscript.="document.".$this->form_name.".".$key.".focus();\n";
				$jsscript.="return false;\n";
				$jsscript.="}\n";
			}
			return $jsscript;
		}
	}
	function get_compare_validation(){

		global $include_path;
		require($include_path."form_validation.inc.php");

		if(array_key_exists($this->form_name,$compare)){
			$jsscript.="if( document.".$this->form_name.".".$compare[$this->form_name][0].".value != document.".$this->form_name.".".$compare[$this->form_name][1].".value )\n";
			$jsscript.="{\n";
			$jsscript.="alert(\"".$compare[$this->form_name][2]."\");\n";
			$jsscript.="document.".$this->form_name.".".$compare[$this->form_name][0].".focus();\n";
			$jsscript.="return false;\n";
			$jsscript.="}\n";
			return $jsscript;
		}
	}

	/**
 * server side email address field validation
 * @return bool
 */

	function check_email ($mailid) {

		// validates that the user gave a properly formatted email address
		if(ereg('^[_a-z0-9A-Z+-]+(\.[_a-z0-9A-Z+-]+)*@[a-z0-9A-Z-]+(\.[a-z0-9A-Z-]+)*$', $mailid)) {
			return true;
		}else{
			return false;
		}
	}


}
?>