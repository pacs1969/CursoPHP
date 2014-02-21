<?php
#####DOCUMENT HEADER######
/**
  * SmartCRUD - Its a smarty based CRUD code generator
  *
  * Description:-
  * Smarty controller file 
  *
  * @copyright Copyright (C) 2007 Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Murugan Krishnamoorthy <phpinbox@gmail.com>
  * @author Ganesan <rmdganesan@gmail.com>
  * @package SmartCRUD Project
  * @subpackage	SmartCRUD.smarty  
  * @category PHPfile
  * @version $Id: smarty.php,v 1.0 2006/12/30
  * @link	http://www.smartcrud.com/
  * @license http://creativecommons.org/licenses/by-sa/3.0/us/
  */
#####DOCUMENT HEADER######

// put full path to Smarty.class.php
require(DOC_ROOT.'smarty/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = DOC_ROOT.'smarty/templates';
$smarty->compile_dir = DOC_ROOT.'smarty/templates_c';
$smarty->cache_dir = DOC_ROOT.'smarty/cache';
$smarty->config_dir = DOC_ROOT.'smarty/configs';

$smarty->assign('site_url',SITE_URL);
$smarty->assign('js_url',JS_URL);
$smarty->assign('images_url',IMAGES_URL);
$smarty->assign('styles_url',STYLES_URL);
$smarty->assign('uploaded_url',UPLOAD_URL);
$smarty->assign('ads_url',ADS_URL);
?>