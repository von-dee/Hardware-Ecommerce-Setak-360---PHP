<?php 
 namespace app_profile;
  class details extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $data =  $this->engine->getDataDecrypt($this->keys);
        return $data;
      }
 } ?>