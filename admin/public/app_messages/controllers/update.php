<?php 
 namespace app_messages;
  class update extends \setup { 
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


          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_staff SET STF_NAME = ".$this->sql->Param('a').", STF_DATEOFBIRTH = ".$this->sql->Param('a').", STF_PHONE = ".$this->sql->Param('a').", STF_EMAIL = ".$this->sql->Param('a').", STF_HOMEADDRESS = ".$this->sql->Param('a').", STF_INFO = ".$this->sql->Param('a').", STF_ACCOUNTEMAIL = ".$this->sql->Param('a').",  STF_ACCOUNTPASSWORD = ".$this->sql->Param('a')." WHERE  STF_CODE = ".$this->sql->Param('a')." AND STF_ACTORCOMPCODE = ".$this->sql->Param('a')),array($this->staff_name, $this->staff_dateofbirth, $this->staff_phone, $this->staff_email,$this->staff_homeaddress, $this->staff_info,$this->staff_accountemail, $staff_accountpassword, $this->keys, $actorcompcode));
          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            // $message = "You updated ".$this->staff_name." of your categories";
            // $type = "2";
            // $reqcode = $this->keys;
            // $reqtitle = "Updated Staff Details"; 
            // $reqtype = "Updated Staff Details";
            // $reqicon = "fas fa-users";
            // $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            // $act_message = "You updated ".$this->staff_name." of your categories";
            // $act_type = "2";
            // $act_reqcode = $this->keys;
            // $act_reqtitle = "Updated Staff Details"; 
            // $act_reqtype = "Updated Staff Details";
            // $act_reqicon = "fas fa-users";
            // $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            // $alert = $this->engine->alert_SQL("success", "Successful", "Updated Staff Successfully");

          }else{

            // $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
        }
    } 
 // }
 ?>