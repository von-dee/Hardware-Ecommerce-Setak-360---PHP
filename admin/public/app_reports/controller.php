<?php
$action= "app_reports\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

include("scripts/js.php");
?>