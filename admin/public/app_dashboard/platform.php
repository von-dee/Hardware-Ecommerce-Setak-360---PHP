<?php
// include 'controller.php';
// include 'view.php';


include("controller.php");
    switch($view){

        case "details":
            include "views/details.php";
        break;
         
        default:
            include "views/view.php";
        break;

    }
?>