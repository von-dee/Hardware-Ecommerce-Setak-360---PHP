<?php
### CORE System Information
## error_reporting(E_ALL); 
## ini_set('display_errors', 'on');

global $pg,$option,$target,$view,$viewpage,$msg,$status,$keys,$microtime,$formToken,$class_call;

### System Variables
define("DEV_MODE",'true');
define("APP_NAME","Framework 3");
define("APP_FAVICON","madia/images/favicon.png");
define("APP_LOGO","madia/images/logo.svg");

define("SYS_ROOT",dirname(__FILE__));
define("DS",DIRECTORY_SEPARATOR);
define("SYS_LIBRARIES", SYS_ROOT.DS."library");
define("SYS_MEDIA",     SYS_ROOT.DS."media");
define("SYS_PLUGINS",   SYS_ROOT.DS."plugins");
define("SYS_PUBLIC",    SYS_ROOT.DS."public");
define("SYS_THEME",     SYS_ROOT.DS."theme");
define("SYS_INSTALL",   SYS_ROOT.DS."install");
define("SYS_UPLOAD",    SYS_MEDIA.DS."upload".DS);


## Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited,"",$value);
		$value = prohibit($key,$value,$prohibited);
		$$key = @trim($value);
	}
}

function prohibit($key,$value,$prohibited){
	if(is_array($value)){
		$valuex = array();
		foreach ($value as $v) {
			if (is_array($v)){
			 	prohibit($value,$v,$prohibited);
			}else{
				$valuex[] = str_ireplace($prohibited,"",$v);
			}
		}
		$value = $valuex;
	}else{
		$value = str_ireplace($prohibited,"",$value);
	}
	return $value;
}

if($_FILES){
	foreach($_FILES as $keyimg => $values){
		foreach($values as $key => $value){
			$$key = $value;
		}
	}
}

## SYSTEM TIMEZONE FORMAT
date_default_timezone_set('UTC');

class JConfig {
	public $secret='03Ui90d3XfCh80';
	public $debug = false;
	public $autoRollback= true;
	public $ADODB_COUNTRECS = false;
	public $SASS_DEV_MODE = true;
	private static $_instance;
	public function __construct(){}
	private function __clone(){}
	public static function getInstance(){
		if(!self::$_instance instanceof self){
			self::$_instance = new self();
		}
			return self::$_instance;
	}
	public function codeDebug($params){
		echo '<pre>';
		var_dump($params);exit;
	 	echo '</pre>';
	}
}

$config = JConfig::getInstance();

## Included Classes
include SYS_LIBRARIES.DS."lib.session.php";
include SYS_PLUGINS.DS."adodb".DS."adodb.inc.php";
include SYS_PLUGINS.DS."PHPExcel".DS."PHPExcel.php";
include SYS_LIBRARIES.DS."lib.connect.php";
include SYS_LIBRARIES.DS."lib.sql.php";
if(!validateFormToken()){}
include SYS_LIBRARIES.DS."lib.crypt.php";
include SYS_LIBRARIES.DS."lib.engine.php";
include SYS_LIBRARIES.DS."lib.login.php";
include SYS_LIBRARIES.DS."lib.navigator.php";
include SYS_LIBRARIES.DS."lib.pagination.php";
include SYS_LIBRARIES.DS."pagination.Class.php";
include SYS_LIBRARIES.DS."upload.class.php";

if(DEV_MODE == 'true'){
	include SYS_PLUGINS.DS."style.inc.php";
	// include SYS_PLUGINS.DS."scssrouter".DS."generatelinks.php";
	include SYS_INSTALL.DS.'project.php';
}
include SYS_LIBRARIES.DS."lib.setup.php";

?>