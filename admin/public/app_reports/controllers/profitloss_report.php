<?php 
 namespace app_reports;
  class profitloss_report extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){


        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $actorcompname =  $this->engine->getCompanyData_SQL();


        $stmt_sales = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_profits WHERE  PFT_STATUS= '1' AND PFT_DATEADDED BETWEEN ".$this->sql->Param('b')." AND ".$this->sql->Param('c')." ORDER BY PFT_DATEADDED DESC"),array($this->date_from , $this->date_to));
        

        $sales = $stmt_sales->getAll();


        $response = ['data'=>$sales,  'company'=>$actorcompname->COMP_NAME, 'from'=>$this->date_from, 'to'=>$this->date_to];

        



         return $response;
      
    }
 } 
 
?>