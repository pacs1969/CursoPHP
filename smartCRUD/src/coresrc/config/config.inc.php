<?php
/**
 * Application document root physical path and http url
 *
 */

define("DOC_ROOT","#DOCUMENTROOT#"); //with trailing slash
define("SITE_URL","#SITEURL#"); //with trailing slash

/**
 * Include files, Classes, Upload physical path constants
 *
 */

define("INCLUDE_PATH",DOC_ROOT."includes/");
define("CLASS_PATH",DOC_ROOT."classes/");
define("UPLOADED_PATH",DOC_ROOT."uploaded/"); 

/**
 * Site image files, style sheets, upload directories http path constants
 *
 */

define("UPLOAD_URL",SITE_URL."uploaded/");
define("IMAGES_URL",SITE_URL."images/");
define("STYLES_URL",SITE_URL."styles/");
define("JS_URL",SITE_URL."js/");

/**
 * Database Username, Password, DBname, Host details
 *
 */
 
define("DBHOST","#HOSTNAME#");
define("DBUSER","#DBUSERNAME#");
define("DBPASS","#DBPASSWORD#");
define("DBNAME","#DBNAME#");

require_once(DOC_ROOT."smarty.php");

require_once(INCLUDE_PATH."sessions.inc.php");
require_once(INCLUDE_PATH."table_names.inc.php");

//common class files to be included
require_once(CLASS_PATH."db.class.php");
require_once CLASS_PATH."class_base.class.php";
?>
