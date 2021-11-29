<?php 
 namespace app_finances;
  class delete_expense_category extends \setup { 
      function __construct(){
        parent::__construct();
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
                  
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');   
          
          
          
          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_expensecategory SET EXCAT_STATUS = '0' WHERE EXCAT_CODE = ".$this->sql->Param('a')." AND EXCAT_ACTORCOMPCODE = ".$this->sql->Param('a')),array($this->keys,$actorcompcode));
    
          if($stmt == true){
            
            $message = "You deleted an expense category";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Deleted Expense Category";
            $reqtype = "badge-danger-inverse";
            $reqicon = "feather icon-credit-card";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You deleted an expense category";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Deleted Expense Category";
            $act_reqtype = "badge-danger-inverse";
            $act_reqicon = "feather icon-credit-card";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Deleted Expense Category");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
      }
} 
// }
?>