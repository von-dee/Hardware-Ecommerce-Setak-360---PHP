<?php 
 namespace app_insight;
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


        // Number Of Riders
        $stmt_riders_count = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_riders WHERE RDR_COMP_CODE = ".$this->sql->Param('a')." AND RDR_STATUS= '1' "),array($actorcompcode));
        $stmt_riders_count = $stmt_riders_count->RecordCount();
        print $this->sql->ErrorMsg();
        

        // Clients
        $stmt_clients_count = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_users WHERE USR_ACTOR_COMPCODE = ".$this->sql->Param('a')." AND USR_STATUS= '1' "),array($actorcompcode));
        $stmt_clients_count = $stmt_clients_count->RecordCount();
        print $this->sql->ErrorMsg();


        //Profit Total
        $stmt_profittotal = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_profits WHERE PFT_STATUS= '1' "),array());
        $stmt_profittotal = $stmt_profittotal->getAll();

        $profit_total = 0.00;
        foreach( $stmt_profittotal as $key => $value){ 
          $profit_total  =  $profit_total + round((float)$value['PFT_AMOUNT'], 2);
        }


        // Expenses Total
        $stmt_expensestotal = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_expenses WHERE EXPS_STATUS= '1' "),array());
        $stmt_expensestotal = $stmt_expensestotal->getAll();
        $expenses_total = 0.00;
        foreach( $stmt_expensestotal as $key => $value){ 
          $expenses_total  =  $expenses_total + round((float)$value['EXPS_AMOUNTPAID'], 2);
        }
        
        

        // All Rides
        $stmt_allrides = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_requests WHERE REQ_ACTORCOMPCODE = ".$this->sql->Param('a')." "),array($actorcompcode));
        $stmt_allrides = $stmt_allrides->RecordCount();
        print $this->sql->ErrorMsg();



        // Completed Rides
        $stmt_rides_completed = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_requests WHERE REQ_ACTORCOMPCODE = ".$this->sql->Param('a')." AND REQ_STATUS= '5' "),array($actorcompcode));
        $stmt_rides_completed = $stmt_rides_completed->RecordCount();
        print $this->sql->ErrorMsg();



        // In-progress Rides
        $stmt_rides_inprogress = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_requests WHERE REQ_STATUS = '1' OR  REQ_STATUS = '2' OR  REQ_STATUS = '3' OR  REQ_STATUS = '4' AND REQ_ACTORCOMPCODE = ".$this->sql->Param('a')." "),array($actorcompcode));
        $stmt_rides_inprogress = $stmt_rides_inprogress->RecordCount();
        print $this->sql->ErrorMsg();



        // Cancelled Rides
        $stmt_rides_cancelled = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_requests WHERE REQ_ACTORCOMPCODE = ".$this->sql->Param('a')." AND REQ_STATUS= '0' "),array($actorcompcode));
        $stmt_rides_cancelled = $stmt_rides_cancelled->RecordCount();
        print $this->sql->ErrorMsg();



        // Staffs
        $stmt_staffs = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_staff WHERE STF_STATUS = '1' AND STF_ACTORCOMPCODE = ".$this->sql->Param('a')."  ORDER BY STF_DATEADDED DESC"),array($actorcompcode));
        $stmt_staffs = $stmt_staffs->getAll();



        // Activities
        $stmt_activities = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_activities WHERE ACTV_STATUS = '1' OR ACTV_ACTORCOMPCODE = ".$this->sql->Param('a')."  ORDER BY ACTV_DATE DESC LIMIT 3"),array($actorcode));
        $stmt_activities = $stmt_activities->getAll();
        print $this->sql->ErrorMsg();


        
        // Riders
        $stmt_riders = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_riders WHERE RDR_STATUS = '1' OR RDR_COMP_CODE = ".$this->sql->Param('a')."  ORDER BY RDR_DATEADDED DESC "),array($actorcode));
        $stmt_riders_count = $stmt_riders->RecordCount();
        $stmt_riders_list = $stmt_riders->getAll();
        print $this->sql->ErrorMsg();
        


        $result = ['stmt_riders_count'=>$stmt_riders_count, 
        'stmt_clients_count'=>$stmt_clients_count, 
        'stmt_profit_total'=>$profit_total ,
        'stmt_expenses_total'=>$expenses_total, 
        'stmt_staffs'=>$stmt_staffs, 
        'stmt_allrides'=>$stmt_allrides ,
        'stmt_rides_completed'=>$stmt_rides_completed, 
        'stmt_rides_inprogress'=>$stmt_rides_inprogress, 
        'stmt_rides_cancelled'=>$stmt_rides_cancelled ,
        'stmt_activities'=>$stmt_activities,
        'stmt_riders_count'=>$stmt_riders_count,
        'stmt_riders_list'=>$stmt_riders_list ];

        return $result ;

      }
} 

?>