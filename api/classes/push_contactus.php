<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class push_contactus extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        
        $gen_code =  $engine->generateCode("app_contactus", "CON", "CON_CODE", "CON_ID");
        

        $stmt = $sql->Execute($sql->Prepare("INSERT INTO app_contactus (CON_CODE,
        CON_SUBJECT,
        CON_MESSAGE,
        CON_FIRSTNAME,
        CON_LASTNAME,
        CON_EMAIL,
        CON_PHONE,
        CON_ACTORID,
        CON_ACTORCOMPCODE,
        CON_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').")"),array($gen_code,"Visitor's Message",$this->message_body,$this->first_name,$this->last_name,$this->email,$this->phone,"","","1"));
        
        if($stmt == true){
            $this->response(array('msg'=>'success','data'=>'done','msg_head'=>'Message Sent','msg_body'=>'You successfully sent a message, we will get back please.'),200);
        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg(),'msg_head'=>'Something went wrong!','msg_body'=>'We couldn\'t get you a table'),204);
        }

    }
}