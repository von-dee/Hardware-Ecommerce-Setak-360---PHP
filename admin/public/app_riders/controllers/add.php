<?php 
 namespace app_riders;
  class add extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        // if($this->engine->validatePostForm($this->microtime)){  

          

          $gen_rider_code =  $this->engine->generateCode_SQL("app_riders", "RDR", "RDR_CODE", "RDR_ID");
          $gen_bike_code =  $this->engine->generateCode_SQL("app_riders_bikes", "BIK", "BIK_CODE", "BIK_ID");

          $actorcode = $this->session->get('actorid');
          $actorname = $this->session->get('loginuserfulname');
          $actorcompcode = $this->session->get('companycode');
          


          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_riders (
          RDR_CODE,
          RDR_FIRSTNAME,
          RDR_LASTNAME,
          RDR_DATEOFBIRTH,
          RDR_HOMEADDRESS,
          RDR_PHONE,
          RDR_EMAIL,
          RDR_BIKE_CODE,
          RDR_BIKE_NAME,
          RDR_BIKE_NUMBERPLATE,
          RDR_BIKE_CHARSESNO,
          RDR_BIKE_DESCRIPTION,
          RDR_NUMTRIPS,
          RDR_REVENUE,
          RDR_LASTTRIPDATE,
          RDR_STATUS,
          RDR_NOTE,
          RDR_LICENSENO,
          RDR_LICENSE_TYPE,
          RDR_BIKE_TYPE_CODE,
          RDR_BIKE_TYPE_NAME,
          RDR_BIKE_TYPE_URL,
          RDR_CONTAINER_CODE,
          RDR_CONTAINER_TYPE,
          RDR_CONTAINER_DESC,
          RDR_COMP_ACTORID,
          RDR_COMP_ACTORNAME,
          RDR_COMP_CODE,
          RDR_COMP_NAME) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array(
          $gen_rider_code, 
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
          $actorcode, 
          $actorname, 
          $actorcompcode,
          "" ));


          print $this->sql->ErrorMsg();



          $stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_riders_bikes (
            BIK_CODE,
            BIK_NAME,
            BIK_BRAND_NAME,
            BIK_TYPE,
            BIK_REGNUMBER,
            BIK_CHARSESNUMBER,
            BIK_DESCRIPTION,
            BIK_STATUS,
            BIK_ACTORID,
            BIK_ACTORNAME,
            BIK_ACTORCOMP) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array(
            $gen_bike_code, 
            "", 
            $this->bike_brand,
            "", 
            $this->bike_license_plate, 
            $this->bike_charses_number,
            $this->bike_description, 
            "1",
            $actorcode, 
            $actorname, 
            $actorcompcode));

            print $this->sql->ErrorMsg();







          if($stmt == true){
            
            $message = "You added ".$this->rider_lastname." ".$this->rider_firstname." as a Rider";
            $type = "2";
            $reqcode = $gen_rider_code;
            $reqtitle = "Added Rider";
            $reqtype = "badge-success-inverse";
            $reqicon = "feather icon-users";
            $notify =  $this->engine->saveNotification_SQL($actorcode,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);

            


            $act_message = "You added ".$this->rider_lastname." ".$this->rider_firstname." as a Rider";
            $act_type = "2";
            $act_reqcode = $gen_rider_code;
            $act_reqtitle = "Added Rider";
            $act_reqtype = "badge-success-inverse";
            $act_reqicon = "feather icon-users";
            $activity =  $this->engine->saveActivity_SQL($act_message,$act_type,$act_reqcode,$act_reqtitle,$act_reqtype,$act_reqicon );

            $alert = $this->engine->alert_SQL("success", "Successful", "Added Rider Successfully");

          }else{

            $alert = $this->engine->alert_SQL("error", "Oops...", "An Error Occurred: Try Again");

          }

          return true;
         }
      }
 //} 
 ?>