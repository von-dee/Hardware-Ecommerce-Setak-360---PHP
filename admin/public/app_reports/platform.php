<?php

include("controller.php");
    switch($view){
        
        case "profitloss_filter":
		   include "views/profitloss_filter.php";
        break;
        case "profitloss_report":
           include "views/profitloss_report.php";
        break;


        case "trips_filter":
            include "views/trips_filter.php";
        break;
        case "trips_report":
            include "views/trips_report.php";
        break;


        case "riders_filter":
            include "views/riders_filter.php";
        break;
        case "riders_report":
            include "views/riders_report.php";
        break;

        case "clients_filter":
            include "views/clients_filter.php";
        break;
        case "clients_report":
            include "views/clients_report.php";
        break;


        case "completed_trips_filter":
            include "views/completed_trips_filter.php";
        break;
        case "completed_trips_report":
            include "views/completed_trips_report.php";
        break;


        case "cancelled_trips_filter":
            include "views/cancelled_trips_filter.php";
        break;
        case "cancelled_trips_report":
            include "views/cancelled_trips_report.php";
        break;


        case "expenses_filter":
            include "views/expenses_filter.php";
        break;
        case "expenses_report":
            include "views/expenses_report.php";
        break;      
        
        
        // default:
        //     include "views/list.php";
        // break;
    }
?>