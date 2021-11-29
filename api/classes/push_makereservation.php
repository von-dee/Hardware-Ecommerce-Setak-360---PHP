<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class push_makereservation extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        
        $gen_code =  $engine->generateCode("app_reservations", "RES", "RES_CODE", "RES_ID");
        

        $stmt = $sql->Execute($sql->Prepare("INSERT INTO app_reservations (RES_CODE,
        RES_SESSIONCODE,
        RES_PERSONS,
        RES_DATE,
        RES_TIME,
        RES_NAME,
        RES_EMAIL,
        RES_PHONE,
        RES_SPECIAL,
        RES_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').")"),array($gen_code,$this->sessioncode,$this->persons,$this->datesel,$this->timesel,$this->name,$this->email,$this->phone,$this->specialtext,"1"));
        
        if($stmt == true){
            $this->response(array('msg'=>'success','data'=>'done','msg_head'=>'Reservation Made','msg_body'=>'You successfully reserved a Table'),200);
        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg(),'msg_head'=>'Something went wrong!','msg_body'=>'We couldn\'t get you a table'),204);
        }

    }
}