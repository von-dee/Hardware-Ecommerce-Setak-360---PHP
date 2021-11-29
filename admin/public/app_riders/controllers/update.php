<?php 
 namespace app_riders;
  class update extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          
          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');                    
          


          $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_riders SET 
          RDR_FIRSTNAME = ".$this->sql->Param('a').", 
          RDR_LASTNAME = ".$this->sql->Param('a').", 
          RDR_DATEOFBIRTH = ".$this->sql->Param('a').", 
          RDR_HOMEADDRESS = ".$this->sql->Param('a').", 
          RDR_PHONE = ".$this->sql->Param('a').", 
          RDR_EMAIL = ".$this->sql->Param('a').", 
          RDR_BIKE_CODE = ".$this->sql->Param('a').",
          RDR_BIKE_NAME = ".$this->sql->Param('a').", 
          RDR_BIKE_NUMBERPLATE = ".$this->sql->Param('a').", 
          RDR_BIKE_CHARSESNO = ".$this->sql->Param('a').", 
          RDR_BIKE_DESCRIPTION = ".$this->sql->Param('a').", 
          RDR_NUMTRIPS = ".$this->sql->Param('a').", 
          RDR_REVENUE = ".$this->sql->Param('a').", 
          RDR_LASTTRIPDATE = ".$this->sql->Param('a').", 
          RDR_STATUS = ".$this->sql->Param('a').", 
          RDR_NOTE = ".$this->sql->Param('a').", 
          RDR_LICENSENO = ".$this->sql->Param('a').", 
          RDR_LICENSE_TYPE = ".$this->sql->Param('a').", 
          RDR_BIKE_TYPE_CODE = ".$this->sql->Param('a').", 
          RDR_BIKE_TYPE_NAME = ".$this->sql->Param('a').", 
          RDR_BIKE_TYPE_URL = ".$this->sql->Param('a').", 
          RDR_CONTAINER_CODE = ".$this->sql->Param('a').", 
          RDR_CONTAINER_TYPE = ".$this->sql->Param('a').",  
          RDR_CONTAINER_DESC = ".$this->sql->Param('a')."
           
           WHERE  RDR_CODE = ".$this->sql->Param('a')." AND RDR_COMP_CODE = ".$this->sql->Param('a')),array(
            $this->rider_firstname,
            $this->rider_lastname, 
            $this->rider_dateofbirth, 
            $this->rider_homeaddress,
            $this->rider_phone, 
            $this->rider_email, 
            $gen_bike_code, 
            $this->bike_brand, 
            $this->bike_license_plate, 
            $this->bike_charses_number, 
            $this->bike_description, 
            "", 
            "", 
            "", 
            "1", 
            $this->rider_more_info, 
            $this->license_type, 
            $this->rider_licenseno, 
            "", 
            "", 
            "", 
            $this->assets_container_code, 
            $this->assets_container_type, 
            $this->assets_container_description, 
            $this->keys, 
            $actorcompcode, 
           ));
          print $this->sql->ErrorMsg();
     
		 
          if($stmt == true){

            $message = "You updated Rider's details";
            $type = "2";
            $reqcode = $this->keys;
            $reqtitle = "Updated Rider Details"; 
            $reqtype = "badge-info-inverse";
            $reqicon = "feather icon-users";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);


            $act_message = "You updated Rider's details";
            $act_type = "2";
            $act_reqcode = $this->keys;
            $act_reqtitle = "Updated Rider Details"; 
            $act_reqtype = "badge-info-inverse";
            $act_reqicon = "feather icon-users";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Updated Rider Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;

        
        }
    } 
 // }
 ?>