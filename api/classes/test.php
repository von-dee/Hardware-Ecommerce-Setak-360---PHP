<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class test extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        
        $this->response(array('msg'=>'Testing Worked Bro'),200);
    
    }
}