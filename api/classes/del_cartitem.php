<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class del_cartitem extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        
        $stmt = $sql->Execute($sql->Prepare("UPDATE app_cartitems SET ITEM_STATUS = '0' WHERE ITEM_CODE = ".$sql->Param('e')),array($this->userid));
        
        if($stmt == true){
            $this->response(array('msg'=>'success','data'=>'done'),200);
        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),204);
        }
        

    }
}