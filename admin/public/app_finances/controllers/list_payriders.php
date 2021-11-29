<?php 
 namespace app_finances;
  class list_payriders extends \setup { 
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
          $query = "SELECT * FROM app_payrider WHERE PRD_STATUS = '1' AND PRD_RIDERNAME LIKE ".$this->sql->Param('a');
          $input =array("%".$this->fdsearch."%"); 
        }else{ 
          $query = "SELECT * FROM app_payrider WHERE PRD_STATUS = '1' ";
          $input =array();
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