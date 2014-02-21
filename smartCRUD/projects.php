<?php
#####DOCUMENT HEADER######
/**
  * SmartCRUD - Smarty based CRUD code generator
  *
  * Description:-
  * Project Management file for Create, Load, Edit and Remove Projects
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package SmartCRUD Project
  * @subpackage	SmartCRUD.ProjectManagement  
  * @category PHPfile
  * @version $Id: projects.php,v 1.0 2006/12/30
  * @link	http://www.smartcrud.com/
  * @license http://creativecommons.org/licenses/by-sa/3.0/us/
  */
#####DOCUMENT HEADER######
require_once("./config/config.inc.php");
require_once(CLASS_PATH."project_builder.class.php");
require_once(CLASS_PATH."dbinfo.class.php");

$projectObj=new project_builder();

/**
 * $menu,$menuvars - for this page submenu items
 * $menu - each element holds an array with 3 elements (subMenu display name,div name,default style)
 */

$menu=array(array("LISTING","listing","block"),
			array("CREATE","create","none"));
$menuvars="<script>var ar = new Array(\"listing\",\"create\");</script>";

switch ($_REQUEST['action_flag']){
	case "load_project":
		$projectObj->load_project($_POST['projects']);	
		break;
	case "new_project":
		$dbinfoObj=new dbinfo();

		if(($returnstr=$dbinfoObj->is_connected()) == false){
			$_GET['dbconnection']='failed';
			$projectinfo=$_POST;
			$menu=array(array("LISTING","listing","none"),
						array("CREATE","create","block"));
		}else{
			$projectObj->add_to_config();		
			$projectObj->create_project();
			
		}
		break;	
	case "edit_project":
		//functionalities to be implemented	
		break;	
	case "remove_project":
		//functionalities to be implemented	
		break;	
	default:
	//do nothing
	    break;
}
$smarty->assign("menu",$menu);
$smarty->assign("menuvars",$menuvars);

if (!is_writable(DOC_ROOT."projects/projects.xml")) {
	  $writeprotected="<font color=red>Projects directory is not writable!</font><br>Please make it writable and refresh this page.<br><br>";
	  $smarty->assign('writeprotected',$writeprotected);
	  $smarty->assign('disabled','disabled');
}

$smarty->assign('projects',$projectObj->get_project_list());
$smarty->assign('projectinfo',$projectinfo);
$smarty->assign('contentpanel',$smarty->fetch(TPL_PROJECTS));
$smarty->assign('rightpanel',$smarty->fetch(TPL_PROJECTSRIGHT));

$smarty->display(TPL_COMMON);

if($_GET['dbconnection']=='failed'){
echo "<script>alert('Database connection failed!');</script>";
}
?>
