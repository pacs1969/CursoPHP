<?php
session_start();
if(isset($_SESSION['name'])){
session_regenerate_id();
}
$_SESSION['smartyObj']=$smarty;
?>