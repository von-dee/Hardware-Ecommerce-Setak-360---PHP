<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class initapp extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
		 $sql = $this->sql;
         $engine = new Engine();
         $token = $engine->generateApiKey();  
         $userid = $engine->initUserCode('app_init','INIT','INIT_USRCODE');
         $addeddate = date("Y-m-d H:s:m" );
         if($token){
            $stmt = $sql->Execute($sql->Prepare("INSERT INTO app_init (INIT_USRCODE,INIT_APIKEY,INIT_DATE_ADDED) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').")"),array($userid,$token,$addeddate));
            if($stmt==true){
                $this->response(array('msg'=>'success','data'=>array('initcode'=>$token,'initid'=> $userid,'initcipher'=>'1','imgurl'=>$this->api_imgurl)),200);
            }else{
                $this->response(array('msg'=>'no token','data'=>$sql->ErrorMsg()),204);
            }
         }else{
            $this->response(array('msg'=>'error generating token'),404);
         }
    }
	

}