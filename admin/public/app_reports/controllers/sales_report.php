<?php 
 namespace app_reports;
  class sales_report extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){


        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $actorcompname =  $this->engine->getCompanyData_SQL();


        $stmt_sales = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_sales WHERE SALE_STATUS = '1' AND SALE_ACTORCOMPCODE = ".$this->sql->Param('a')." AND SALE_DATEADDED BETWEEN ".$this->sql->Param('b')." AND ".$this->sql->Param('c')." ORDER BY SALE_DATEADDED DESC"),array($actorcompcode, $this->date_from , $this->date_to));
        
        $sales = $stmt_sales->getAll();


        $response = ['data'=>$sales,  'company'=>$actorcompname->COMP_NAME, 'from'=>$this->date_from, 'to'=>$this->date_to];

        



         return $response;
      
    }
 } 
 
?>