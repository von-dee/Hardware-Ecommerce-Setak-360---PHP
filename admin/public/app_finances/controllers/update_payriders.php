<?php 
 namespace app_finances;
  class update_payriders extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');                    
          
          
          $crypt = new \Crypt();
          $staff_accountpassword = $crypt->loginPassword($this->staff_accountemail,$this->staff_accountpassword);
          $datenow = date('Y-m-d H:i:s');	

          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_payrider SET PRD_STATUS = ".$this->sql->Param('a').",PRD_DATEPAID = ".$this->sql->Param('a')." WHERE PRD_CODE = ".$this->sql->Param('a')." "),array("0", $datenow ,$this->keys));
          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            $message = "You updated ".$this->staff_name." of your categories";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Paid Rider"; 
            $reqtype = "badge-info-inverse";
            $reqicon = "feather icon-credit-card";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You updated ".$this->staff_name." of your categories";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Paid Rider"; 
            $reqtype = "badge-info-inverse";
            $reqicon = "feather icon-credit-card";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Updated Staff Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
        }
    } 
 // }
 ?>