<?php
	//$config = new JConfig();
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


