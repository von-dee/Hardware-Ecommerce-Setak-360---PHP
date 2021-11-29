<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class push_cartitem extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        
        $gen_code =  $engine->generateCode("app_cartitems", "ITM", "ITEM_CODE", "ITEM_ID");
        

		if($this->logout = true){
			$stmt = $sql->Execute($sql->Prepare("INSERT INTO app_cartitems (ITEM_CODE,
            ITEM_NAME,
            ITEM_SESSIONCODE,
            ITEM_PRICE,
            ITEM_QUANTITY,
            ITEM_CARTCODE,
            ITEM_ACTORID,
            ITEM_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').")"),array($gen_code,$this->name,$this->sessioncode,$this->price,$this->quantity,$this->cartcode,$this->actorid,"1"));
			
			if($stmt == true){
				$this->response(array('msg'=>'success','data'=>'done'),200);
			}else{
				$this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),204);
			}
		}else{
			$this->response(array('msg'=>'not-logout','data'=>'ERROR'),404);
        }
        
        $this->response(array('msg'=>'Push Testing Worked Bro'),200);
    
    }
}