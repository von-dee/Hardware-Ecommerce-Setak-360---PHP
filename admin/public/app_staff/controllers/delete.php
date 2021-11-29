<?php 
 namespace app_staff;
  class delete extends \setup { 
      function __construct(){
        parent::__construct();
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
                  
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');   
          

          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_staff SET STF_STATUS = '0' WHERE STF_CODE = ".$this->sql->Param('a')." AND STF_ACTORCOMPCODE = ".$this->sql->Param('a')),array($this->keys,$actorcompcode));
    
          if($stmt == true){
            
            $message = "You deleted ".$this->keys." from your staff members";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Deleted Staff";
            $reqtype = "badge-danger-inverse";
            $reqicon = "feather icon-user";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You deleted ".$this->keys." from your staff members";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Deleted Staff";
            $act_reqtype = "badge-danger-inverse";
            $act_reqicon = "feather icon-user";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Deleted Staff Member");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
      }
} 
// }
?>