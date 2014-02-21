<?php
if(file_exists("installed.txt")){
	header("location:projects.php");
}else{
	header("location:install.php");
}
?>