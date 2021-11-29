<?php


$action= "app_riders\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 



$list= new app_riders\lists;
$paging= $list->Init();


include("scripts/js.php");
?>