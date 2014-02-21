<?PHP
include_once(DOC_ROOT."plugins/FCKeditor/fckeditor.php");
ob_start();
creatEditor("content",SITE_URL."plugins/FCKeditor/",$editor_content=$contentbodypart,$width_percent= "100%",$height_px= "300");
$fckeditor=ob_get_contents();
$_SESSION['smartyObj']->assign("fckeditor",$fckeditor);
ob_clean();
?>