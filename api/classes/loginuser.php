<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class loginuser extends REST{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        $sql=$this->sql;
        $engine = new Engine();
        $crypt = new Crypt();
        $password = $crypt->loginPassword($this->usname,$this->pwd);
        //var_dump($password); exit;
        $stmt = $sql->Execute($sql->Prepare("SELECT USR_CODE,USR_FIRSTNAME,USR_OTHERNAME,USR_EMAIL,USR_APIKEY,USR_PHOTO FROM app_users WHERE USR_USERNAME=".$sql->Param('a')." AND USR_PASSWORD=".$sql->Param('b')." AND USR_STATUS=".$sql->Param('c')." "),array($this->usname,$password,'1'));

        if($stmt->RecordCount() > 0){
            $result = $stmt->FetchRow();
            $userapikey = $result['USR_APIKEY'];
            $clientid = $result['USR_CODE'];
            $checkinit = $sql->Execute($sql->Prepare("SELECT INIT_ID FROM app_init WHERE INIT_USRCODE=".$sql->Param('a')." "),array($this->userid));
                if($checkinit->RecordCount() >0){
                    $id = $checkinit->FetchRow();
                    $code = $id['INIT_ID'];
                    $sql->Execute($sql->Prepare("UPDATE app_init SET INIT_APIKEY=".$sql->Param('a').",INIT_USRCODE=".$sql->Param('b').",INIT_STATUS='2' WHERE INIT_ID=".$sql->Param('c').""),array($userapikey,$clientid,$code));
                    $this->response(array('msg'=>'success','data'=>$result,'imgurl'=>$this->api_imgurl),200);
                }else{
                    $this->response(array('msg'=>'error','data'=>'user-not-found'),404);
                }
        }else{
            $this->response(array('msg'=>'info','data'=>'notauser'),204);
            //$this->response($sql->ErrorMsg(),404);
        }
    }
		

}