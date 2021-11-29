<?php
class Crypt{
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

	public function cipher(){
		return crypt(openssl_random_pseudo_bytes(16),'EH');
	}

	public function CryptoJSAesEncrypt($passphrase, $plain_text){ 
		$salt = openssl_random_pseudo_bytes(256); 
		$iv = openssl_random_pseudo_bytes(16); 
		$iterations = 999; 
		$key = hash_pbkdf2("sha512", $passphrase, $salt, $iterations, 64); 
		$encrypted_data = openssl_encrypt($plain_text, 'aes-256-cbc', hex2bin($key), OPENSSL_RAW_DATA, $iv); 
		$data = json_encode(array("ciphertext" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "salt" => bin2hex($salt))); 
		return base64_encode($data); 
	} 

	public function CryptoJSAesDecrypt($passphrase, $jsonString){ 
		$payload = base64_decode($jsonString);
		$jsondata = json_decode($payload, true); 
		try { 
			$salt = hex2bin($jsondata[salt]); 
			$iv = hex2bin($jsondata[iv]); 
		} catch(Exception $e) { 
			return null; 
		} 
		$ciphertext = base64_decode($jsondata[ciphertext]); 
		$iterations = 999; 
		//same as js encrypting 
		$key = hash_pbkdf2("sha512", $passphrase, $salt, $iterations, 64); 
		$decrypted= openssl_decrypt($ciphertext , 'aes-256-cbc', hex2bin($key), OPENSSL_RAW_DATA, $iv); 
		return json_decode($decrypted); 
	}
	
}//End Class
?>