<?php
$action= "app_profile\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

$list= new app_profile\lists;
$paging= $list->Init();


include("scripts/js.php");
?>