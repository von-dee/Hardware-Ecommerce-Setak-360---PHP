<?php 
 namespace app_reports;
  class riders_report extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){


        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $actorcompname =  $this->engine->getCompanyData_SQL();


        $stmt_sales = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_riders WHERE RDR_COMP_CODE = ".$this->sql->Param('a')." AND RDR_STATUS= '1' AND RDR_DATEADDED BETWEEN ".$this->sql->Param('b')." AND ".$this->sql->Param('c')." ORDER BY RDR_DATEADDED DESC"),array($actorcompcode, $this->date_from , $this->date_to));
        

        $sales = $stmt_sales->getAll();


        $response = ['data'=>$sales,  'company'=>$actorcompname->COMP_NAME, 'from'=>$this->date_from, 'to'=>$this->date_to];

        



         return $response;
      
    }
 } 
 
?>