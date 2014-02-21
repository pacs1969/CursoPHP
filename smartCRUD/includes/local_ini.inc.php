<?
ini_set("error_reporting","81"); //PHP_INI_ALL
if(DEVSER == true){
ini_set("display_errors","On"); //PHP_INI_ALL 
ini_set("display_startup_errors","On"); //PHP_INI_ALL
ini_set("html_errors","On"); //PHP_INI_ALL
}else{
ini_set("display_errors","On"); //PHP_INI_ALL 
ini_set("display_startup_errors","Off"); //PHP_INI_ALL
ini_set("html_errors","Off"); //PHP_INI_ALL
}

ini_set("log_errors","On"); //PHP_INI_ALL
ini_set("allow_url_fopen","0"); //PHP_INI_ALL
ini_set("log_errors_max_len","0"); //PHP_INI_ALL
ini_set("ignore_repeated_errors","On"); //PHP_INI_ALL

//ini_set("ignore_repeated_source","Off"); //PHP_INI_ALL
ini_set("ignore_repeated_source","On"); //PHP_INI_ALL
ini_set("report_memleaks","On"); //PHP_INI_ALL
ini_set("track_errors","On"); //PHP_INI_ALL

ini_set("error_log",DOC_ROOT."logs/php/errors.txt"); //PHP_INI_ALL

?>