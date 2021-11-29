<?php 
 namespace app_store;
  class delete extends \setup { 
      function __construct(){
        parent::__construct();
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
                  
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');   
          
          

          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_store SET AST_STATUS = '0' WHERE AST_CODE = ".$this->sql->Param('a')." AND AST_ACTORCOMP = ".$this->sql->Param('a')),array($this->keys,$actorcompcode));
    
          if($stmt == true){
            
            $message = "You deleted an asset from your lists of Assets";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Deleted Assets";
            $reqtype = "badge-danger-inverse";
            $reqicon = "feather icon-box";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You deleted an asset from your lists of Assets";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Deleted Assets";
            $act_reqtype = "badge-danger-inverse";
            $act_reqicon = "feather icon-box";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Deleted an Assets Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
      }
} 
// }
?>