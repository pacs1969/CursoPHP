<?php
$docroot=str_replace("install.php","",$_SERVER['SCRIPT_FILENAME']);
$s = null;
if ($_SERVER['HTTPS']) {
	$s ='s';
}
$httpHost = $_SERVER['HTTP_HOST'];
if (isset($httpHost)) {
$siteurl='http'.$s.'://'.$httpHost.str_replace("install.php","",$_SERVER['SCRIPT_NAME']);
}
if($_POST['action_flag']=='install'){
	
	$string=file_get_contents($docroot."config/config.inc.php");
	

	$pattern = '/define\("DOC_ROOT","(.*)"\)/i';
	$replacement = 'define("DOC_ROOT","'.$_POST['docroot'].'")';
	$string=preg_replace($pattern, $replacement, $string);
	$pattern = '/define\("SITE_URL","(.*)"\)/i';
	$replacement = 'define("SITE_URL","'.$_POST['siteurl'].'")';
	$string=preg_replace($pattern, $replacement, $string);	
	file_put_contents($docroot."config/config.inc.php",$string); 
	file_put_contents($docroot."installed.txt","installed"); 

	echo "<script>alert('SmardCRUD installed successfully!');window.location.href='".$siteurl."';</script>";
	die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title>SmartCRUD - Smarty based PHP code generator for mysql</title>
<meta name="description" content="SmartCRUD - smarty based PHP code generator for mysql">
<meta name="keywords" content="php code generator,mysql code generator,smarty code generator">
<meta name="Generator" content="SmartCRUD! - Copyright (C) 2007.">
<meta name="robots" content="index, follow">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./styles/style.css" rel="stylesheet" type="text/css">

</head>
<BODY>
<form name="installfrm" action="" method="post">
<TABLE CELLPADDING="2" CELLSPACING="0" BORDER="0" ALIGN="center" WIDTH="900" HEIGHT="400" >
<TR><TD valign="top"  align="left"><img src="./images/logo.jpg" border=0 alt="SmartCRUD - Smarty based code generator">

<hr>
<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" align="center" style="text-align:left;">
<TR>
  <TD colspan="2" align='left'><h2>Installing...</h2></TD>
</TR>

<tr>
  <td width="128">Document root :    </td>
  <td align='left'><input name="docroot" type="text" size="50" id="docroot" value="<?php echo $docroot;?>"/></td>
</tr>
<tr>
  <td align='left'>Site url:    </td>
  <td align='left'><input name="siteurl" type="text" size="50" id="siteurl" value="<?php echo $siteurl;?>"/></td>
</tr>

<tr>
  <td align='left'>&nbsp;</td>
  <td align='left'>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="right"><input type="hidden" name="action_flag" value="install" />
  <?php
  if (!is_writable($docroot."config/config.inc.php")) {
	  echo "<font color=red>The file config.inc.php in the config directory is not writable!</font><br>Please make it writable and refresh this page.";
	  $disabled="disabled";
  }
  ?>
<br><br>
<input type="Submit" name="Submit" value="Install >>" <?php echo $disabled;?> class="button"></td>
  </tr>
</TABLE>
</TD>
</TR>
</TABLE>
</form>


 </BODY>
</HTML>