<?php 
 namespace app_dashboard;
  class lists extends \setup { 
      public $limit,$fdsearch;

      function __construct(){
        parent::__construct(); 
      }
      function Init(){

        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');


        

        if(isset($this->fdsearch)){ 
          
          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS != '0' AND CHKOUT_NAME LIKE ".$this->sql->Param('a')."  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array("%".$this->fdsearch."%"); 

        }else if($this->search_subject == "new"){ 

          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '1'  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array();

        }else if($this->search_subject == "inprogress"){ 
          
          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '2' OR CHKOUT_STATUS = '3' OR CHKOUT_STATUS = '4'  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array();

        }else if($this->search_subject == "completed"){ 

          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '5'  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array();

        }else if($this->search_subject == "cancelled"){ 

          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '0'  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array();

        }else if($this->search_subject == "all"){ 
          
          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS != '0'  ORDER BY CHKOUT_DATEADDED DESC";
          $input =array();

        }else{
          
          $query = "SELECT * FROM app_checkouts WHERE CHKOUT_STATUS != '0'  ORDER BY CHKOUT_DATEADDED DESC";
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