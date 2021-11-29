<?php
/**
 * REST API Framework v2.03
 * Developed by Reggie Gyan @ Orcons Systems
 * Date: 24-09-2019
 * Copyright: Orcons Systems
*/

//GLOBAL VARiABLES
global $sql,$session;

define('SYS_ROOT',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('SYS_CLASSES',	  SYS_ROOT.DS.'classes');
define('SYS_LIBRARY',	  SYS_ROOT.DS.'libraries');
define('SYS_PLUGIN',	  SYS_ROOT.DS.'plugins');
define('SYS_UPLOAD',	  SYS_ROOT.DS.'uploads');


//Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited,"",$value);
		$$key = @trim($value);
	}
}
if($_FILES){
	foreach($_FILES as $keyimg => $values){
		foreach($values as $key => $value){
			$$key = $value;
		}
	}
}

//SYSTEM TIMEZONE FORMAT
date_default_timezone_set('UTC');

class JConfig {

	public $secret='93QWes1MyCh86';
	public $debug = false;
	public $autoRollback= true;
	public $ADODB_COUNTRECS = false;
	private static $_instance;

	public function __construct(){
	}

	private function __clone(){}

	public static function getInstance(){
	if(!self::$_instance instanceof self){
	     self::$_instance = new self();
	 }
	    return self::$_instance;
	}

}

// Global Values
$config = JConfig::getInstance();


//included classes
include SYS_LIBRARY.DS."lib.session.php";
include SYS_PLUGIN.DS."adodb".DS."adodb.inc.php";
include SYS_LIBRARY.DS."lib.connect.php";
include SYS_LIBRARY.DS."lib.sql.php";
include SYS_LIBRARY.DS."lib.crypt.php";
include SYS_LIBRARY.DS."lib.onesignal.php";

spl_autoload_register(function ($class_name) {
    include SYS_CLASSES.DS. $class_name . '.php';
});


?>