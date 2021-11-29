[17:08] solomon akoto
    
<?php
    /**
     * This functions define the login Event for patient 
     * on the patient socialhealth app
    */
    class loginevent extends REST{
        public function __construct(){
            parent :: __construct();
            global $sql;
            $this->sql=$sql;
        }
        function Init(){
            if($setlog==200){
                $stmta = $sql->Execute($sql->Prepare("INSERT INTO webmin_eventlog(EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('g').")"),array($type,$userid,$ufullname,$activity,$remoteip,$toinsetsession,$useragent,$ser));
                
                if($stmta == true ){
                    $this->response(array('msg'=>'success','data'=>'done'),200);
                }else{
                    $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),404);
                }


            }else{
                $stmte = $sql->Execute($sql->Prepare("INSERT INTO webmin_eventlog(EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').")"),array($type,'0',$ufullname,$activity,$remoteip,$toinsetsession,$useragent));


                if($stmte == true ){
                    $this->response(array('msg'=>'success','data'=>'done'),200);
                }else{
                    $this->response(array('msg'=>'error','data'=>$sql->ErrorMsg()),404);
                }
            }
            
        }
    }    
?>




