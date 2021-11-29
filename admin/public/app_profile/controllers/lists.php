<?php 
 namespace app_profile;
  class lists extends \setup { 
    public $limit,$fdsearch;
    function __construct(){
      parent::__construct(); 
    }
    function Init(){
      // if($this->engine->validatePostForm($this->microtime)){  

        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $stmt_category = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_users WHERE USR_STATUS = '1' AND USR_ACTOR_ID = ".$this->sql->Param('a')."  ORDER BY USR_DATE_ADDED DESC"),array($actorcode));
        
        $result = $stmt_category->GetAll();

        return $result ;

      }
} 

?>