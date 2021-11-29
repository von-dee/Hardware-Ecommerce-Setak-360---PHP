<?php
// var_dump($view); die();


include("controller.php");
    switch($view){
		case "add":
		   include "views/expenses/add_expense.php";
        break;
        case "edit":
		   include "views/edit.php";
        break;

        case "edit_expense":
            include "views/expenses/edit_expense.php";
         break;

        case "details":
            include "views/details.php";
        break;
        case "profits":
            include "views/profits/list_profits.php";
        break;
        case "transactions":
            include "views/transactions/list_transactions.php";
        break;

        case "paymentstoroam":
            include "views/roam_payments/list_paymentstoroam.php";
        break;

        case "paymentstoroam_details":
            include "views/roam_payments/details_paymentstoroam.php";
        break;

        case "paymentstoriders":
            include "views/riders_payments/list_paymentstoriders.php";
        break;

        case "paymentstoriders_details":
            include "views/riders_payments/details_paymentstoriders.php";
        break;

        case "paymentdefaulters":
            include "views/defaulters/list_paymentdefaulters.php";
        break;

        case "paymentdefaulters_details":
            include "views/defaulters/details_paymentdefaulters.php";
        break;

        case "payriders":
            include "views/payriders/list_payriders.php";
        break;
        
        case "payridersdetails":
            include "views/payriders/details_payriders.php";
        break;

        case "expenses":
            include "views/expenses/list_expenses.php";
        break;
        case "expenses_categories":
            include "views/expenses/list_expenses_categories.php";
        break;
        default:
            include "views/expenses/list_expenses.php";
        break;

        


    }
?>