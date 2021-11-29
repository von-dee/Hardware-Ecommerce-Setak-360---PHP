<?php
$action= "app_insight\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 


$list= new app_insight\lists;
$paging= $list->Init();


include("scripts/js.php");
?>