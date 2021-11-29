<?php
 /**
 * Created by VSCode.
 * User: Reggie
 * Date: 8/5/2017
 * Time: 5:21 PM
 */
class logout extends REST{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
		 $sql=$this->sql;
		if($this->logout = true){
			$stmt = $sql->Execute($sql->Prepare("UPDATE app_users SET USR_LOGIN_STATUS = '0',USR_LASTLOGIN_DATE = ".$sql->Param('a')." WHERE USR_CODE = ".$sql->Param('e')),array($this->currentdate,$this->userid));
			
			if($stmt == true){
				$this->response(array('msg'=>'success','data'=>'done'),200);
			}else{
				$this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),204);
			}
		}else{
			$this->response(array('msg'=>'not-logout','data'=>'ERROR'),404);
		}
	}
}
?>