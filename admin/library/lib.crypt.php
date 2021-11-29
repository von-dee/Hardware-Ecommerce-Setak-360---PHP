<?php
class Crypt {
	private $algorithm;
	private $key;
	private $config;
	private $mode;
	private $stream;
	
	public function __construct(){
		$this->config = new JConfig();
	}//End Function
	
	public function loginPassword($username,$password){
		$pepper = "$@&&%***TDOR)){987}[]";
		$salt   = $username;
		return  hash("sha256",$pepper.$password.$salt,false);
	}
	
}//End Class
?>