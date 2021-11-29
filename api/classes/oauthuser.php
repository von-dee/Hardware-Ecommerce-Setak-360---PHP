<?php

/**
 * oauthuser short summary.
 *
 * oauthuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class oauthuser  extends REST
{
    function __construct(){
        parent::__construct();
        global$sql;
        $this->sql=$sql;
    }
    function Init(){
        $sql=$this->sql;

        $stmt = $sql->Execute($sql->Prepare("SELECT INIT_APIKEY FROM app_init WHERE INIT_APIKEY =".$sql->Param('a')." "),array($_REQUEST['apikey']));
        if ($stmt->RecordCount()>0){
            return true;
        }
        return false;
    }
}