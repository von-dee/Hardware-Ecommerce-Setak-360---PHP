<?php
class Engine{
	public $sql;
	public $session;
	public $phpmailer;
	
	function  __construct() {
		global $sql,$session,$phpmailer;
		$this->session= $session;
		$this->sql = $sql;
		$this->phpmailer = $phpmailer;
	}
	
	public function concatmoney($num){
		if($num>1000000000000) {
			return round(($num/1000000000000),1).' tri';
		}else if($num>1000000000){ return round(($num/1000000000),1).' bil';
		}else if($num>1000000) {return round(($num/1000000),1).' mil';
		}else if($num>1000){ return round(($num/1000),1).' k';
		}
		return number_format($num);
	}// end of money abreviation function 
	
	public function generateNameforClientPhoto($clientname){
        $rand_numb = md5(uniqid(microtime()));
        $neu_name = $rand_numb.$clientname;
        return $neu_name;
    }
	
	public function generateApiKey(){
		$length = '64';
		$token = bin2hex(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length));
		return $token;
	}

	public function generateCode($table,$prefix,$base_col){
		global $sql;
		$no_prec = 10;#Maximum number of preceding Zeros;
		$stmt = $sql->Execute($sql->Prepare("SELECT $base_col FROM  $table ORDER BY RIGHT ($base_col,$no_prec) DESC LIMIT 1"));
		print $sql->ErrorMsg();
		if($stmt->RecordCount() > 0){
			$obj = $stmt->FetchNextObject();
			$rawcount = substr($obj->$base_col,strlen($prefix),100);
			$rawcount = $rawcount + 1;
			$multiplier = $no_prec - strlen($rawcount);
			$multiplier = $multiplier <=0 ? 0 : $multiplier ;
			$code = str_repeat("0",$multiplier) . $rawcount;
		}else{
			$code = str_repeat("0",$no_prec) . 1;
		}
		return $prefix.$code;
	}

	public function initUserCode($table, $prefix, $code_column){
        $code_column = strtoupper($code_column);
        $final = uniqid($prefix) ;
        #check if code already exists
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
        if($stmt->RecordCount()>0){
            return  $this->generateCode($table, $prefix, $code_column);
        }
        return $final ;
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

	public function generate_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0C2f ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
        );
	}
	
	function slugGenerator($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
	public function setnotification($userid,$message,$type){
		global $sql;
		$notifydate = date('Y-m-d H:i:s');
		$notifycode = generateCodex('app_notifications','NFY','NOTE_CODE');
		$stmt = $sql->Execute($sql->Prepare("INSERT INTO app_notifications (NOTE_CODE,NOTE_USERID,NOTE_MESSAGE,NOTE_TYPE,NOTE_DATEADDED) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').") "),[$notifycode,$userid,$message,$type,$notifydate]);
		print $sql->ErrorMsg();
		if($stmt==true){
			$notify = array('code'=>$notifycode,'status'=>'done');
		}else{
			$notify = array('code'=>'null','status'=>'done');
		}
		return $notify ;
	}
	
}
