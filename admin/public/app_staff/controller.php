<?php
$action= "app_staff\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

// $result= new app_staff\lists;
// $result= $result->Init();

$list= new app_staff\lists;
$paging= $list->Init();


include("scripts/js.php");
?>