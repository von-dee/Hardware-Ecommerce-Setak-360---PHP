<?php 
 namespace app_store;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  
          $gen_assets_code =  $this->engine->generateCode_SQL("app_store", "AST", "AST_CODE", "AST_ID");
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');



          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_store (
          AST_CODE,
          AST_TYPE,
          AST_NAME,
          AST_INFO,
          AST_DESCRIPTION,
          AST_DATE_PURCHASE,
          AST_PRICE,
          AST_QUANTITY,
          AST_ACTORCODE,
          AST_ACTORNAME,
          AST_ACTORCOMP,
          AST_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),
          array($gen_assets_code, $this->assets_type, $this->assets_name, $this->assets_info, $this->assets_description, $this->assets_purchasedate, $this->assets_price, $this->assets_quantity, $actorcode, $actorname, $actorcompcode,"1"));
          print $this->sql->ErrorMsg();

          if($stmt == true){
            
            $message = "You added ".$this->assets_name." to your assets";
            $type = "2";
            $reqcode = $gen_assets_code;
            $reqtitle = "Added Assets";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-box";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You added ".$this->assets_name." to your assets";
            $act_type = "2";
            $act_reqcode = $gen_assets_code;
            $act_reqtitle = "Added Assets";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-box";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Asset Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>