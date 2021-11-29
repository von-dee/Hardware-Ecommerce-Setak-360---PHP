<?php 
 namespace app_profile;
  class update extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');                    
          
          // var_dump($this->firstname); die();

          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_users SET USR_FIRSTNAME = ".$this->sql->Param('a').", USR_OTHERNAME = ".$this->sql->Param('a').", USR_PHONE = ".$this->sql->Param('a').", USR_EMAIL = ".$this->sql->Param('a')." WHERE USR_CODE = ".$this->sql->Param('a')),array($this->firstname, $this->lastname, $this->phonenumber, $this->email, $actorcode));
          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            $message = "You updated ".$this->staff_name." of your categories";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Updated Staff Details"; 
            $reqtype = "Updated Staff Details";
            $reqicon = "fas fa-users";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You updated ".$this->staff_name." of your categories";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Updated Staff Details"; 
            $act_reqtype = "Updated Staff Details";
            $act_reqicon = "fas fa-users";
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