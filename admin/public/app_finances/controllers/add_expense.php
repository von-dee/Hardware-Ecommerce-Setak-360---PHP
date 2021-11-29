<?php 
 namespace app_finances;
  class add_expense extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_exps_code =  $this->engine->generateCode_SQL("app_expenses", "EXP", "EXPS_CODE", "EXPS_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');

          
          $expense_category = explode("@@",$this->expense_category);
          $expense_category_code = $expense_category[0];
          $expense_category_name = $expense_category[1];


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_expenses (EXPS_CODE, EXPS_TOTALAMOUNT, EXPS_AMOUNTPAID, EXPS_CATCODE, EXPS_CATNAME, EXPS_ACTORCODE, EXPS_ACTORNAME, EXPS_ACTORCOMPCODE, EXPS_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_exps_code, $this->expense_totalamount, $this->expense_amounttopay, $expense_category_code, $expense_category_name, $actorcode, $actorname, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You paid ".$this->expense_amounttopay." of a total ".$this->expense_totalamount;
            $type = "2";
            $reqcode = $gen_exps_code;
            $reqtitle = "Added Expense";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-credit-card";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You paid ".$this->expense_amounttopay." of a total ".$this->expense_totalamount;
            $act_type = "2";
            $act_reqcode = $gen_exps_code;
            $act_reqtitle = "Added Expense";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-credit-card";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Expense Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>