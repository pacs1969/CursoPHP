<?php

define("DOC_ROOT","C:/Program Files/xampp/htdocs/smartcrud/"); 
define("SITE_URL","http://localhost/smartcrud/");

//physical path constants

define("INCLUDE_PATH",DOC_ROOT."includes/");
define("CLASS_PATH",DOC_ROOT."classes/");
define("UPLOADED_PATH",DOC_ROOT."uploaded/"); 

define("CORESRC",DOC_ROOT."coresrc/");
define("PHPSRC",DOC_ROOT."src/php/");
define("HTMLSRC",DOC_ROOT."src/html/");

define("PROJECT_XML",DOC_ROOT."projects/projects.xml");

//http path constants

define("IMAGES_URL",SITE_URL."images/");
define("STYLES_URL",SITE_URL."styles/");
define("JS_URL",SITE_URL."js/");

require_once(DOC_ROOT."smarty.php");

//common include files to be included for all the pages

require_once(INCLUDE_PATH."local_ini.inc.php");
require_once(INCLUDE_PATH."sessions.inc.php");
require_once(INCLUDE_PATH."tplnames.inc.php");
require_once(INCLUDE_PATH."functions.inc.php");

//common class files to be included
require_once(CLASS_PATH."db.class.php");
require_once(CLASS_PATH."class_base.class.php");

?>
