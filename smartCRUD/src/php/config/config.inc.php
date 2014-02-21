<?php
//define("DOC_ROOT","/opt/lampp/htdocs/myzend/"); 

define("DOC_ROOT","C:/Program Files/xampp/htdocs/myzend/"); 
define("SITE_URL","http://localhost/myzend/");

//physical path constants

define("INCLUDE_PATH",DOC_ROOT."includes/");
define("CLASS_PATH",DOC_ROOT."classes/");
define("UPLOADED_PATH",DOC_ROOT."uploaded/"); 

//http path constants

define("UPLOAD_URL",SITE_URL."uploaded/");
define("IMAGES_URL",SITE_URL."images/");
define("STYLES_URL",SITE_URL."styles/");
define("JS_URL",SITE_URL."js/");

require_once(DOC_ROOT."smarty.php");

//common include files to be included for all the pages
//require_once $myinclude_path."functions.inc.php";
//require_once $myinclude_path."table_names.inc.php";


//require_once(INCLUDE_PATH."myini.inc.php");
//require_once(INCLUDE_PATH."sessions.inc.php");
//require_once(INCLUDE_PATH."tplnames.inc.php");
//require_once(INCLUDE_PATH."functions.inc.php");
//require_once(INCLUDE_PATH."languages_en.inc.php");


//common class files to be included
//require_once(CLASS_PATH."db.class.php");

//require_once $class_path."exception.class.php";
//require_once $class_path."lotinfo.class.php";

if(!strpos(strtolower($_SERVER[HTTP_USER_AGENT]), "msie") === FALSE)
{
   header("HTTP/1.x 205 OK");
} else {
   header("HTTP/1.x 200 OK");
}

header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Datum aus Vergangenheit
//header("Expires: -1");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  // immer geändert
//header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: no-cache, cachehack=".time());
header("Cache-Control: no-store, must-revalidate");
header("Cache-Control: post-check=-1, pre-check=-1", false);

?>
