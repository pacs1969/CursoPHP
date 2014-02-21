<?php
function check_auth()
{
 if(($_SERVER['PHP_AUTH_USER'] != 'admin') AND ($_SERVER['PHP_AUTH_PW'] != 'admin123'))
  	     {
 	         // show authentication dialog box again
  	         header('WWW-Authenticate: Basic realm="OFL Authentication"');
  	         header('HTTP/1.0 401 Unauthorized');
 	         echo 'Authorization Required.';
 	         exit;
	     }
}

function get_mailtpl($tpl_name){
$handle = fopen("mail_templates/".$tpl_name.".inc", "r");
	while (!feof($handle)) {
		$buffer .= fgets($handle, 4096);
	}
fclose($handle);
return $buffer;
}

function upload_file($fileinfo){
		global $uploaded_path;
		
		$uploaddir = $uploaded_path."import/";
		//		$filetype = filetype($_FILES['propertyImage']['name']);

		$filetype = substr($fileinfo['type'],strpos($fileinfo['type'],"/")+1);
		$filename = $fileinfo['name'];
		$uploadfile = $uploaddir.$filename;	

		if (move_uploaded_file($fileinfo['tmp_name'], $uploadfile)) {			
			return true;
		}
}

function redirect_user($redirectpage="index.php"){
		if(file_exists($redirectpage)){			
			header("location:$redirectpage");
		}
	}
function getcitylist(){
	$returnstr=array("0"=>"-- Select city --");
	$fields="DISTINCT City";
	$qrycondition=(isset($_REQUEST['State']))?" State='".$_REQUEST['State']."'":" State='California'";
	$cityinfo=$_SESSION['dbobj']->select_record(BUILDING,$fields,$qrycondition);
	

	foreach($cityinfo as $key=>$val){
		$returnstr[$val['City']]=$val['City'];
	}

	return !empty($returnstr[0])?$returnstr:"";
}
function get_js_script($form_name){
	global $class_path;
	require_once($class_path."class.form_validation.php");
    $validationObj = new form_validation();
    $jsalert = $validationObj->generatejs($form_name);
	$submit_button="onclick=\"return validate_".$form_name."();\"";
    $_SESSION['smartyObj']->assign("js_".$form_name, $jsalert);
	$_SESSION['smartyObj']->assign("submit_".$form_name,$submit_button);		
}

function menu_controller($live,$menu){
$count=count($menu);
	for($i=0;$i<$count;$i++){
		if($menu[$i][0]==$live){
		$menu[$i][2]="block";
		}else{
		$menu[$i][2]="none";
		}
	}	
}

function server_validation($form_name){
			global $class_path,$serverjsalert;
			require_once($class_path."class.form_validation.php");
			$validationObj=new form_validation();
			$need=$validationObj->validate($form_name);
			if($need!=false){				
				$jsalert=str_replace("#MESSAGE#",$need,$serverjsalert);
				$_SESSION['smartyObj']->assign("jsalert",$jsalert);
				$bodyfunc="onload=serveralert();";
				$_SESSION['smartyObj']->assign("bodyfunc",$bodyfunc);				
				return false;
			}else{
				return true;
			}
}

?>