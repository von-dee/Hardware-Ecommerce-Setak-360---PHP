<?php
### Orcons FrameWork 3 Class Edition which is compactible with Orcons Class API.
### Date Created: 19-09-2019.
### Developed By:  Dev.Team @ Orcons Systems Limited.

include "config.php"; 
 
if(isset($action) && strtolower($action) == 'login'){
include('public/login/login.view.php');
	die();
}

if(isset($action) && strtolower($action) == 'register'){
include('public/register/register.view.php');
	die();
}

$log = new Login();

if(isset($action) && strtolower($action) == 'logout'){ 
	$log->logout();
}

if(isset($doLogin) && $doLogin == 'systemPingPass'){
	header('Location: index.php?action=index&pg=dashboard');
	die('Please wait...redirecting page');
}

### Inside the system now
$config = new JConfig();
$engine = new Engine();
$uploadClass = new uploadClass();
$nav = new Nav();

## ini_set('display_errors', 1);

include("public/root.platform.php");

?>