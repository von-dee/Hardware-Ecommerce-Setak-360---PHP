<?php 
 namespace app_insight;
  class details extends \setup { 
      function __construct(){
        parent::__construct(); 
      }
      function Init(){
        $data =  $this->engine->getDataDecrypt($this->keys);
        return $data;
      }
 } ?>