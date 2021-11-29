<?php
$action= "app_requests\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 


$list= new app_requests\lists;
$paging= $list->Init();


include("scripts/js.php");
?>