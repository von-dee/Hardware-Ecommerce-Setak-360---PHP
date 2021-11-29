<?php 
 namespace app_notifications;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_staff_code =  $this->engine->generateCode_SQL("app_staff", "STF", "STF_CODE", "STF_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');

          
          
          
          
          
          $crypt = new \Crypt();
          $staff_accountpassword = $crypt->loginPassword($this->staff_accountemail,$this->staff_accountpassword);

          


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_staff (STF_CODE,
          STF_NAME,
          STF_DATEOFBIRTH,
          STF_PHONE,
          STF_EMAIL,
          STF_HOMEADDRESS,
          STF_INFO,
          STF_ACCOUNTEMAIL,
          STF_ACCOUNTPASSWORD,
          STF_ACTORCODE,
          STF_ACTORCOMPCODE,
          STF_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_staff_code, $this->staff_name, $this->staff_dateofbirth, $this->staff_phone, $this->staff_email, $this->staff_homeaddress, $this->staff_info, $this->staff_accountemail, $staff_accountpassword, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added ".$this->staff_name." to your staffs";
            $type = "2";
            $reqcode = $gen_staff_code;
            $reqtitle = "Added Staff";
            $reqtype = "Added Staff";
            $reqicon = "fas fa-users";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added ".$this->staff_name." to your staffs";
            $act_type = "2";
            $act_reqcode = $gen_staff_code;
            $act_reqtitle = "Added Staff";
            $act_reqtype = "Added Staff";
            $act_reqicon = "fas fa-users";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Staff Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>