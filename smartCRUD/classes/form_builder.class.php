<?
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * FORM Management class for Building HTML,JS,PHP,SQL
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Form
  * @subpackage	MyZEND.FormManagement  
  * @category ClassFile
  * @version $Id: form_builder.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

/**
	 * Include necessary class files
	 * 
	 */

require_once(CLASS_PATH."dbinfo.class.php");
require_once(CLASS_PATH."html_builder.class.php");
require_once(CLASS_PATH."jsbuilder.class.php");
require_once(CLASS_PATH."file_manager.class.php");


class form_builder extends class_base{

	private $jsstr;
	public $tbldetails;
	private $phpstr_bottom;
	private $phpstr_top;
	private $smartyarrs;
	private $requiredfields;

	private $fileObj;
	private $jsObj;
	private $htmlObj;


	function init(){
		$this->phpstr_bottom="";
		$this->phpstr_top="";
		$this->smartyarrs="";
		$this->requiredfields=array();

		$this->jsstr="";


		$this->fileObj=new file_manager();
		$this->jsObj=new jsbuilder($this->request_vars);
		$this->htmlObj=new html_builder();

	}//constructor

	function dispose(){
	}//destructor

	/**
	 * controller function for building PHP file, class file and tpl file
	 * 
	 */
	function build_everything($tbldetails){

		$this->request_vars['tbldetails']=$tbldetails;
		$this->htmlObj->request_vars['tbldetails']=$tbldetails;

		$this->generate_html();
		$this->generate_class();
		$this->generate_php();
		return $content;
	}

	/**
	 * Reads sample PHPfile from src directory and creates the original source
	 * just find and replace stuff
	 * 
	 */

	function generate_php(){
		$rfile=PHPSRC."samplephp.txt";
		$phpstr=$this->fileObj->readthis($rfile);
		$phpstr=str_replace("#TEMPLATE_NAME#",$this->request_vars['filename'],$phpstr);
		$phpstr=str_replace("#PROJECTNAME#",$_SESSION['project_name'],$phpstr);
		$phpstr=str_replace("#CLASSNAME#",$this->request_vars['classname'],$phpstr);
		$phpstr=str_replace("#TABLENAME#",$this->request_vars['dbtblname'],$phpstr);
		$phpstr=str_replace("#FILEDATE#",date("d/m/Y"),$phpstr);
		$phpstr=str_replace("#FORMMETHOD#",$this->request_vars['form_method'],$phpstr);
		$phpstr=str_replace("#INSERTBOTTOM#",$this->phpstr_bottom,$phpstr);

		$phpstr=str_replace("#INSERTTOP#",$this->htmlObj->phpstr_top,$phpstr);
		$phpstr=str_replace("#SMARTYASSIGNS#",$this->htmlObj->smartystr,$phpstr);
		$phpstr=str_replace("#SMARTYARRAYS#",$this->smartyarrs,$phpstr);
		$phpstr=str_replace("#FUNCSUFFIX#",$this->request_vars['funcsuffix'],$phpstr);
		$phpstr=str_replace("#LISTSIZE#",$this->request_vars['listsize'],$phpstr);
		$phpstr=str_replace("#OBJECTNAME#","content",$phpstr);

		$wfile=$_SESSION['project_path'].$this->request_vars['filename'].".php";
		$this->fileObj->writethis($wfile,$phpstr);
	}

	/**
	 * creates the original source .tpl file
	 * 
	 */
	function generate_html(){

		if($this->request_vars['htmltemplate'] != 'S'){
			$tplstring='{include file="header.tpl"}'."\n";
			if($this->request_vars['htmltemplate'] == 'HF'){
				$tplstring.='<tr><td colspan="3" valign="top" align="top">'."\n";
			}elseif($this->request_vars['htmltemplate'] == 'HFL'){
				$tplstring.='<tr><td>Left Nav</td><td colspan="2" valign="top" align="top">'."\n";
			}else{
				$tplstring.='<tr><td>Left Nav</td><td valign="top" align="top">'."\n";
			}
		}
		//$tplstring.='{if $actionflag eq "add" || $actionflag eq "edit"}'."\n";
		$tplstring.='<table width="90%" border="0" cellspacing="1" cellpadding="1">'."\n";
		$tplstring.="<form name=\"".$this->request_vars['form_name']."\" action=\"{\$smarty.server.PHP_SELF}\" method=\"".$this->request_vars['form_method']."\"#FORMATTRIBUTE#>\n";
		$tplstring.='<tr>'."\n";
		$tplstring.="<td align=\"left\" valign=\"top\">&nbsp;</td>\n<td align=\"left\" valign=\"top\">\n<font style=\"color:red;\">*</font> Marked fields are mandatory\n</td>\n";
		$tplstring.='</tr>'."\n";

		$tplstring.='<tr>'."\n";
		$tplstring.="<td align=\"left\" valign=\"top\">&nbsp;</td>\n<td align=\"left\" valign=\"top\">\n<span class=\"useralert\">{\$useralert}</span>\n</td>\n";
		$tplstring.='</tr>'."\n";
		foreach($this->request_vars['tbldetails']['fields'] as $field){
			if($this->request_vars[$field['name']."_include"] == "on" AND $this->request_vars[$field['name']."_inputtype"]!="hidden"){
				$this->requiredfields[]=$field['name'];
				$thisinput=$this->htmlObj->get_input($field['name']);

				if($this->request_vars[$field['name']."_required"] == "on" AND $this->request_vars['jsvalidation']!='no'){
					$this->generate_js($field['name']);
					//		$requiredstr='<sup><font style="color:red;">*</font></sup>';
					$requiredstr='&nbsp;<font style="color:red;">*</font>';
				}else{
					$requiredstr="";
				}


				if($this->request_vars[$field['name']."_inputtype"]=="htmleditor"){
					$this->phpstr_bottom='include_once(DOC_ROOT."plugins/FCKeditor/fckeditor.php");'."\n";
					$this->phpstr_bottom.='ob_start();'."\n";
					$this->phpstr_bottom.='creatEditor("content",SITE_URL."plugins/FCKeditor/",$editor_content=$contentbodypart,$width_percent="100%",$height_px= "300");'."\n";
					$this->phpstr_bottom.='$fckeditor=ob_get_contents();'."\n";
					$this->phpstr_bottom.='$smarty->assign("fckeditor",$fckeditor);'."\n";
					$this->phpstr_bottom.='ob_clean();'."\n";
				}

				$tplstring.='<tr>'."\n";
				$tplstring.="<td align=\"left\" valign=\"top\">".$this->request_vars[$field['name']."_label"].$requiredstr."</td>\n<td align=\"left\" valign=\"top\">\n".$thisinput."\n</td>\n";
				$tplstring.='</tr>'."\n";
			}
			elseif($this->request_vars[$field['name']."_inputtype"]=="hidden"){
				$this->requiredfields[]=$field['name'];
				$hiddenfields.=$this->htmlObj->get_input($field['name']);
			}
		}
		$hiddenfields.='<input type="hidden" name="'.$this->request_vars['tbldetails']['primary'].'" value="{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$this->request_vars['tbldetails']['primary'].'}">'."\n";
		$hiddenfields.='<input type="hidden" name="actionflag" value="{$actionflag}">'."\n";
		$tplstring.='<tr>'."\n";
		$tplstring.="<td align=\"left\" valign=\"top\">\n".$hiddenfields."</td><td align=\"left\" valign=\"top\">\n".$this->htmlObj->get_input("submit","field")."&nbsp;".$this->htmlObj->get_input("reset","field")."</td>\n";
		$tplstring.='</tr>'."\n";
		$tplstring.="</form>\n";
		$tplstring.='</table>';
		//$tplstring.='{/if}'."\n";
		$this->htmlObj->form_attribute;
		$tplstring=str_replace("#FORMATTRIBUTE#",$this->htmlObj->form_attribute,$tplstring);

		if($this->request_vars['funclist'] == 'on'){
			$tplstring.="\n".'{include file=\'list.tpl\'}'."\n";
			$tplstring.=$this->htmlObj->getlisttbl();
		}

		if($this->request_vars['htmltemplate'] != 'S'){
			if($this->request_vars['htmltemplate'] == 'HFLR'){
				$tplstring.='</td><td>Right Nav</td></tr>'."\n";
			}else{
				$tplstring.='</td></tr>'."\n";
			}
			$tplstring.='{include file="footer.tpl"}'."\n";
		}
		$file=$_SESSION['project_template_path'].$this->request_vars['filename'].".tpl";

		$this->jsstr=str_replace("#FUNSTIONSTATEMENTS#",$this->jsstr,$this->jsObj->get_jsheader());

		$tplstring=$this->jsstr.$tplstring;
		$this->fileObj->writethis($file,$tplstring);
	}
	/**
	 * JS validation string generation
	 * @param string - field name to be validated
	 */
	function generate_js($field){
		$this->jsstr.=$this->jsObj->getjs($field);
	}
	/**
	 * Reads sample PHPclassfile from src directory and creates the original source class file
	 * just find and replace stuff
	 * 
	 */
	function generate_class(){

		$rfile=($_SESSION['phpversion']=="PHP4")?PHPSRC."samplephp4class.txt":PHPSRC."samplephp5class.txt";

		$classstr=$this->fileObj->readthis($rfile);
		$classstr=str_replace("#CLASSNAME#",$this->request_vars['classname'],$classstr);
		$classstr=str_replace("#FUNCSUFFIX#",$this->request_vars['funcsuffix'],$classstr);
		$classstr=str_replace("#FILEDATE#",date("d/m/Y"),$classstr);
		$classstr=str_replace("#TABLENAME#",$this->request_vars['dbtblname'],$classstr);
		$classstr=str_replace("#TABLECONST#",strtoupper($this->request_vars['dbtblname']),"$classstr");
		$classstr=str_replace("#PRIMARYKEY#",$this->request_vars['tbldetails']['primary'],"$classstr");
		$classstr=str_replace("#PRIMARYKEYVAR#",'$this->request_vars[\''.$this->request_vars['tbldetails']['primary'].'\']',"$classstr");

		$arraystr='array(';
		$count=count($this->requiredfields);
		$i=1;
		$this->smartyarrs.="\r\n\t\t";
		foreach($this->requiredfields as $field){
			$input_type=$this->request_vars[$field."_inputtype"];
			if($input_type=='check' OR $input_type=='multiple'){
				$thisfield=$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'[\''.$field.'\']';
				$this->smartyarrs.='$'.$thisfield.'=explode(",",$'.$thisfield.');'."\r\n\t\t";
				$arraystr.='"'.$field.'"=>'.'implode(",",$this->request_vars[\'tpl_'.$field.'\'])';
			}else{
				$arraystr.='"'.$field.'"=>'.'$this->request_vars[\'tpl_'.$field.'\']';
			}
			if($i<$count){
				$arraystr.=",\r\n\t\t\t\t\t\t\t";
			}
			$i++;
		}
		$arraystr.=')';

		$classstr=str_replace("#INFOARRAY#",$arraystr,$classstr);

		$wfile=$_SESSION['project_path']."classes/class.".$this->request_vars['classname'].".php";
		$this->fileObj->writethis($wfile,$classstr);
	}
}
?>