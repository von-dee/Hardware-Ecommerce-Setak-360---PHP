<?php 
 namespace app_messages;
  class details extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $data =  $this->engine->getDataDecrypt($this->keys);


        $stmt = $this->sql->Execute($this->sql->Prepare("UPDATE app_messages SET MESG_STATUS = '0' WHERE  MESG_CODE = ".$this->sql->Param('a')." "),array($data['MESG_CODE']));
          print $this->sql->ErrorMsg();

        return $data;
      }
 } ?>