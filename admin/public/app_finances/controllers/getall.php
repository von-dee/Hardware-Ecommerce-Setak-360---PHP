<?php 
 namespace app_finances;
  class getall extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){

         $actorcode = $this->session->get('actorid');
         $actorname = $this->session->get('loginuserfulname');
         $actorcompcode = $this->session->get('companycode');
 
         $stmt_expensecategory = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_expensecategory WHERE EXCAT_STATUS= '1' AND EXCAT_ACTORCOMPCODE = ".$this->sql->Param('a')."  ORDER BY EXCAT_DATEADDED DESC"),array($actorcompcode));
         $stmt_expensecategory = $stmt_expensecategory->getAll();

         $response = array('stmt_expensecategory'=>$stmt_expensecategory);         

         return $response;
      }
 } ?>