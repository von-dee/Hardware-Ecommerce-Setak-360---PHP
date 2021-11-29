<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Reggie
 */
class push_cartcheckout extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        
        $sql = $this->sql;
        $engine = new Engine();
        $addeddate = date("Y-m-d H:s:m" );
        $gen_code =  $engine->generateCode("app_checkouts", "CHK", "CHKOUT_CODE", "CHKOUT_ID");
        
        if(!empty($this->foodsselected) && $this->foodsselected != "[]" && $this->foodsselected != "null" && !empty($this->phonenumber)){

            $name = $this->firstname." ".$this->lastname;

            $stmt = $sql->Execute($sql->Prepare("INSERT INTO app_checkouts (CHKOUT_CODE,
            CHKOUT_SESSIONCODE,
            CHKOUT_ITEMS,
            CHKOUT_COUPON,
            CHKOUT_SUBTOTAL,
            CHKOUT_DELIVERYCOST,
            CHKOUT_ORDERTOTAL,
            CHKOUT_STATUS,
            CHKOUT_TOTALITEMS,
            CHKOUT_LOCATION,
            CHKOUT_LOCATIONID,
            CHKOUT_NAME,
            CHKOUT_PHONE,
            CHKOUT_EMAIL,
            CHKOUT_ORDERDATE,
            CHKOUT_ORDERTIME
            ) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('b').",".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').")"),
            array($gen_code,$this->sessioncode,$this->foodsselected,"",$this->subtotal,$this->shipping,$this->ordertotal,"1",$this->totalitems,$this->location_fromname,$this->location_fromid,$name,$this->phonenumber,$this->email,$this->datesel,$this->timesel));
            
            if($stmt == true){
                $this->response(array('msg'=>'success','data'=>'done','msg_head'=>'Order Successful','msg_body'=>'You successfully made an Order'),200);
            }else{
                $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg(),'msg_head'=>'We couldn\'t get your order made','msg_body'=>'Something went wrong!'),204);
            }

        }else{
            $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg(),'msg_head'=>'Your Cart or Phone Number is Empty','msg_body'=>'Something went wrong!'),204);
        }

    }
}