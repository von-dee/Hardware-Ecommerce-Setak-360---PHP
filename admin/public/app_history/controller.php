<?php
$action= "app_history\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 

$list= new app_history\list_transactions;
$paging_trans= $list->Init();

$list= new app_history\lists;
$paging= $list->Init();


include("scripts/js.php");
?>