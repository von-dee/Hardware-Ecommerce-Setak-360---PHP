<?php 
 namespace app_store;
  class insert extends \JConfig { 
      function __construct(){
        parent::__construct();
        
      }
      function Init(){
$stmt = $this->sql->Execute($this->sql->Prepare("INSERT INTO app_store (name,is_user) 
VALUES (".$this->sql->param('1').",".$this->sql->param('2').")"),[$this->name,$this->isuser]);
      
      if ($stmt){
        return true;
      }else{
        return false;
      }
    }
 } ?>