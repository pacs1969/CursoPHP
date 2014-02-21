<?php
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
?>