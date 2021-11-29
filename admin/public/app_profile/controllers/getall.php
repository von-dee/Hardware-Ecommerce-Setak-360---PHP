<?php 
 namespace app_profile;
  class getall extends \JConfig { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){
        if(isset($this->fdsearch)){ 
             $query = "SELECT   name,is_user FROM framework_employees WHERE  name LIKE ".$this->fdsearch;
          $input =array("%".$this->fdsearch."%"); 
          }else{ 
          $query = "SELECT   name,is_user FROM framework_employees"; 
          }
      
          if(!isset($limit)){
          $limit = $this->session->get("limited");
          }else if(empty($limit)){
          $limit =20;
          }
          $this->session->set("limited",$limit);
          $lenght = 10;
          $paging = new \OS_Pagination($this->sql,$query,$limit,$lenght,"pg=".$this->pg."&option=".$this->option, isset($input) ?$input:  []);
          return $paging ;
      }
 } ?>