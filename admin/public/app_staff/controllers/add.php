<?php 
 namespace app_staff;
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
          STF_FIRSTNAME,
          STF_LASTNAME,
          STF_DATEOFBIRTH,
          STF_PHONE,
          STF_EMAIL,
          STF_HOMEADDRESS,
          STF_USERLEVEL,
          STF_SALARY,
          STF_INFO,
          STF_ACCOUNTEMAIL,
          STF_ACCOUNTPASSWORD,
          STF_ACTORCODE,
          STF_ACTORCOMPCODE,
          STF_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_staff_code, $this->staff_firstname,$this->staff_lastname, $this->staff_dateofbirth, $this->staff_phone, $this->staff_email, $this->staff_homeaddress, $this->usertype, $this->staff_salary, $this->staff_info, $this->staff_email, $staff_accountpassword, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added a Staff to your staff members";
            $type = "2";
            $reqcode = $gen_staff_code;
            $reqtitle = "Added Staff";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-user";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added a Staff to your staff members";
            $act_type = "2";
            $act_reqcode = $gen_staff_code;
            $act_reqtitle = "Added Staff";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-user";
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