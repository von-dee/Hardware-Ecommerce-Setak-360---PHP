<?php 
 namespace app_messages;
  class add_reply extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_message_code =  $this->engine->generateCode_SQL("app_messages", "MSG", "MESG_CODE", "MESG_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_messages (
          MESG_CODE,
          MESG_RECEIVER,
          MESG_RECEIVER_NAME,
          MESG_SENDER,
          MESG_SENDER_NAME,
          MESG_SUBJECT,
          MESG_BODY,
          MESG_ACTORCODE,
          MESG_ACTORCOMPCODE,
          MESG_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($gen_message_code, $this->ridercode, $this->ridername, $actorcompcode, $actorname, $this->messagesubject, $this->keys, $actorcode, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();



          if($stmt == true){
            
            $message = "You Replied ".$this->ridername;
            $type = "2";
            $reqcode = $gen_message_code;
            $reqtitle = "Replied Message";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-message-circle";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You Replied ".$this->ridername;
            $act_type = "2";
            $act_reqcode = $gen_message_code;
            $act_reqtitle = "Replied Message";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-message-circle";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Replied Message Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          
          if(isset($this->fdsearch)){ 
            $query = "SELECT * FROM app_messages WHERE MESG_RECEIVER = ".$this->sql->Param('a')." AND MESG_RECEIVER_NAME LIKE ".$this->sql->Param('a');
            $input =array($actorcompcode, "%".$this->fdsearch."%"); 
          }else{ 
            $query = "SELECT * FROM app_messages WHERE MESG_RECEIVER = ".$this->sql->Param('a');
            $input =array($actorcompcode);
          }
        
          if(!isset($limit)){
            $limit = $this->session->get("limited");
          }else if(empty($limit)){
            $limit =20;
          }
          
          $this->session->set("limited",$limit);
          $lenght = 10;
          $paging = new \OS_Pagination($this->sql,$query,$limit,$lenght,"pg=".$this->pg."&option=".$this->option, isset($input) ?$input:  []);
          
          // var_dump($paging); die();
  
          return $paging ;
          
         }
      }
 //} 
 ?>