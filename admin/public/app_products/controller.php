<?php
$action= "app_store\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

// $result= new app_store\lists;
// $result= $result->Init();

$list= new app_store\lists;
$paging= $list->Init();


include("scripts/js.php");
?>