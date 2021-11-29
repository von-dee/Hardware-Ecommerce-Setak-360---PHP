<?php 
 namespace app_contactus;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_cont_code =  $this->engine->generateCode_SQL("app_contactus", "CON", "CON_CODE", "CON_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');

          
          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_contactus (CON_CODE,CON_SUBJECT,CON_MESSAGE,
          CON_ACTORID,CON_ACTORCOMPCODE,CON_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_cont_code, $this->feed_subject, $this->feed_message, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added ".$this->feed_subject." contact us message";
            $type = "2";
            $reqcode = $gen_cont_code;
            $reqtitle = "Added Contact Us Message";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-message-square";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added ".$this->feed_subject." contact us message";
            $act_type = "2";
            $act_reqcode = $gen_cont_code;
            $act_reqtitle = "Added Contact Us Message";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-message-square";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Sent Message Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>