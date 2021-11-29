<?php 
 namespace app_store;
  class update extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');                    
          
          
          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_store SET 
          AST_TYPE = ".$this->sql->Param('a').", 
          AST_NAME = ".$this->sql->Param('a').", 
          AST_INFO = ".$this->sql->Param('a').", 
          AST_DESCRIPTION = ".$this->sql->Param('a').", 
          AST_DATE_PURCHASE = ".$this->sql->Param('a').", 
          AST_PRICE = ".$this->sql->Param('a').",  
          AST_QUANTITY = ".$this->sql->Param('a')." WHERE  AST_CODE = ".$this->sql->Param('a')." AND AST_ACTORCOMP = ".$this->sql->Param('a')),array(
            $this->assets_type, $this->assets_name, $this->assets_info, $this->assets_description,$this->assets_purchasedate, $this->assets_price,$this->assets_quantity, $this->keys, $actorcompcode));


          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            $message = "You updated ".$this->assets_name." of your categories";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Updated Assets Details"; 
            $reqtype = "badge-info-inverse";
            $reqicon = "feather icon-box";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You updated ".$this->assets_name." of your categories";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Updated Assets Details"; 
            $act_reqtype = "badge-info-inverse";
            $act_reqicon = "feather icon-box";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Updated Assets Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
        }
    } 
 // }
 ?>