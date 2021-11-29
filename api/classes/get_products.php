<?php

/**
 * get_products short summary.
 *
 * get_products description.
 *
 * @version 1.0
 * @author Reggie
 */
class get_products  extends REST
{
    function __construct(){
        parent::__construct();
        global$sql;
        $this->sql=$sql;
    }
    function Init(){
        $sql=$this->sql;

        $stmt = $sql->Execute($sql->Prepare("SELECT * FROM app_products"),array());

        if ($stmt->RecordCount()>0){
            $this->response(array('msg'=>'success','data'=>$stmt->getAll()),200);
        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),204);
        }
        
    }
}