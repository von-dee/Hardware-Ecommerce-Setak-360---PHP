<?php 
 namespace app_riders;
  class delete extends \setup { 
      function __construct(){
        parent::__construct();
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
                  
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');   
          

          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_riders SET RDR_STATUS = '0' WHERE RDR_CODE = ".$this->sql->Param('a')." AND RDR_COMP_CODE = ".$this->sql->Param('a')),array($this->keys,$actorcompcode));
    
          if($stmt == true){
            
            $message = "You deleted Rider from list";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Deleted Rider";
            $reqtype = "Deleted Rider";
            $reqicon = "feather icon-users";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);

            
            $act_message = "You deleted Rider from list";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Deleted Rider";
            $act_reqtype = "Deleted Rider";
            $act_reqicon = "feather icon-users";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Deleted Rider Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
      }
} 
// }
?>