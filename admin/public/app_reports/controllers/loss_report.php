<?php 
 namespace app_reports;
  class loss_report extends \setup { 
      function __construct(){
         parent::__construct(); 
      }
      function Init(){


        $actorcode = $this->session->get('actorid');
        $actorname = $this->session->get('loginuserfulname');
        $actorcompcode = $this->session->get('companycode');

        $actorcompname =  $this->engine->getCompanyData_SQL();


        $stmt_loss = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_sales WHERE SALE_STATUS = '1' AND SALE_ACTORCOMPCODE = ".$this->sql->Param('a')." AND SALE_DATEADDED BETWEEN ".$this->sql->Param('b')." AND ".$this->sql->Param('c')." ORDER BY SALE_DATEADDED DESC"),array($actorcompcode, $this->date_from , $this->date_to));
        

        $loss_list = $stmt_loss->getAll();

        $loss_sales_response = [];
         $items_total = 0;

         foreach ($loss_list as $val){

            $loss_total = 0.00;
            $cost_total = 0.00;
            $products = json_decode($val['SALE_PRODUCTSLIST']);
            
            foreach( $products as $keyd => $value){ 


               $stmt = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_products WHERE PROD_CODE = ".$this->sql->Param('a')." AND PROD_ACTORCOMPCODE = ".$this->sql->Param('a')." ORDER BY PROD_NAME DESC LIMIT 1"),array($value->productcode,$actorcompcode));

               $items_total = $items_total + 1;

               if($stmt->Recordcount() > 0){

                  $obj = $stmt->FetchNextObject();
                  
                  $cost_total_one  =  round((float)$obj->PROD_PURCHASEPRICE, 2) * round((float)$value->productquantity, 2);
                  $cost_total = $cost_total + $cost_total_one;

                  $loss_total_one = (round((float)$obj->PROD_SALESPRICE, 2) - round((float)$obj->PROD_PURCHASEPRICE, 2)) * round((float)$value->productquantity, 2); 
                  $loss_total = $loss_total + $loss_total_one;

               }
            }
            

            $val['SALE_TOTALNUMBEROFPROD'] = $items_total;
            $val['SALE_COST_TOTAL'] = $cost_total;
            $val['SALE_LOSS_TOTAL'] = $loss_total;
            
            
            // array_push($loss_sales_response, $val);            

         
         }


         $response = ['data'=>$loss_sales_response,  'company'=>$actorcompname->COMP_NAME, 'from'=>$this->date_from, 'to'=>$this->date_to];

         return $response;
      
    }
 } 
 
?>