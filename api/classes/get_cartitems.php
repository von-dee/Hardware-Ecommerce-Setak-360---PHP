<?php

/**
 * get_cartitems short summary.
 *
 * get_cartitems description.
 *
 * @version 1.0
 * @author Reggie
 */
class get_cartitems  extends REST
{
    function __construct(){
        parent::__construct();
        global$sql;
        $this->sql=$sql;
    }
    function Init(){
        $sql=$this->sql;

        $stmt = $sql->Execute($sql->Prepare("SELECT * FROM app_cartitems WHERE ITEM_SESSIONCODE =".$sql->Param('a')." "),array($this->sessioncode));

        if ($stmt->RecordCount()>0){
            $this->response(array('msg'=>'success','data'=>$stmt->getAll()),200);
        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),204);
        }
        
    }
}
