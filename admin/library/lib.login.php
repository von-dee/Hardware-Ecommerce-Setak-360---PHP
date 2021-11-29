<?php
    /**
     *@desc this class handles all the client end log in details and methods
     *@desc this depands on the connect.php and Session.class.php
     */
	@define('USER_LOGIN_VAR',$uname);
	@define('USER_PASSW_VAR',$pwd);
	@define('USER_COUNT',$passager);
	@define('HIDDED_PASS',$doLogin);
	@define('HIDDED_PASSVALUE','systemPingPass');

//die($usname.'|'.$pwd);
	class Login{
		private $session;
		private $redirect;
		private $hashkey;
		private $md5 = false;
		private $sha2 = false;
		private $remoteip;
		private $useragent;
		private $sessionid;
		private $result;
		private $connect;
		private $crypt;
    	private $jconfig;

		public function __construct(){
			global $sql,$session;
			$this->redirect ="index.php?action=login";
			$this->hashkey	=$_SERVER['HTTP_HOST'];
			$this->sha2 = true;
			$this->remoteip = $_SERVER['REMOTE_ADDR'];
			$this->useragent = $_SERVER['HTTP_USER_AGENT'];
			$this->session	=$session;
			$this->connect = $sql;
			$this->crypt = new Crypt();
     		$this->sessionid = $this->session->getSessionID();
			$this->signin();
		}
		
		public function cryptpass($uname,$pass){
			if($this->md5){

			}else if($this->sha2){
			  	$pass = $this->crypt->loginPassword($uname,$pass);
			}else{
				$pass = USER_PASSW_VAR;
			} 
        	return $pass;
      	}


		private function signin(){

			if($this->session->get('hash_key')){
				$this->confirmAuth();
				return;
			}

			if(HIDDED_PASS != HIDDED_PASSVALUE ){
				$this->logout();
			}

			if(USER_LOGIN_VAR=="" || USER_PASSW_VAR == ""){
				$this->logout("empty");
			}

			if($this->md5){

			}else if($this->sha2){
			  	$passwrd = $this->crypt->loginPassword(USER_LOGIN_VAR,USER_PASSW_VAR);
			}else{
				$passwrd = USER_PASSW_VAR;
			}
			
		    //die($passwrd);
			$query = "SELECT USR_ID, USR_CODE, USR_FIRSTNAME, USR_PHOTO, USR_ACCESS_LEVEL, USR_COMPANY_CODE, USR_BRANCH_CODE, USR_STATUS, USR_LASTLOGIN_DATE, USR_LOGIN_STATUS, USR_EMAIL, USR_USERNAME, USR_COUNTRY, USR_GENDER, USR_OTHERNAME, USR_ACTOR_COMPCODE FROM app_users WHERE USR_STATUS='1' AND USR_USERNAME=".$this->connect->Param('a')." AND USR_PASSWORD=".$this->connect->Param('b')."";

			$stmt = $this->connect->Prepare($query);
			$stmt = $this->connect->Execute($stmt,array(USER_LOGIN_VAR,$passwrd));
			print $this->connect->ErrorMsg();

			if($stmt){
				if($stmt->RecordCount() > 0){

					$this->session->del("logincount");
					$arr = $stmt->FetchNextObject();
					$userid = $arr->USR_CODE;
					$accstatus = $arr->USR_STATUS;
					$infullname = $arr->USR_FIRSTNAME.' '.$arr->USR_OTHERNAME;
					$loginstatus = $arr->USR_LOGIN_STATUS;
					$branchcode = $arr->USR_BRANCH_CODE;
					
					$companycode = $arr->USR_ACTOR_COMPCODE;
					$logintime = $arr->USR_LASTLOGIN_DATE;
					$useraccesslevel = $arr->USR_ACCESS_LEVEL;
					$actor_compcode = $arr->USR_ACTOR_COMPCODE;

					
					$this->storeAuth($userid,USER_LOGIN_VAR,$infullname,$useraccesslevel,$branchcode,$companycode,$loginstatus,$accstatus,$logintime,$actor_compcode);
					$this->setLog("1");
					header('Location: ' . $this->redirect);
					//actions

				}else{
					$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  with USERNAME:".USER_LOGIN_VAR." and PASSWORD:".USER_PASSW_VAR;
					$toinsetsession = $this->session->getSessionID();
					$infullname ='';
					$type ='003';
					$raw = serialize($_SERVER);
					$query = "INSERT INTO app_eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('h').")";
					$stmt = $this->connect->Execute($query,array($type,'0',$infullname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$raw));

			        print $this->connect->ErrorMsg();
					$this->logout("wrong");
				}


			}else{
			//error msg
			}

		}//end

	public function direct($direction=''){
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-validate');
		header('Cache-Control: post-check=0, pre-check=0',FALSE);
		header('Pragma: no-cache');
		if($direction == 'empty'){
			header('Location: ' . $this->redirect.'&attempt_in=0');
		}else if($direction == 'wrong'){
			header('Location: ' .$this->redirect.'&attempt_in=1');
		}else if($direction == 'subspen'){
			header('Location: ' .$this->redirect.'&attempt_in=120');
		}else if($direction == 'alreadyin'){
			header('Location: ' .$this->redirect.'&attempt_in=140');
		}else if($direction == 'locked'){
			header('Location: ' .$this->redirect.'&attempt_in=110');
		}else if($direction=="out"){
			header('Location: ' .$this->redirect);
		}else if ( $direction =='captchax'){
			header('Location: ' .$this->redirect.'&attempt_in=11');
		}else if ( $direction =='lock'){
			header('Location: ' .$this->lockdirect);
		}else{
			header('Location: ' .$this->redirect);
		}
		exit;
	}

	public function storeAuth($userid,$login,$infullname,$useraccesslevel,$branchcode,$companycode,$loginstatus,$accstatus,$logintime,$actor_compcode){
		$this->session->set('actorid',$userid);
		$this->session->set('h1',$login);
		$this->session->set('loginuserfulname',$infullname);
		$this->session->set('useraccesslevel',$useraccesslevel);
		$this->session->set('branchcode',$branchcode);
		$this->session->set('companycode',$companycode);
		$this->session->set('loginstatus',$loginstatus);
		$this->session->set('accstatus',$accstatus);
		$this->session->set('logintime',$logintime);
		$this->session->set('actor_compcode',$actor_compcode);
		$this->session->set('random_seed',md5(uniqid(microtime())));
		$hashkey = md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent);
		$this->session->set('hash_key',$hashkey);
		$this->session->set("LAST_REQUEST_TIME",time());

		//UPDATE THE CURRENCY USER LOGIN DETAILS
		$this->connect->Execute("UPDATE app_users SET USR_LOGIN_STATUS = '1',USR_LASTLOGIN_DATE = ".$this->connect->Param('a').", USR_LOGIN_IP = ".$this->connect->Param('b')." WHERE USR_ID = ".$this->connect->Param('e'),array(date("Y-m-d H:i:s"),$this->remoteip,$userid));
	}//end

	public function logout($msg="out"){

		if($msg =="out"){
			//UPDATE THE CURRENCY USER LOGIN DETAILS
			$userid=$this->session->get("actorid");
			$this->connect->Execute("UPDATE app_users SET USR_LOGIN_STATUS = '0',USR_LASTLOGIN_DATE = ".$this->connect->Param('a')." WHERE USR_ID = ".$this->connect->Param('e'),array(date("Y-m-d H:i:s"),$userid));
			$this->setLog("0");
		}

		$this->session->del('actorid');
		$this->session->del('loginuserfulname');
		$this->session->del('useraccesslevel');
		$this->session->del('branchcode');
		$this->session->del('companycode');
		$this->session->del('loginstatus');
		$this->session->del('accstatus');
		$this->session->del('logintime');
		$this->session->del('actor_compcode');
		$this->session->del('h1');
		$this->session->del('random_seed');
		$this->session->del('hash_key');
		$this->direct($msg);
	}//end

	public function confirmAuth(){

		$login = $this->session->get("h1");
		$hashkey = $this->session->get('hash_key');

		if(md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent) != $hashkey){
			$this->logout();
		}else{
			//UPDATE SESSION
			$userid=$this->session->get("actorid");
			$this->connect->Execute("UPDATE app_users SET USR_LASTLOGIN_DATE = ".$this->connect->Param('a')." WHERE USR_ID = ".$this->connect->Param('e'),array(date("Y-m-d H:i:s"),$userid));
		}

	}//end

	private function setLog($act){
		$userid=$this->session->get("actorid");
		$ufullname = $this->session->get('loginuserfulname');
		$toinsetsession = $this->session->getSessionID();
		$raw = serialize($_SERVER);
		$query = "INSERT INTO app_eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('h').")";
		if($act == "1"){
			$type ='001';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}else if($act == "0"){
			$userid = ($userid == "0")?"-1":$userid;
			$type ='002';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}

        $this->connect->Execute($query,array($type,$userid,$ufullname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$raw));
          print $this->connect->ErrorMsg();
       }

	}
?>