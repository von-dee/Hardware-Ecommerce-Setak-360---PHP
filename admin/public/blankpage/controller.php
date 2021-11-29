<?php
$action= "blankpage\\".(($class_call)? $class_call :"lists"); 
$class_init= new $action;
$result= $class_init->Init(); 

include("scripts/js.php");
?>