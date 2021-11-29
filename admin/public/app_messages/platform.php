<?php
include("controller.php");
    switch($view){
		case "compose":
		   include "views/compose.php";
        break;
        case "trash":
		   include "views/trash.php";
        break;
        case "details":
            include "views/details.php";
        break;
        default:
            include "views/inbox.php";
        break;
    }
?>