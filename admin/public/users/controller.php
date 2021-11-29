<?php
$action= "users\\".(($viewpage)? $viewpage :"lists"); 
$result= new $action;
$result= $result->Init(); 

$result= new users\lists;
$result= $result->Init();
include("scripts/js.php");
?>
