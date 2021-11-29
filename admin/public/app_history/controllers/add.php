<?php 
 namespace app_history;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_request_code =  $this->engine->generateCode_SQL("app_requests", "RRQ", "REQ_REQUEST_CODE", "REQ_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');
          $addeddate = date('Y-m-d H:i:s');		

        

          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_requests (REQ_REQUEST_CODE,REQ_REQUESTORCODE,REQ_REQUESTORNAME,REQ_ITEMS,REQ_LOCATION,REQ_LOCATION_ID,REQ_LOCATION_FROM,REQ_LOCATION_ID_FROM,REQ_DESCRIPTION,REQ_PICKUP_DATE,REQ_PICKUP_TIME,REQ_TOTAL_ITEMS,REQ_TOTAL_AMOUNT,REQ_REQUESTOR_PHONE,REQ_DATE,REQ_REQUESTED_DATE,REQ_ACTORCODE,REQ_ACTORNAME,REQ_ACTORCOMPCODE,REQ_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),
          array($gen_request_code, "", $this->requestorname, $this->itemtype, $this->locationname, $this->locationid, $this->location_fromname, $this->location_fromid, $this->description, $this->pickupdate, $this->pickuptime, $this->itemquantity, $this->totalamount, $this->requestorphone, $addeddate, $addeddate, $actorcode, $actorname, $actorcompcode, "1"));

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