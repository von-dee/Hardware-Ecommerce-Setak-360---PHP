<?php 
 namespace app_staff;
  class update extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');                    
          


          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_staff SET 
          STF_FIRSTNAME = ".$this->sql->Param('a').", 
          STF_LASTNAME = ".$this->sql->Param('a').", 
          STF_DATEOFBIRTH = ".$this->sql->Param('a').", 
          STF_PHONE = ".$this->sql->Param('a').", 
          STF_EMAIL = ".$this->sql->Param('a').", 
          STF_HOMEADDRESS = ".$this->sql->Param('a').", 
          STF_INFO = ".$this->sql->Param('a').",   
          STF_SALARY = ".$this->sql->Param('a').",  
          STF_USERLEVEL = ".$this->sql->Param('a')." WHERE  STF_CODE = ".$this->sql->Param('a')." AND STF_ACTORCOMPCODE = ".$this->sql->Param('a')),array($this->staff_firstname, $this->staff_lastname, $this->staff_dateofbirth, $this->staff_phone, $this->staff_email,$this->staff_homeaddress, $this->staff_info,$this->staff_salary, $this->usertype, $this->keys, $actorcompcode));

          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            $message = "You updated ".$this->staff_firstname."'s details";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Updated Staff Details"; 
            $reqtype = "badge-info-inverse";
            $reqicon = "feather icon-user";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You updated ".$this->staff_firstname."'s details";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Updated Staff Details"; 
            $act_reqtype = "badge-info-inverse";
            $act_reqicon = "feather icon-user";
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