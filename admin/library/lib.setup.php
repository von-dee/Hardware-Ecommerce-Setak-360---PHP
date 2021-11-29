<?php
#####################################################################################################
######################################								#################################
###################################### !!!!! DO NOT TOUCH	!!!!	#################################
######################################								#################################
#####################################################################################################
class setup {
    function __construct()
    {
        $this->postkeeper();
    }
    private 	function globalvars(){
		$result=array();
		$skip=array('GLOBALS','_ENV','HTTP_ENV_VARS',
					'_POST','HTTP_POST_VARS','_GET',
					'HTTP_GET_VARS', '_COOKIE',
					'HTTP_COOKIE_VARS','_SERVER',
					'HTTP_SERVER_VARS','_FILES',
					'HTTP_POST_FILES','_REQUEST',
					'HTTP_SESSION_VARS','_SESSION');
		foreach($GLOBALS as $k=>$v)
			if(!in_array($k,$skip))
				$result[$k]=$v;
		return $result;
	}
	private function postkeeper (){ 
		foreach ($this->globalvars() as $key=> $value){ 
			$this->$key=$value; 
		}
	}
	
	private function prohibit($key,$value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		if(is_array($value)){
			$valuex=array();
			foreach ($value as $v) {
				if (is_array($v)){
				$this->	prohibit($value,$v);
				}else{
					$valuex[] = sstr_ireplace($prohibited,"",$v);
				}
			}
			$value = $valuex;
		}else{
			$value = str_ireplace($prohibited,"",$value);
		}
		return $value;
	} 
}
function loadControllers( $class_name,$target=SYS_PUBLIC ) { 
	$namespace= explode('\\',$class_name); 
	 if(is_dir($target) && strpos($target ,"controllers") && strpos($target ,$namespace[0])){ 
	@include_once $target. $namespace[1] . '.php'; 
	}
	if(is_dir($target)){
			$files = glob( $target . '*', GLOB_MARK );    
			foreach( $files as $file )
			{
				loadControllers( $class_name,$file );
			} 
		} 
	}
	spl_autoload_register('loadControllers'); 
?>