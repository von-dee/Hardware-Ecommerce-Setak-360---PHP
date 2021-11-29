<?php
$action= "app_contactus\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

$list= new app_contactus\lists;
$paging= $list->Init();


include("scripts/js.php");
?>