<?php
#####DOCUMENT HEADER######
/**
  * SmartCRUD - Its a smarty based CRUD code generator
  *
  * Description:-
  * FORM Management file for Build HTML,JS,PHP,SQL
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package SmartCRUD Form
  * @subpackage	SmartCRUD.FormManagement  
  * @category PHPfile
  * @version $Id: forms.php,v 1.0 2006/12/30
  * @link	http://www.SmartCRUD.com/
  * @license http://creativecommons.org/licenses/by-sa/3.0/us/
  */
#####DOCUMENT HEADER######

require_once("./config/config.inc.php");
require_once(CLASS_PATH."form_builder.class.php");

$dbinfoObj=new dbinfo();

if(($returnstr=$dbinfoObj->is_connected()) == false){
	header('Location:'.SITE_URL.'projects.php?dbconnection=failed');
}

$setaction="sql";
$request_vars=request_wrapper::get_request_vars();

$menu=array(array("SQL","sql","block"),
			array("HTML","html","none"),
			array("JS","js","none"),
			array("PHP","php","none"),
			array("Build","build","none"));

$menuvars="<script>var ar = new Array(\"sql\",\"html\",\"js\",\"php\",\"build\");</script>";

switch ($request_vars['actionflag']){
	case "build":
		$tbldetails=$dbinfoObj->get_tbldetails($request_vars['dbtblname']);
		$buildObj = new form_builder();		
		
		$buildObj->build_everything($tbldetails);
		$jsscript='<script>'."\n";
		$jsscript.='alert("'.$request_vars['filename'].'.php '.'page created successfully!")'."\n";
		$jsscript.='window.open("'.$_SESSION['project_siteurl'].$request_vars['filename'].'.php'.'","smartcrudwindow");'."\n";
		$jsscript.='</script>';
		$smarty->assign("jsscript",$jsscript);
		break;
	case "sql":
		//array_shift($menu);
		menu_controller("HTML",&$menu);
		$setaction="build";
		$smarty->assign("tbldetails",$dbinfoObj->get_tbldetails($request_vars['dbtblname']));
		$smarty->assign("action_table",$request_vars['dbtblname']);
		break;
	default:
		// do nothing
		break;
}

$tables=array(""=>"-- Select Table --");
$tables=array_merge($tables,$dbinfoObj->gettbls());

$smarty->assign("menu",$menu);
$smarty->assign("menuvars",$menuvars);

$smarty->assign("setaction",$setaction);
$smarty->assign("tables",$tables);
$smarty->assign('contentpanel',$smarty->fetch(TPL_FORMS));
$smarty->assign('rightpanel',$smarty->fetch(TPL_FORMSRIGHT));
$smarty->display(TPL_COMMON);

if($_GET['filecreation']=='failed'){
echo "<script>alert('File creation failed, Check write access to the projects directory and try again!!');</script>";
}
?>
