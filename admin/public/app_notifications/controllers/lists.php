<?php 
 namespace app_notifications;
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

        if(isset($this->fdsearch)){ 
          $query = "SELECT * FROM app_notifications WHERE NOTI_RECEIVER = ".$this->sql->Param('a')." AND NOTI_TYPE LIKE ".$this->sql->Param('a')."  ORDER BY NOTI_DATE DESC";
          $input =array($actorcode, "%".$this->fdsearch."%"); 
        }else{ 
          $query = "SELECT * FROM app_notifications WHERE NOTI_RECEIVER = ".$this->sql->Param('a')."  ORDER BY NOTI_DATE DESC";
          $input =array($actorcode);
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

?>