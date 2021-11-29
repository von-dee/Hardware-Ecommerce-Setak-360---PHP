<?php
### Initialise database connection with adodb plugin
$sql = ADONewConnection($engine);
$sql->debug = $config->debug;
$sql->autoRollback = $config->autoRollback;
$sql->bulkBind = true;
$sql->SetFetchMode(ADODB_FETCH_ASSOC);
$db = $sql->Connect($server, $username, $password, $database);
$session = new Session(); 
if(!$db){
	exit('Connection Down');	
}

function generateFormToken() { 
	global $session;
	// generate a token from an unique value  
	$token = md5(uniqid(microtime(), true));     
	return $token;  
}

function validateFormToken() { 
	global $session;
   // check if a session is started and a token is transmitted, if not return an error 
   if(! $_POST){
	   return true;
   }
   
   // check if the form is sent with token in it
   if(!isset($_POST['token'])) {
	   return false;
   } 
   
   if(!isset($_SESSION['_token'])) {  
	   return false;
   } 

   // compare the tokens against each other if they are still the same
   if ($_SESSION['_token'] !== $_POST['token']) { 
	   return false;
   } 
   
   return true;
}


