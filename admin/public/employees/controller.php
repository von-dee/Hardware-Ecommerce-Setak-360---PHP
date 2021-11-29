<?php
$action= "employees\\".(($viewpage)? $viewpage :"lists"); 
$result= new $action;
$result= $result->Init(); 

$result= new employees\lists;
$result= $result->Init();
include("scripts/js.php");
?>