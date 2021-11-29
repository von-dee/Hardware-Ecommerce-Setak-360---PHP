<?php
$action= "app_finances\\".(($class_call)? $class_call :"lists"); 
$result= new $action;
$result= $result->Init(); 



if($class_call == "list_expenses_categories" || $class_call == "add_expense_category"){
    $list= new app_finances\list_expenses_categories;
    $paging_expenses_categories = $list->Init();    
}

if($class_call == "list_expenses" || $class_call == "update_expenses"){
    $list= new app_finances\list_expenses;
    $paging_expenses= $list->Init();
}

if($class_call == "list_profits"){
    $list= new app_finances\list_profits;
    $paging_profits= $list->Init();
}

if($class_call == "list_paymentdefaulters"){
    $list= new app_finances\list_paymentdefaulters;
    $paging_paymentdefaulters= $list->Init();
}

if($class_call == "list_paymentstoroam"){
    $list= new app_finances\list_paymentstoroam;
    $paging_paymentstoroam= $list->Init();
}

if($class_call == "list_transactions"){
    $list= new app_finances\list_transactions;
    $paging_trans= $list->Init();
}

if($class_call == "list_paymentstoriders"){
    $list= new app_finances\list_paymentstoriders;
    $paging_paymentstoriders= $list->Init();
}

if($class_call == "list_payriders"){
    $list= new app_finances\list_payriders;
    $paging_payriders= $list->Init();
}


include("scripts/js.php");
?>