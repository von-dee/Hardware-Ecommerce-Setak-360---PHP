<?php 
 namespace app_messages;
  class add_draft extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_message_code =  $this->engine->generateCode_SQL("app_messages_draft", "MSG", "MESG_CODE", "MESG_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_messages_draft (
          MESG_CODE,
          MESG_RECEIVER,
          MESG_RECEIVER_NAME,
          MESG_SENDER,
          MESG_SENDER_NAME,
          MESG_SUBJECT,
          MESG_BODY,
          MESG_ACTORCODE,
          MESG_ACTORCOMPCODE,
          MESG_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_message_code, $this->ridercode, $this->riderlastname.' '.$this->riderfirstname, $actorcompcode, $actorname, $this->messagesubject, $this->keys, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();



          if($stmt == true){
            
            $message = "You Saved a drafted Message to send to ".$this->riderfirstname;
            $type = "2";
            $reqcode = $gen_message_code;
            $reqtitle = "Drafted Message ";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-message-circle";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You Saved a drafted Message  to send to ".$this->riderfirstname;
            $act_type = "2";
            $act_reqcode = $gen_message_code;
            $act_reqtitle = "Drafted Message ";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-message-circle";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Sent Message  Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>