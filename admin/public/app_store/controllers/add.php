<?php 
 namespace app_store;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          

          $gen_code =  $this->engine->generateCode_SQL("app_products", "PRD", "PROD_CODE", "PROD_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');
        
          $productImage = "";

          if(!empty($_FILES['productImage']['tmp_name'])){				
              $productImagename = $this->uploadClass->uploadAttachement($_FILES['productImage'],'');
              $productImage = $productImagename;
          }          


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_products (
          PROD_CODE,
          PROD_NAME,
          PROD_SPECCODE,
          PROD_SUPPLIER_CODE,
          PROD_SUPPLIER_NAME,
          PROD_PURCHASEPRICE,
          PROD_SALESPRICE,
          PROD_PICTUREURL,
          PROD_DESCRIPTION,
          PROD_TAXRATE,
          PROD_QUANTITY,
          PROD_MINQUANTITY,
          PROD_CATEGORY_CODE,
          PROD_CATEGORY_NAME,
          PROD_ACTORCODE,
          PROD_ACTORCOMPCODE,
          PROD_STATUS
          ) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),
          array($gen_code, $this->productTitle, "", "", "", $this->productCost, $this->productPrice, $productImage, $this->productDescription, "", "", "", "", "", "", "", "1"));

          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added ".$this->productTitle." to your Products List";
            $type = "2";
            $reqcode = $gen_code;
            $reqtitle = "Added Product";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-box";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added ".$this->productTitle." to your Products List";
            $act_type = "2";
            $act_reqcode = $gen_code;
            $act_reqtitle = "Added Product";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-box";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Product Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>