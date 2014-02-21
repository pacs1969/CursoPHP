<?php
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * Project Management class for Create, Load, Edit and Remove Projects
  *
  * @copyright Copyright (C) 2007 Murugan krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Project
  * @subpackage	MyZEND.ProjectManagement 
  * @category ClassFile
  * @version $Id: projects.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://www.opensource.org/licenses/mit-license.php The MIT License
  */
#####DOCUMENT HEADER######

class project_builder extends class_base{

	function init(){
	}//construct
	function dispose(){
	}//destruct

	/**
    * Returns list of available projects as per PROJECT_XML file kept inside project directory
	*
	* @access public
	* @return array
	*/
	function get_project_list(){
		$project=array();
		$xml =  simplexml_load_file(PROJECT_XML);
		$i=0;
		foreach ($xml->PROJECT as $projectlist) {
			$path=(array)$projectlist->PATH;
			$dbdetails=(array)$projectlist->DBDETAILS;
			$project[$i]['PROJECTID']=(int)$projectlist->PROJECTID;
			$project[$i]['NAME']=(string)$projectlist->NAME;
			$project[$i]['DESCRIPTION']=(string)$projectlist->DESCRIPTION;
			$project[$i]['STATUS']=(string)$projectlist->STATUS;
			$project[$i]['VERSION']=(string)$projectlist->VERSION;
			$project[$i]['OS']=(string)$projectlist->OS;
			$project[$i]['PATH']=$path;
			$project[$i]['DBDETAILS']=$dbdetails;
			$i++;
		}
		return $project;
	}

	/**
    * Adding project details to the config files
	* redirects user to the form builder page 
	*
	* @access public
	*/
	function add_to_config(){
		
		$xml =  simplexml_load_file(PROJECT_XML);
		if(count($xml->PROJECT)<1){
			$PROJECTID=1;
		}else {
			foreach ($xml->PROJECT as $projectlist) {
				$PROJECTID=$projectlist->PROJECTID+1;
			}
		}
		$xmlstr=file_get_contents(PROJECT_XML);
		$projects = new SimpleXMLElement($xmlstr);
		$project=$projects->addChild('PROJECT');
		$project->addChild('PROJECTID',$PROJECTID);
		$project->addChild('NAME',$this->request_vars['NAME']);
		$project->addChild('DESCRIPTION',$this->request_vars['DESCRIPTION']);
		$project->addChild('VERSION',$this->request_vars['VERSION']);
		$project->addChild('OS',$this->request_vars['OS']);
		$path=$project->addChild('PATH');
		$path->addChild('DOCROOT',$this->request_vars['DOCROOT']);
		$path->addChild('SITEURL',$this->request_vars['SITEURL']);
		$dbdetails=$project->addChild('DBDETAILS');
		$dbdetails->addChild('DBTYPE',$this->request_vars['DBTYPE']);
		$dbdetails->addChild('DBHOST',$this->request_vars['DBHOST']);
		$dbdetails->addChild('PORT',$this->request_vars['PORT']);
		$dbdetails->addChild('DBUSERNAME',$this->request_vars['DBUSERNAME']);
		$dbdetails->addChild('DBPASSWORD',$this->request_vars['DBPASSWORD']);
		$dbdetails->addChild('DBNAME',$this->request_vars['DBNAME']);
		$dbwrapper=$dbdetails->addChild('DBWRAPPER','DBWRAPPER_NAME');
		$dbwrapper->addAttribute('needed', ($this->request_vars['DBWRAPPER']=="yes")?'yes':'no');
		$Plug_in=$project->addChild('PLUG_IN');
		$Plug_in->addChild('EDITOR',$this->request_vars['EDITOR']);
		$xml=$projects->asXML();
		// Write our string variable $xml back to the PROJECT_XML file.

		file_put_contents(PROJECT_XML, $xml);

		// Destroy variable $projects
		unset($projects);
		$projectfile='<?xml version="1.0" encoding="iso-8859-1"?>';
		$projectfile.='<PROJECT><PROJECTID>'.$PROJECTID.'</PROJECTID>'."\n";
		$projectfile.='<NAME>'.$this->request_vars['NAME'].'</NAME>'."\n";
		$projectfile.='<DESCRIPTION>'.$this->request_vars['DESCRIPTION'].'</DESCRIPTION>'."\n";
		$projectfile.='<STATUS>'.$this->request_vars['STATUS'].'</STATUS>'."\n";
		$projectfile.='<VERSION>'.$this->request_vars['VERSION'].'</VERSION>'."\n";
		$projectfile.='<OS>'.$this->request_vars['OS'].'</OS>'."\n";
		$projectfile.='<PATH>'."\n";
		$projectfile.='<DOCROOT>'.$this->request_vars['DOCROOT'].'</DOCROOT>'."\n";
		$projectfile.='<SITEURL>'.$this->request_vars['SITEURL'].'</SITEURL>'."\n";
		$projectfile.='</PATH>'."\n";
		$projectfile.='<DBDETAILS>'."\n";
		$projectfile.='<DBTYPE>'.$this->request_vars['DBTYPE'].'</DBTYPE>'."\n";
		$projectfile.='<DBHOST>'.$this->request_vars['DBHOST'].'</DBHOST>'."\n";
		$projectfile.='<PORT>'.$this->request_vars['PORT'].'</PORT>'."\n";
		$projectfile.='<DBUSERNAME>'.$this->request_vars['DBUSERNAME'].'</DBUSERNAME>'."\n";
		$projectfile.='<DBPASSWORD>'.$this->request_vars['DBPASSWORD'].'</DBPASSWORD>'."\n";
		$projectfile.='<DBNAME>'.$this->request_vars['DBNAME'].'</DBNAME>'."\n";
		$DBWRAPPER=($this->request_vars['DBWRAPPER']=="yes")?'yes':'no';
		$projectfile.='<DBWRAPPER needed="'.$DBWRAPPER.'"></DBWRAPPER>'."\n";
		$projectfile.='</DBDETAILS>'."\n";
		$projectfile.='<PROJECT>'."\n";
		//file_put_contents("./projects/".$this->request_vars['NAME'].'/appconfig/project.xml',$projectfile);		
	}
	/**
    * Extracts coresrc.zip file updates config.inc.php
	* Creates tablenames.inc.php file for deriving table names as constant
	*
	* @access public
	*/
	function create_project(){
		
		include_once(INCLUDE_PATH.'pclzip.lib.php');
		$archive = new PclZip("coresrc.zip");
		//array( PCLZIP_ATT_FILE_NAME => CORESRC.'/appconfig/project.xml');

		if ($archive->extract(DOC_ROOT.'projects/') == 0) {
			die("Error : ".$archive->errorInfo(true));
		}
		rename("./projects/coresrc","./projects/".$this->request_vars['NAME']);
		
		/**
		* update config file
		*/
		$this->update_config();
		$this->create_tableinc_file();
		$_SESSION['DOC_ROOT']=$this->request_vars['DOCROOT'];
		$_SESSION['SITE_URL']=$this->request_vars['SITEURL'];
		$_SESSION['NAME']=$this->request_vars['NAME'];
		$_SESSION['DESCRIPTION']=$this->request_vars['DESCRIPTION'];
		$_SESSION['dbhost']=$this->request_vars['DBHOST'];
		$_SESSION['dbuser']=$this->request_vars['DBUSERNAME'];
		$_SESSION['dbpass']=$this->request_vars['DBPASSWORD'];
		$_SESSION['dbname']=$this->request_vars['DBNAME'];
				
		//unlink("./projects/coresrc");		
		header('Location:'.SITE_URL.'forms.php');
		die;
	}
	/**
  	* keeping user loaded project information in session and redirects user to form builder page
	*
	* @access public
	*/
	function load_project($project_id){
		$xml =  simplexml_load_file(PROJECT_XML);
		foreach ($xml->PROJECT as $projectlist) {
			if((int)$projectlist->PROJECTID==$project_id) {
				$_SESSION['phpversion']=(string)$projectlist->VERSION;
				$path=(array)$projectlist->PATH;
				$_SESSION['project_path']=(string)$path['DOCROOT'];
				$_SESSION['project_siteurl']=(string)$path['SITEURL'];
				$_SESSION['project_template_path']=$_SESSION['project_path']."smarty/templates/";
				$_SESSION['project_classes_path']=$_SESSION['project_path']."classes/";
				$_SESSION['project_name']=(string)$projectlist->NAME;
				$dbdetails=(array)$projectlist->DBDETAILS;
				$_SESSION['dbtype']=(string)$dbdetails['DBTYPE'];
				$_SESSION['dbhost']=(string)$dbdetails['DBHOST'];
				$_SESSION['dbuser']=(string)$dbdetails['DBUSERNAME'];
				$_SESSION['dbpass']=(string)$dbdetails['DBPASSWORD'];
				$_SESSION['dbname']=(string)$dbdetails['DBNAME'];
				header('Location:'.SITE_URL.'forms.php');
				die;
			}
		}

	}
	/**
  	* project config file paths and DB information update
	*
	* @access public
	*/
	function update_config(){
		$configdata=file_get_contents($this->request_vars['DOCROOT'].'config/config.inc.php');
		$configdata=str_replace('#DOCUMENTROOT#',$this->request_vars['DOCROOT'],
		str_replace('#SITEURL#',$this->request_vars['SITEURL'],
		str_replace('#HOSTNAME#',$this->request_vars['DBHOST'],
		str_replace('#DBUSERNAME#',$this->request_vars['DBUSERNAME'],
		str_replace('#DBPASSWORD#',$this->request_vars['DBPASSWORD'],
		str_replace('#DBNAME#',$this->request_vars['DBNAME'],$configdata))))));
		file_put_contents ($this->request_vars['DOCROOT'].'config/config.inc.php',$configdata);
	}
	/**
  	* tablenames.inc.php file creating for holding all table names as constants
	*
	* @access public
	*/
	function create_tableinc_file()
	{
		$cid = mysql_connect($this->request_vars['DBHOST'],
		$this->request_vars['DBUSERNAME'],
		$this->request_vars['DBPASSWORD']);
		if($cid){
			mysql_select_db($this->request_vars['DBNAME']);
			$result = mysql_query('SHOW TABLES');
			$table_name="<?PHP \n";
			while ($row = mysql_fetch_array($result)) {
				$table_name.='define("'.strtoupper($row[0]).'","'.$row[0].'");'."\n";
			}
			$table_name.='?>';
			file_put_contents($this->request_vars['DOCROOT'].'includes/table_names.inc.php',$table_name);
			mysql_close();
		}
	}

}
?>
