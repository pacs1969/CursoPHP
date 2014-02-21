<?php
#####DOCUMENT HEADER######
/**
  * MYZEND - Web Application Development Tool
  *
  * Description:-
  * FORM Management class for Building HTML
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package MyZEND Form
  * @subpackage	MyZEND.FormManagement  
  * @category ClassFile
  * @version $Id: html_builder.class.php,v 1.0 2006/12/30
  * @link	http://www.myzend.com/
  * @license http://creativecommons.org/licenses/by-sa/2.5/in/
  */
#####DOCUMENT HEADER######

class html_builder extends class_base{

	private $tabindex;
	private $max_file_limit;
	private $fileObj;
	public $phpstr_top;
	public $smartystr;
	public $form_attribute;

	/**
 * constructor function for HTMLbuilder class
 * 
 */

	function init(){

		$this->fileObj=new file_manager();
		$this->tabindex=1;
		$this->phpstr_top="";
		$this->smartystr="";
		$this->form_attribute="";
		$this->max_file_limit=10485760;
	}//constructor

	/**
 * destructor function for HTMLbuilder class
 * 
 */
	function dispose(){

	}//destructor

	/**
 * Validation function for server validation
 * @param string - tp specify a field type to generate html tag
 * @param string - "default = yes" this param is to generate submit and reset input which will not come from the form
 * @return string 
 */
	function get_input($field,$fromfrm="yes"){

		$input_type=($fromfrm=="yes")?$this->request_vars[$field."_inputtype"]:$field;
		switch ($input_type){
			case "text":
				$inputstr='<input type="text" name="tpl_'.$field.'" class="inputbox" tabindex="'.$this->tabindex.'" value="{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}">';
				$this->tabindex++;
				break;
			case "password":
				$inputstr='<input type="password" class="inputbox" name="tpl_'.$field.'" tabindex="'.$this->tabindex.'" value="{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}">';
				$this->tabindex++;
				break;
			case "textarea":
				$inputstr='<textarea name="tpl_'.$field.'" class="inputbox" tabindex="'.$this->tabindex.'" rows="'.$this->request_vars[$field."_id_rows"].'" cols="'.$this->request_vars[$field."_id_columns"].'">{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}</textarea>';
				$this->tabindex++;
				break;
			case "check":
				$option=($this->request_vars[$field."_check_captionfrm"]=="frmfield")?1:2;
				$count=0;
				$inputstr='{html_checkboxes name="tpl_'.$field.'" class="checkbox" tabindex="'.$this->tabindex.'" options=$tpl_'.$field.'arr selected=$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.' separator="&nbsp;"}';
				$this->phpstr_top.='$tpl_'.$field.'arr=array(';
				foreach($this->request_vars[$field."_check_op".$option."_caption"] as $value=>$caption){
					$this->phpstr_top.='"'.$this->request_vars[$field."_check_op".$option."_value"][$count].'"=>"'.$caption.'",';
					$count++;
				}
				$this->phpstr_top=substr($this->phpstr_top,0,strlen($this->phpstr_top)-1);
				$this->phpstr_top.=');'."\r\n";
				$this->smartystr.='$smarty->assign(\'tpl_'.$field.'arr\',$tpl_'.$field.'arr);'."\r\n";
				$this->tabindex++;
				break;
			case "radio":
				$option=($this->request_vars[$field."_radio_captionfrm"]=="frmfield")?1:2;
				$count=0;
				$inputstr='{html_radios name="tpl_'.$field.'" class="radiobox" tabindex="'.$this->tabindex.'" options=$tpl_'.$field.'arr selected=$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.' separator="&nbsp;"}';
				$this->phpstr_top.='$tpl_'.$field.'arr=array(';
				foreach($this->request_vars[$field."_radio_op".$option."_caption"] as $value=>$caption){
					$this->phpstr_top.='"'.$this->request_vars[$field."_radio_op".$option."_value"][$count].'"=>"'.$caption.'",';
					$count++;
				}
				$this->phpstr_top=substr($this->phpstr_top,0,strlen($this->phpstr_top)-1);
				$this->phpstr_top.=');'."\r\n";
				$this->smartystr.='$smarty->assign(\'tpl_'.$field.'arr\',$tpl_'.$field.'arr);'."\r\n";

				$this->tabindex++;
				break;
			case "list":
				$option=($this->request_vars[$field."_list_captionfrm"]=="frmfield")?1:2;
				$count=0;
				$inputstr='<select name="tpl_'.$field.'" class="listbox" tabindex="'.$this->tabindex.'">'."\n";
				$inputstr.='{html_options options=$tpl_'.$field.'arr selected=$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}'."\n";
				$inputstr.='</select>'."\n";
				$this->phpstr_top.='$tpl_'.$field.'arr=array(';
				foreach($this->request_vars[$field."_list_op".$option."_caption"] as $value=>$caption){
					$this->phpstr_top.='"'.$this->request_vars[$field."_list_op".$option."_value"][$count].'"=>"'.$caption.'",';
					$count++;
				}
				$this->phpstr_top=substr($this->phpstr_top,0,strlen($this->phpstr_top)-1);
				$this->phpstr_top.=');'."\r\n";
				$this->smartystr.='$smarty->assign(\'tpl_'.$field.'arr\',$tpl_'.$field.'arr);'."\r\n";
				$this->tabindex++;

				break;
			case "multiple":

				$option=($this->request_vars[$field."_mlist_captionfrm"]=="frmfield")?1:2;
				$count=0;
				$inputstr='<select class="mlistbox" name="tpl_'.$field.'[]" multiple size="'.$this->request_vars[$field."_mlist_size"].'" tabindex="'.$this->tabindex.'">'."\n";
				$inputstr.='{html_options options=$tpl_'.$field.'arr selected=$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}'."\n";
				$inputstr.='</select>'."\n";
				$this->phpstr_top.='$tpl_'.$field.'arr=array(';
				foreach($this->request_vars[$field."_mlist_op".$option."_caption"] as $value=>$caption){
					$this->phpstr_top.='"'.$this->request_vars[$field."_mlist_op".$option."_value"][$count].'"=>"'.$caption.'",';
					$count++;
				}
				$this->phpstr_top=substr($this->phpstr_top,0,strlen($this->phpstr_top)-1);
				$this->phpstr_top.=');'."\r\n";
				$this->smartystr.='$smarty->assign(\'tpl_'.$field.'arr\',$tpl_'.$field.'arr);'."\r\n";
				$this->tabindex++;
				break;
			case "file":
				$this->form_attribute=' enctype="multipart/form-data"';
				$inputstr='<input type="hidden" name="MAX_FILE_SIZE" value="'.$this->max_file_limit.'">';
				$inputstr.='<input type="file" class="inputbox" name="tpl_'.$field.'" tabindex="'.$this->tabindex.'">';
				$this->tabindex++;
				break;
			case "date":
				$rfile=DOC_ROOT."src/plugins/calendar/calendar.txt";
				$inputstr=$this->fileObj->readthis($rfile);
				$inputstr=str_replace("#FIELDNAME#","tpl_".$field."",$inputstr);
				$inputstr=str_replace("#FIELDID#","tpl_".$field."",$inputstr);
				$inputstr=str_replace("#TIMEFLAG#","false",$inputstr);
				break;
			case "date_time":
				$rfile=DOC_ROOT."src/plugins/calendar/calendar.txt";
				$inputstr=$this->fileObj->readthis($rfile);
				$inputstr=str_replace("#FIELDNAME#","tpl_".$field."",$inputstr);
				$inputstr=str_replace("#FIELDID#","tpl_".$field."",$inputstr);
				$inputstr=str_replace("#TIMEFLAG#","true",$inputstr);
				break;
			case "htmleditor":
				$inputstr='{$fckeditor}';
				break;
			case "hidden":
				$inputstr='<input type="hidden" name="tpl_'.$field.'" value="{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field.'}">'."\n";
				break;
			case "submit":
				$inputstr='<input type="submit" class="subbutton" name="'.$this->request_vars['form_name'].'_submit" ';

				if($this->request_vars['jsvalidation']=="yes"){
					$inputstr.='onclick="return validate_'.$this->request_vars['form_name'].'();"';
				}
				$inputstr.=' value="Submit" tabindex="'.$this->tabindex.'">'."\n";
				$this->tabindex++;
				break;
			case "reset":
				$inputstr='<input type="reset" class="resbutton" name="'.$this->request_vars['form_name'].'_reset" value="Reset" tabindex="'.$this->tabindex.'">'."\n";
				$this->tabindex++;
				break;
			case "none":
				break;
			default:
				break;
		}
		return $inputstr;
	}

	/**
 * Listing table generation 
 * @return string 
 */

	function getlisttbl(){
		//$tplstring='{if $actionflag eq "listall"}';

		$tplstring.='<br>';
		$tplstring.='<table width="90%" style="border:1px solid #000000;"  border="0" cellspacing="2" cellpadding="2">'."\n";
		$tplstring.="<form name=\"".$this->request_vars['form_name']."_list\" action=\"{\$smarty.server.PHP_SELF}\" method=\"".$this->request_vars['form_method']."\">\n";
		$tplstring.="</form>\n";
		$tplstring.='<tr>'."\n";

		$listinfo='{if $total_records neq ""}';
		$listinfo.='{foreach from=$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'s item='.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'}'."\n";
		$listinfo.='<tr>'."\n";
		$colspan_count=0;
		foreach($this->request_vars['tbldetails']['fields'] as $field){
			if($this->request_vars[$field['name']."_list"] == "on" AND $this->request_vars[$field['name']."_inputtype"]!="hidden"){
				$colspan_count++;
				$this->requiredfields[]=$field['name'];
				$thfield=$this->request_vars[$field['name'].'_listhead'];
				$tplstring.="<td align=\"left\" valign=\"top\">";
				if($this->request_vars[$field['name']."_sort"] == "on"){
					$tplstring.='{if $smarty.request.sortby neq "'.$field['name'].'" || $smarty.request.sortorder neq \'DESC\'}';
					$tplstring.='<a href=\'javascript:sortbysubmit("'.$field['name'].'","DESC")\'><img src="{$images_url}s_desc.gif" border="0"/></a>';
					$tplstring.='{/if}';
				}
				$tplstring.="&nbsp;<b>".$thfield."</b>&nbsp;";
				if($this->request_vars[$field['name']."_sort"] == "on"){
					$tplstring.='{if $smarty.request.sortby neq "'.$field['name'].'" || $smarty.request.sortorder neq \'ASC\'}';
					$tplstring.='<a href=\'javascript:sortbysubmit("'.$field['name'].'","ASC")\'><img src="{$images_url}s_asc.gif" border="0"/></a>';
					$tplstring.='{/if}';
				}
				$tplstring.="</td>\n";
				$listinfo.='<td align="left" valign="top">{$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$field['name'].'}</td>'."\n";
			}
		}
		$listinfo.="<td align=\"left\" valign=\"top\">\n";
		$listinfo.='<a href="{$smarty.server.PHP_SELF}?'.$this->request_vars['tbldetails']['primary'].'={$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$this->request_vars['tbldetails']['primary'].'}&actionflag=view"><img src="{$images_url}edit.gif" border="0" alt="Edit"></a>';

		$listinfo.="&nbsp;&nbsp;\n";
		$listinfo.='<a href="{$smarty.server.PHP_SELF}?'.$this->request_vars['tbldetails']['primary'].'={$'.$this->request_vars['dbtblname'].$this->request_vars['funcsuffix'].'.'.$this->request_vars['tbldetails']['primary'].'}&actionflag=delete"><img src="{$images_url}delete.gif" border="0" alt="Delete"></a>';
		$listinfo.="</td>\n";
		$listinfo.='</tr>'."\n";
		$listinfo.='{/foreach}'."\n";
		$listinfo.='{else}';
		$listinfo.='<tr>'."\n";
		$listinfo.="<td align=\"center\" valign=\"top\" colspan=\"".$colspan_count."\">\n";
		$listinfo.="No record found";
		$listinfo.="</td>\n";
		$listinfo.='</tr>'."\n";
		$listinfo.='{/if}';
		$tplstring.="<td align=\"left\" valign=\"top\"><b>Action</b></td>\n";
		$tplstring.='</tr>'."\n";
		$tplstring.=$listinfo;
		$tplstring.='</table>';
		//$tplstring.='{/if}';

		return $tplstring;
	}

}
?>