<?php
$action= "app_messages\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

$list= new app_messages\lists;
$paging= $list->Init();


include("scripts/js.php");
?>