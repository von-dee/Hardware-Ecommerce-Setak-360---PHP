<?php 
 namespace app_reports;
  class lists extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('actor_compcode');
      

        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_users WHERE USR_CODE=".$this->sql->Param('a')." AND USR_STATUS='1' "),array($actorcode));
        print $this->sql->ErrorMsg();
        
        if($stmt->RecordCount() > 0){

          $obj= $stmt->FetchNextObject();
          return $obj;
        }
        
    
      }
 } ?>