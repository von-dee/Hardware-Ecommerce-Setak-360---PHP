<?php 
 namespace app_reports;
  class expenses_report extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){


        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $actorcompname =  $this->engine->getCompanyData_SQL();


        $stmt_expenses = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_expenses WHERE EXPS_STATUS= '1' AND EXPS_DATEADDED BETWEEN ".$this->sql->Param('b')." AND ".$this->sql->Param('c')." ORDER BY EXPS_DATEADDED DESC"),array($this->date_from , $this->date_to));
        

        $expenses = $stmt_expenses->getAll();


        $response = ['data'=>$expenses,  'company'=>$actorcompname->COMP_NAME, 'from'=>$this->date_from, 'to'=>$this->date_to];

        



         return $response;
      
    }
 } 
 
?>