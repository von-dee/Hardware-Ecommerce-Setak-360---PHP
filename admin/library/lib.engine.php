<?php
class Engine{
	public $sql;
	public $session;
	public $phpmailer;
	
	function  __construct() {
	    global $sql,$session,$phpmailer,$mongo;
		$this->session= $session;
		$this->sql = $sql;
		$this->mongo = $mongo;
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
	
	// Generate API Key
	public function generateApiKey(){
		$length = '64';
		$token = bin2hex(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length));
		return $token;
	}

	// SQL Generate Code	
	// public function generateCode_SQL(String $collection,String $prefix,String $base_col,String $order_col){
	public function generateCode_SQL($collection,$prefix,$base_col,$order_col){
        $items= $prefix.date('y');
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT ".$base_col." FROM ".$collection." ORDER BY ".$order_col." DESC LIMIT 1 "));
		print $this->sql->ErrorMsg();
        if($stmt->RecordCount() > 0){
			$obj = $stmt->FetchNextObject();
			$order = substr($obj->$base_col,6,10000000);
			$order = $order + 1;
            if(strlen($order) == 1){
                $orderno = $items.'-000000'.$order;
            }else if(strlen($order) == 2){
                $orderno = $items.'-00000'.$order;
            }else if(strlen($order) == 3){
                $orderno = $items.'-0000'.$order;
            }else if(strlen($order) == 4){
                $orderno = $items.'-000'.$order;
            }else if(strlen($order) == 5){
                $orderno = $items.'-00'.$order;
            }else if(strlen($order) == 6){
                $orderno = $items.'-0'.$order;
            }else if(strlen($order) == 7){
                $orderno = $items.'-'.$order;
            }else{
                $orderno = $items.$order;
            }
        }else{
            $orderno = $items.'-0000001';
        }
        return $orderno;
	}



	public function getDashboardCounts_SQL(){
		
		$actorcompcode = $this->session->get('companycode');


		$stmt_new = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '1' "),array());
		if($stmt_new){
			$requests_new = $stmt_new->RecordCount();
		}
		


		$stmt_inprogress = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '2' OR CHKOUT_STATUS = '3' OR CHKOUT_STATUS = '4 "),array());
		if($stmt_inprogress){
			$requests_inprogress = $stmt_inprogress->RecordCount();
		}
		

		  
		$stmt_completed = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '5' "),array());
		if($stmt_completed){
			$requests_completed = $stmt_completed->RecordCount();
		}
		


		$stmt_cancelled = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_checkouts WHERE CHKOUT_STATUS = '0' "),array());
		if($stmt_cancelled){
			$requests_cancelled = $stmt_cancelled->RecordCount();
		}
		


		$stmt_all = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_checkouts "),array());
		if($stmt_all){
			$requests_all = $stmt_all->RecordCount();
		}
		

		// Products Count
		$stmt_productsall = $this->sql->Execute($this->sql->Prepare("SELECT * FROM app_products "),array());
		if($stmt_productsall){
			$products_all = $stmt_all->RecordCount();
		}
		


		$response = ['requests_new'=>$requests_new,  'requests_inprogress'=>$requests_inprogress, 'requests_completed'=>$requests_completed ,'requests_cancelled'=>$requests_cancelled, 'requests_all'=>$requests_all, 'products_all'=>$products_all ];
		
        return $response;
	}
	



	// SQL Save Notification
	/*
		//States
		Success     : badge-success-inverse
		Info      	: badge-info-inverse
		Warning     : badge-warning-inverse
		Danger      : badge-danger-inverse


		// Icons
		Dashboard				: feather icon-server
		Insight					: feather icon-trending-up
		Create Request			: feather icon-pocket
		All Requests			: feather icon-archive
		History					: feather icon-list
		Riders					: feather icon-users
		Assets Management		: feather icon-box
		Staff					: feather icon-user
		Messages				: feather icon-message-circle
		Finances				: feather icon-credit-card
		Report					: feather icon-file-text
		Contact Us				: feather icon-message-square

		
	*/
	public function saveNotification_SQL($receiverid,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon ){

		$actorcode = $this->session->get('actorid');
		$notifydate = date('Y-m-d H:i:s');		
		$notifycode = $this->generateCode_SQL("app_notifications", "NFY", "NOTI_CODE", "NOTI_ID");

		$stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_notifications (NOTI_CODE, NOTI_SENDER, NOTI_RECEIVER, NOTI_MESSAGE, NOTI_DATE, NOTI_SERVICE, NOTI_TITLE, NOTI_TYPE, NOTI_ICON, NOTI_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($notifycode, $actorcode, $receiverid, $message, $notifydate, $reqcode, $reqtitle, $reqtype, $reqicon, "1"));
		print $this->sql->ErrorMsg();

		if($stmt == true){
			$notify = true;
		}else{
			$notify = false;
		}
		return $notify ;
	}


	// SQL Save Activity
	public function saveActivity_SQL($message,$type,$reqcode,$reqtitle,$reqtype,$reqicon ){

		$actorcode = $this->session->get('actorid');
		$actorcompcode = $this->session->get('companycode');
		$activitydate = date('Y-m-d H:i:s');		
		$activitycode = $this->generateCode_SQL("app_activities", "ACT", "ACTV_CODE", "ACTV_ID");

		$stmt =$this->sql->Execute($this->sql->Prepare("INSERT INTO app_activities (ACTV_CODE, ACTV_ACTORID, ACTV_ACTORCOMPCODE, ACTV_MESSAGE, ACTV_DATE,  ACTV_TITLE, ACTV_ACTCODE, ACTV_TYPE, ACTV_ICON, ACTV_STATUS) VALUES(".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').",".$this->sql->Param('a').")"),array($activitycode, $actorcode, $actorcompcode, $message, $activitydate, $reqtitle, $reqcode, $reqtype, $reqicon, "1"));
		print $this->sql->ErrorMsg();

		if($stmt == true){
			$activity = true;
		}else{
			$activity = false;
		}
		return $activity ;
	}


	public function getCompanyData_SQL(){
		$actor_id = $this->session->get("userid");
		$actorcompcode = $this->session->get('companycode');

        $stmt = $this->sql->Prepare("SELECT * FROM app_companies WHERE COMP_STATUS = '1' AND COMP_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($actorcompcode));
        if($stmt && ($stmt->RecordCount() > 0)){
            return $stmt->FetchNextObject();
        }else{
            print $this->sql->ErrorMsg();
            return false;
        }
    }//end of getCompanyData_SQL


	public function alert_SQL($type,$title,$message){
		echo '<script language="javascript">';
		echo 'Swal.fire({
		  icon: \''.$type.'\',
		  title: \''.$title.'\',
		  text: \''.$message.'\',
		  footer: \'<a href>Click Ok to continue.</a>\'
		})';
		echo '</script>';
	}



	// Generate Sequential Codes
	public function generateCode(String $collection,String $prefix,String $base_col){
		$no_prec = 10;#Maximum number of preceding Zeros;
		$filter = [];
		$options = ['projection'=>[$base_col=>1],'sort'=>[$base_col=> -1],'limit'=>1];
		$obj = $this->mongo->GetOne($collection, $filter, $options);
		print $this->mongo->ErrorMsg();
		if($obj){
			$rawcount = substr($obj->$base_col,strlen($prefix),100);
			$rawcount = $rawcount + 1;
			$multiplier = $no_prec - strlen($rawcount);
			$multiplier = $multiplier <=0 ? 0 : $multiplier ;
			$code = str_repeat("0",$multiplier). $rawcount;
		}else{
			$code = str_repeat("0",$no_prec - 1) . 1;
		}
		return $prefix.$code;
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
	
	public function saveNotification($userid,$message,$type){
		$notifydate = date('Y-m-d H:i:s');
		$notifycode = generateCode('app_notifications','NFY','NOTE_CODE');
		$document = ['NOTE_CODE' => $notifycode,'NOTE_USERID'=>$userid,'NOTE_MESSAGE'=>$message,'NOTE_TYPE'=>$type,'NOTE_DATEADDED'=>$notifydate];
		$collection = "app_notify";
		$stmt = $this->mongo->InsertOne($collection, $document);
	

		print $mongo->ErrorMsg();
		if($stmt==true){
			$notify = array('code'=>$notifycode,'status'=>'done');
		}else{
			$notify = array('code'=>'null','status'=>'done');
		}
		return $notify ;
	}
	
	public function validatePostForm($microtime){
		$postkey = $this->session->get('postkey');
		if(empty($postkey)){
			$postkey = 2;
		}
		if($postkey != $microtime){
			if($postkey == 2){
				$this->session->set('postkey',$microtime);
			}else{
				$this->session->del('postkey');
				$this->session->set('postkey',$microtime);
			}
			return true;
		}else{
			return false;
		}
   } 
   
   public function msg($error_code='0',$msg_text=''){
	if(!empty($msg_text)){
		switch($error_code){
			case "error":
					$point = "alert-danger";
			break;
			case "success":
					$point = "alert-success";
			break;
			case "warning":
				$point = "alert-warning";
			break;
			case "info":
				$point = "alert-info";
			break;
			case "dark":
				$point = "alert-dark";
			break;
			default:
					$point = "alert-light";
			break;
		}
	echo '<div class="alert '. $point.'" role="alert">' . $msg_text . '</div>';
	}
	return '';
   }

   public function getDataEncrypt($data_array){
		$result_json = json_encode($data_array, true);
		$result = base64_encode($result_json);
		return $result;
	}

	public function getDataDecrypt($data_array){
		$result_base64 = base64_decode($data_array);
		$result = json_decode($result_base64, true);
		return $result;
	}

   
}
