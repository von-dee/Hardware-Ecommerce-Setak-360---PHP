<?php
	/**
	 * REST API Framework v2.03
	 * Developed by Reggie Gyan @ Orcons Systems
	 * Date: 24-09-2019
	 * Copyright: Orcons Systems
	 */

	error_reporting(E_ALL ^ E_NOTICE);
	require_once("rest.inc.php");
	require_once("config.php");
	include SYS_LIBRARY.DS."lib.engine.php";

	class API extends REST {
		
		public function __construct(){
			parent::__construct();
        }

		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){
			
            if (isset($_REQUEST['apikey'])){
				
                $function=  new oauthuser();
				if ($function->Init()===true){
					
					if (isset($_REQUEST['actions'])){
						$func = strtolower(trim(str_replace("/","",$_REQUEST['actions'])));
					}
					if(!@class_exists($func)){
						$this->response('No class',404);
					}else{
						$function=  new $func();
						$function->Init();
					}
				}else{
					$this->response('YOUR MODA SAY WHAAAAAAT!!',200);
				}
            }else{
				switch ( $func = strtolower(trim(str_replace("/","",$_REQUEST['actions'])))){
				   case'initapp':
					   $function=  new initapp();					 	  
					   $function->Init();
				   break;
				   default:
					   $this->response('404 Like That!!',404);
				   break;
				}
			}
		}

		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}

	// Initiiate Library

	$api = new API;
	$api->processApi();
?>