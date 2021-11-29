<?php 
 namespace app_finances;
  class add_expense_category extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_cat_code =  $this->engine->generateCode_SQL("app_expensecategory", "EXC", "EXCAT_CODE", "EXCAT_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');

          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_expensecategory (EXCAT_CODE, EXCAT_NAME, EXCAT_DESCRIPTION, EXCAT_ACTORCODE, EXCAT_ACTORCOMPCODE, EXCAT_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_cat_code, $this->expencecategory_name, $this->expencecategory_description, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added ".$this->expencecategory_name." a list of your expense categories";
            $type = "2";
            $reqcode = $gen_cat_code;
            $reqtitle = "Added Expense Category";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-credit-card";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added ".$this->expencecategory_name." a list of your expense categories";
            $act_type = "2";
            $act_reqcode = $gen_cat_code;
            $reqtitle = "Added Expense Category";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-credit-card";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Expense Category");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }


          
          $stmt_expensecategory = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_expensecategory WHERE EXCAT_STATUS = '1' AND EXCAT_ACTORCOMPCODE = ".$this->sql->Param('a')."  ORDER BY EXCAT_DATEADDED DESC"),array($actorcompcode));
          $stmt_expensecategory = $stmt_expensecategory->getAll();

          $response = array('stmt_expensecategory'=>$stmt_expensecategory);

          return $response;
         }
      }
 //} 
 ?>