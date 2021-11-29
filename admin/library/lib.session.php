<?php
class Session{
	function __construct(){
		session_start();
	}//End Function
	
	function set($name,$value){
		$_SESSION[$name] = $value;
	}//End Function
	
	function get($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}else{
			return false;
		}//End if
	}//End Function
	
	function del($name){
		unset($_SESSION[$name]);
	}//End Function
	
	function getSessionID(){
		return session_id();
	}//End Function
	
	function destroy(){
		$_SESSION = array();
		session_destroy();
	}//End Function
	
}//End Class
?>