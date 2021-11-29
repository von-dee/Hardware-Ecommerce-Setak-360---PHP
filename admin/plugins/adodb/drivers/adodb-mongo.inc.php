<?php
/*
@version   v5.20.14  06-Jan-2019
@copyright (c) 2000-2013 John Lim (jlim#natsoft.com). All rights reserved.
@copyright (c) 2014      Damien Regad, Mark Newnham and the ADOdb community
  Released under both BSD license and Lesser GPL library license.
  Whenever there is any discrepancy between the two licenses,
  the BSD license will take precedence.
  Set tabs to 8.

  This is the preferred driver for MySQL connections, and supports both transactional
  and non-transactional table types. You can use this as a drop-in replacement for both
  the mysql and mysqlt drivers. As of ADOdb Version 5.20.0, all other native MySQL drivers
  are deprecated
  
  Requires mysql client. Works on Windows and Unix.

21 October 2003: MySQLi extension implementation by Arjen de Rijke (a.de.rijke@xs4all.nl)
Based on adodb 3.40
*/
//require 'vendor/autoload.php';
// security - hide paths
if (!defined('ADODB_DIR')) die();


 class ADODB_mongo extends ADOConnection {
	var $databaseType = 'mongo';
	var $dataProvider = 'mongo';
	var $hasInsertID = true;
	var $hasAffectedRows = true;

	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $hasLimit = true;
	var $hasMoveFirst = true;
	var $hasGenID = true;
	var $isoDates = true; // accepts dates in ISO format
	var $sysDate = 'CURDATE()';
	var $sysTimeStamp = 'NOW()';
	var $hasTransactions = true;
	var $forceNewConnect = false;
	var $poorAffectedRows = true;
	var $clientFlags = 0;
	var $substr = "substring";
	var $port = 27017; //Default to 27017 to fix HHVM bug
	var $socket = ''; //Default to empty string to fix HHVM bug
	var $_bindInputArray = false;
	var $nameQuote = '`';		/// string to use to quote identifiers and names
	var $arrayClass = 'ADORecordSet_array_mongo';
	var $multiQuery = false;
	var $driverOptions = [];
	var $uriOptions =[];
	var $setErrorMsg = '';
	var $setErrorNo = 0;
	var $_db;
	var $insertResult = false;
	var $updatedResult = false;
	var $deletedResult = false;
	var $documents_structure = null;
	var $_queryobj=[];
	var $_insertkeys =[];

	function __construct()
	{	    
	     if(!extension_loaded("mongodb"))
		trigger_error("You must have the mongodb extension installed.", E_USER_ERROR);
	}

	function SetTransactionMode( $transaction_mode )
	{
		$this->_transmode = $transaction_mode;
		if (empty($transaction_mode)) {
			$this->Execute('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ');
			return;
		}
		if (!stristr($transaction_mode,'isolation')) $transaction_mode = 'ISOLATION LEVEL '.$transaction_mode;
		$this->Execute("SET SESSION TRANSACTION ".$transaction_mode);
	}

	// returns true or false
	// To add: parameter int $port,
	//         parameter string $socket
	function _connect($argHostname = NULL,
				$argUsername = NULL,
				$argPassword = NULL,
				$argDatabasename = NULL, $persist=false)
	{
	 
		if(!extension_loaded("mongodb")) {
			return null;
		}
		
	
		if(!is_array($this->driverOptions)){
		    $this->driverOptions = [];
		}
		
		//SET UUSERNAME PASSWORD ARRAY
		$credentails = [
		    'username' => $argUsername,
		    'password' => $argPassword,
		];
		
		if(is_array($this->uriOptions)){
		    $credentails = array_merge($credentails,$this->uriOptions);
		}
		
		(int)$this->port != 0 ? (int)$this->port : 27017;
		
		if (!empty($this->port)) $argHostname .= ":".$this->port;
		$argHostname ='mongodb://'.$argHostname;
		
		try {
		    
		    $this->_connectionID = new MongoDB\Client(
		        $argHostname,
		        $credentails,
		        $this->driverOptions
		        );
		    
		    
		    if ($this->_connectionID) {
		       if ($argDatabasename)  return $this->SelectDB($argDatabasename);
		       return true;
		    } 
		    
		} catch (Exception $e) {
		    $this->setErrorMsg = $e->getMessage();
		    if ($this->debug) {
		        ADOConnection::outp("Could not connect : "  . $this->ErrorMsg());
		    }
		    $this->_connectionID = null;
		    return false;
		}
		
	}

	// returns true or false
	// How to force a persistent connection
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		return $this->_connect($argHostname, $argUsername, $argPassword, $argDatabasename, true);
	}

	// When is this used? Close old connection first?
	// In _connect(), check $this->forceNewConnect?
	function _nconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->forceNewConnect = true;
		return $this->_connect($argHostname, $argUsername, $argPassword, $argDatabasename);
	}

	function IfNull( $field, $ifNull )
	{
		return " IFNULL($field, $ifNull) "; // if MySQL
	}
    
	/***
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $filter     Array   Filter settings to use
	 *  @param  $options    Array   Sort ,order,return columns  preferences
	 *  @param  $slaveOkay  Bool    If a read from the slave is allowed
	 *  @return mixed | false if no data
	 *  
	 *  $filter['$text'] = ['$search' => "foo"];
        $options["projection"] = ['score' => ['$meta' => "textScore"]];
        $options["sort"] = ["score" => ['$meta' => "textScore"]];
   	 ***/
	function GetOne($collection, $filter = [], $options = []){
	    
		$cursor = $this->_db->$collection->findOne($filter,$options); //SELECT * FROM $collection WHERE ^^^
		if($cursor != null){
		    $return = array();
		    $return =$cursor;
		    unset($cursor);
		    return $return;
		}else{
	       return false;
		}
	}
	
	/***
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $filter     Array   Filter settings to use
	 *  @param  $start      Int     LIMIT _X_, Y (if set)
	 *  @param  $offset     Int     LIMIT X, _Y_ (if set)
	 *
	 *  @return array of arrays
	 ***/
	public function GetAll($collection,$filter=[],$options =[]){
	   
	    $cursor = $this->_db->$collection->find($filter,$options);  //SELECT * FROM $collection WHERE ^^^
	   
	    $return = array();
	    $return = $cursor->toArray();
	    unset($cursor);
	    return $return;
	}
	
	/**
	 * @desc this function returns total number of rows in a collections per filter and options
	 * @param string $collection
	 * @param array $filter
	 * @param array $options
	 * @return int
	 */
	
	public function getTotalNumberOfRows($collection, Array $filter=array(), Array $options = []){
	   return $this->_db->$collection->count($filter,$options);
	}

	/***
	 *  Code for Inserting a record into the DB
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $document   Array  The document (Data) to insert into the collection (Table)
	 *  @param  $options	Array Optional. An array specifying the desired options.
	 *
	 *  @return array of arrays
	 ***/

	function InsertOne($collection,Array $document = [], Array $options = []){
	    try {
	        $checker  = $this->if_filedsExist($collection,$document);
	        
	        if($checker === true){
	            $this->insertResult  = $this->_db->$collection->insertOne($document,$options); //INSERT INTO Table () VALUES ()
	            if(!is_null($this->insertResult)) {
	                return $this->insertResult;
	            }
	        }
	        return false;
	    } catch (Exception $e) {
	        $this->setErrorMsg = $e->getMessage();
	        $this->setErrorNo = $e->getCode();
	        return false;
	    }
		
	}//->End

	/***
	 *  Code for Inserting a record into the DB
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $document   Array  The document (Data) to insert into the collection (Table)
	 *  @param  $options	Array Optional. An array specifying the desired options.
	 *
	 *  @return array of arrays
	 ***/

	function InsertMany($collection,Array $document = [], Array $options = []){
	    try {
	        $checker  = $this->if_filedsExist($collection,$document);
	        
	        if($checker === true){
	            $this->insertResult  = $this->_db->$collection->insertMany($document,$options); //INSERT INTO Table () VALUES ()
	            if(!is_null($this->insertResult)) {
	                return $this->insertResult;
	            }
	        }
	        return false;
	    } catch (Exception $e) {
	        $this->setErrorMsg = $e->getMessage();
	        $this->setErrorNo = $e->getCode();
	        return false;
	    }
		
	}//->End


	/***
	 *  Code for Updating a record into the DB
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $filter   Array   The filter criteria that specifies the documents (DATA) to update.
	 *  @param  $update   Array	 Specifies the field and value combinations to update and any relevant update operators. 
	 *	@param  $options  Array	 Optional. An array specifying the desired options.

	 *  @return array of arrays
	 ***/
	function Update($collection,Array $filter, Array $update = [], Array $options = [],$operetor='$set'){
	    try {
	        if(is_array($filter) && count($filter) > 0){
	            
	            if(is_array($update) && count($update) > 0){
	                $update =  [ $operetor => $update];
	            }
	            $this->updatedOneResult = $this->_db->$collection->updateMany($filter,$update,$options); //UPDATE Table SET ()
	            if(!is_null($this->updatedOneResult)){
	                return $this->updatedOneResult;
	            }
	            return false;
	        }
	        
	        return false;
	        
	    } catch (Exception $e) {
	        $this->setErrorMsg = $e->getMessage();
	        $this->setErrorNo = $e->getCode();
	        return false;
	    }
	   
	}//->End

	private function _getAllKeys($document){
		if(is_array($document)){
			foreach($document as $keys => $vals){
				if(is_array($vals)){
					$this->_getAllKeys($vals);
				}else{
					//echo $keys;
					if(!in_array($keys,$this->_insertkeys)){
					$this->_insertkeys[] = $keys;
					}
					
				}
			}
		}
		
		return $this->_insertkeys;
	}

	/***
	 *  Code for checking if fields sent are the same as the ones in the DB
	 *  @param  $collection String  Name of the Collection (Table) to query
	 *  @param  $document   Array   The document (Data) to insert into the collection (Table)
	 *  @return array of arrays
	 ***/
	function if_filedsExist($collection,Array $document = []){
		//php ini hack
		if(count($document) > 250){
			@ini_set('xdebug.max_nesting_level', count($document)); 
		}
	    //GET STRUCTURE FILE
	    $collection_structure_path = dirname(__FILE__).'/../mongodb_structures/'.$collection.'.ini';
	    if(file_exists($collection_structure_path)){
			$this->documents_structure = json_decode(file_get_contents($collection_structure_path));
			
			$getKeys = $this->_getAllKeys($document);
			unset($this->_insertkeys);

	        if(count($getKeys) > 0 ){
	           
	            if(@count($this->documents_structure) > 0){
	                foreach ($getKeys as $val){
	                    if(!in_array($val, $this->documents_structure)){
	                        $this->setErrorMsg ="Unknown field. Kindly create or check spelling : ".$val;
	                        return false;
	                    }
	                }
	                
	              
	                    return true;
	                
	                
	            }else{
	                $this->setErrorMsg ="Invalid collection name. Kindly create or check spelling for collection :".$collection;
	                return false;
	            }
	            
	        }else {
	            $this->setErrorMsg ="Kindly set document structure for collection ".$collection;
	            return false;
	        }
	        
	    }else{
	        $this->setErrorMsg ="Unknown collection. Kindly create or check spelling for collection: ".$collection;
	        return false;
	    }
	    
	    

	}//->End
	

	function ServerInfo(){
	    $arr['version'] ='1.6';
	    $arr['engine']='mongo';
		return $arr;
	}

	/**
	 * Quotes a string to be sent to the database
	 * When there is no active connection,
	 * @param string $s The string to quote
	 * @param boolean $magic_quotes If false, use mysqli_real_escape_string()
	 *     if you are quoting a string extracted from a POST/GET variable,
	 *     then pass get_magic_quotes_gpc() as the second parameter. This will
	 *     ensure that the variable is not quoted twice, once by qstr() and
	 *     once by the magic_quotes_gpc.
	 *     Eg. $s = $db->qstr(_GET['name'],get_magic_quotes_gpc());
	 * @return string Quoted string
	 */
	function qstr($s, $magic_quotes = false)
	{
		if (is_null($s)) return 'NULL';
		if (!$magic_quotes) {
			if ($this->replaceQuote[0] == '\\') {
				$s = adodb_str_replace(array('\\',"\0"), array('\\\\',"\\\0") ,$s);
			}
			return "'" . str_replace("'", $this->replaceQuote, $s) . "'";
		}
		// undo magic quotes for "
		$s = str_replace('\\"','"',$s);
		return "'$s'";
	}
    
	/**
	 * 
	 * @return array | mixed
	 */
	function _insertid(){
	    $result = 0;
	    if($this->insertResult){
	    $result = $this->insertResult->getInsertedId();
	    //var_dump($result);
		
	    }else{
	        $result == -1;
	    }
	    if ($result == -1) {
	        if ($this->debug) ADOConnection::outp("getInsertedId failed : "  . $this->ErrorMsg());
	    }
	    
		return $result;
	}

	// Only works for INSERT, UPDATE and DELETE query's
	function _affectedrows(){
	    $result = 0;
		//FIND LAST ACTION
	    if($this->insertResult){
	        $result = $this->insertResult->getInsertedCount();
	    }else if($this->updatedResult){
	        $result = $this->updatedResult->getModifiedCount();
	    }else if($this->deletedResult){
	        $result = $this->deletedResult->getDeletedCount();
	    }else{
	        $this->setErrorMsg = "This exception is thrown when an unsupported method is invoked on an object";
	        $this->setErrorNo = (new Exception())->getCode();
	        $result = -1;
	    }
		if ($result == -1) {
			if ($this->debug) ADOConnection::outp("Affected rows failed : "  . $this->ErrorMsg());
		}
		return $result;
	}

	


	// Format date column in sql string given an input format that understands Y M D
	function SQLDate($fmt, $col=false){
		if (!$col) $col = $this->sysTimeStamp;
		$s = 'DATE_FORMAT('.$col.",'";
		$concat = false;
		$len = strlen($fmt);
		for ($i=0; $i < $len; $i++) {
			$ch = $fmt[$i];
			switch($ch) {
			case 'Y':
			case 'y':
				$s .= '%Y';
				break;
			case 'Q':
			case 'q':
				$s .= "'),Quarter($col)";

				if ($len > $i+1) $s .= ",DATE_FORMAT($col,'";
				else $s .= ",('";
				$concat = true;
				break;
			case 'M':
				$s .= '%b';
				break;

			case 'm':
				$s .= '%m';
				break;
			case 'D':
			case 'd':
				$s .= '%d';
				break;

			case 'H':
				$s .= '%H';
				break;

			case 'h':
				$s .= '%I';
				break;

			case 'i':
				$s .= '%i';
				break;

			case 's':
				$s .= '%s';
				break;

			case 'a':
			case 'A':
				$s .= '%p';
				break;

			case 'w':
				$s .= '%w';
				break;

			case 'l':
				$s .= '%W';
				break;

			default:

				if ($ch == '\\') {
					$i++;
					$ch = substr($fmt,$i,1);
				}
				$s .= $ch;
				break;
			}
		}
		$s.="')";
		if ($concat) $s = "CONCAT($s)";
		return $s;
	}

	// returns concatenated string
	// much easier to run "mysqld --ansi" or "mysqld --sql-mode=PIPES_AS_CONCAT" and use || operator
	function Concat()
	{
		$s = "";
		$arr = func_get_args();

		// suggestion by andrew005@mnogo.ru
		$s = implode(',',$arr);
		if (strlen($s) > 0) return "CONCAT($s)";
		else return '';
	}

	// dayFraction is a day in floating point
	function OffsetDate($dayFraction,$date=false)
	{
		if (!$date) $date = $this->sysDate;

		$fraction = $dayFraction * 24 * 3600;
		return $date . ' + INTERVAL ' .	 $fraction.' SECOND';

//		return "from_unixtime(unix_timestamp($date)+$fraction)";
	}

	public function Execute($query,$arrinput=[]){
	    return $this->_db->$query;
	}
	
	
	
	// returns true or false
	function SelectDB($dbName){
		$this->database = $dbName;
		$this->databaseName = $dbName; # obsolete, retained for compat with older adodb versions
          
                if ($this->_connectionID !== NULL) {
                    
                    //JUST TO TREGER AN ERROR IS THE CONNECTION IS NOT SUCCESSFUL
                    $valid = false;
                    $dblist = $this->_connectionID->listDatabases();
                    foreach ($dblist as $databaseInfo) {
                        if($databaseInfo["name"] == $dbName){
                            $this->_db = $this->_connectionID->selectDatabase($dbName);
                            $valid = true;
                            break;
                        }
                    }
                    if(!$valid) throw new Exception('Unknown Database(s) :'.$dbName);
                    return $valid;
                }
	}

	// parameters use PostgreSQL convention, not MySQL
	function SelectLimit($collection,
	    $nrows = -1,
				$offset = -1,
	           $filter=[],
	           $options = [])
	{
	  
		if($nrows !=-1)
		    $options['limit'] = (int)$nrows;
		    if($nrows != -1 && $offset != -1)
		        $options['skip'] = (int)$offset;
		        
		        $cursor = $this->_db->$collection->find($filter,$options); 
		        $result = array();
		        if($cursor != null){
		            $this->_queryID =$cursor;
		            $result =$cursor;
		            unset($cursor);
		            
		            return $result;
		        }else{
		            return false;
		        }
	}

	public function RecordCount(){
	    $this->_queryID;
	    return $this->_db->$this->_queryobj[0]->count($this->_queryobj[1],$this->_queryobj[2]);
	}

	function Prepare($sql)
	{
	    return $sql;
	}


	// returns queryID or false
	function _query($sql, $inputarr){
	global $ADODB_COUNTRECS;
		
		return false;

	}

	/*	Returns: the last error message from previous database operation	*/
	function ErrorMsg()
	{
			return $this->setErrorMsg;
	}

	/*	Returns: the last error number from previous database operation	*/
	function ErrorNo()
	{
	    return $this->setErrorNo;
	}

	// returns true or false
	function _close()
	{
		$this->_connectionID = false;
	}

	/*
	* Maximum size of C field
	*/
	function CharMax()
	{
		return 255;
	}

	/*
	* Maximum size of X field
	*/
	function TextMax()
	{
		return 4294967295;
	}


	// this is a set of functions for managing client encoding - very important if the encodings
	// of your database and your output target (i.e. HTML) don't match
	// for instance, you may have UTF8 database and server it on-site as latin1 etc.
	// GetCharSet - get the name of the character set the client is using now
	// Under Windows, the functions should work with MySQL 4.1.11 and above, the set of charsets supported
	// depends on compile flags of mysql distribution

	function GetCharSet()
	{
		//we will use ADO's builtin property charSet
		if (!method_exists($this->_connectionID,'character_set_name'))
			return false;

		$this->charSet = @$this->_connectionID->character_set_name();
		if (!$this->charSet) {
			return false;
		} else {
			return $this->charSet;
		}
	}

	// SetCharSet - switch the client encoding
	function SetCharSet($charset_name)
	{
		if (!method_exists($this->_connectionID,'set_charset')) {
			return false;
		}

		if ($this->charSet !== $charset_name) {
			$if = @$this->_connectionID->set_charset($charset_name);
			return ($if === true & $this->GetCharSet() == $charset_name);
		} else {
			return true;
		}
	}
	
	/*-------------------------------------------------------
	 * GRIDFS FILE MANAGEMENT
	 -------------------------------------------------------*/
    /**
     * @desc This function return filename if upload is successful or false;
     * @param string $collectname
     * @param object $file ($_FILE["name"])
     * @param array $options
     * @return string|boolean
     */
	public function gridfsUpload($collectname,$file,$options =[]){
	    
	    if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
			//$ext = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
			
	        $rand_numb = md5(uniqid(microtime()));
	        $neu_name = $rand_numb.$file['name'];
	        $_name_ = $file['name'];
	        $_type_ = $file['type'];
	        $_tmp_name_ = $file['tmp_name'];
	        $_size_ = $file['size'] / 1024;
	       
	            
	            $options['metadata']= array_merge(["name"=> $_name_,"type" =>$_type_,"size"=>$_size_],$options);
	           
	            $bucket = $this->_db->selectGridFSBucket(['bucketName'=> $collectname]);
	            $stream = $bucket->openUploadStream($neu_name,$options);
	            $contents = file_get_contents($_tmp_name_);
	            fwrite($stream, $contents);
	            fclose($stream);
	            
	            return $neu_name;

	    }
	    return false;
	}
	
	/**
	 * @desc This function write the stream object into file_type cache,
	 * which can be saved with move_uploaded_file to drive
	 * @param string $collectname
	 * @param string $filename
	 * @return object
	 */
	public function gridfsDownload($collectname,$filename){
	    
	    $bucket = $this->_db->selectGridFSBucket(['bucketName'=> $collectname]);
	    $destination = fopen('php://temp', 'w+b');
	    
	    $bucket->downloadToStreamByName($filename, $destination);
	    
	    return stream_get_contents($destination);
	}
	
	/**
	 * @desc This function returns the object binary in stream
	 * @param string $collectname
	 * @param string $filename
	 * @return object
	 */
	public function gridfsSelect($collectname,$filename){
	    
	    $bucket = $this->_db->selectGridFSBucket(['bucketName'=> $collectname]);
	    $stream = $bucket->openDownloadStreamByName($filename, ['revision' => 0]);
	    $contents = stream_get_contents($stream);
	    
	    return $contents;
	    
	}
	
	/**
	 * @desc This function returns the metadata of an uploaded file
	 * @param string $collectname
	 * @param string $filename
	 * @return object
	 */
	public function gridfsGetMetadata($collectname,$filename){
	    $bucket = $this->_db->selectGridFSBucket(['bucketName'=> $collectname]);
	    
	    $cursor = $bucket->find(['filename' => $filename]);
	    $result = $cursor;
	    unset($cursor);
	    return $result;
	}
	
	/**
	 * @desc This function deletes an image
	 * @param string $collectname
	 * @param string $filename
	 * @return boolean;
	 */
	public function gridfsDelete($collectname,$filename){
	    $fileid =0;
	   $bucket = $this->_db->selectGridFSBucket(['bucketName'=> $collectname]);
	    $stream = $bucket->openDownloadStreamByName($filename, ['revision' => 0]);
	    $fileId = $bucket->getFileIdForStream($stream);
	    if(!empty($fileId)){
	    $bucket->delete($fileid);
	    return true;
	    }
	    return false;
	}
}

/*--------------------------------------------------------------------------------------
	 Class Name: Recordset
--------------------------------------------------------------------------------------*/

class ADORecordSet_mongo extends ADORecordSet{

	var $databaseType = "mongo";
	var $canSeek = true;

	function __construct($queryID, $mode = false)
	{
		if ($mode === false) {
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
		}

		switch ($mode) {
			case ADODB_FETCH_NUM:
				$this->fetchMode = MYSQLI_NUM;
				break;
			case ADODB_FETCH_ASSOC:
				$this->fetchMode = MYSQLI_ASSOC;
				break;
			case ADODB_FETCH_DEFAULT:
			case ADODB_FETCH_BOTH:
			default:
				$this->fetchMode = MYSQLI_BOTH;
				break;
		}
		$this->adodbFetchMode = $mode;
		parent::__construct($queryID);
	}

	function _initrs()
	{
	global $ADODB_COUNTRECS;

		$this->_numOfRows = $ADODB_COUNTRECS ? @mysqli_num_rows($this->_queryID) : -1;
		$this->_numOfFields = @mysqli_num_fields($this->_queryID);
	}

	
/*
1      = MYSQLI_NOT_NULL_FLAG
2      = MYSQLI_PRI_KEY_FLAG
4      = MYSQLI_UNIQUE_KEY_FLAG
8      = MYSQLI_MULTIPLE_KEY_FLAG
16     = MYSQLI_BLOB_FLAG
32     = MYSQLI_UNSIGNED_FLAG
64     = MYSQLI_ZEROFILL_FLAG
128    = MYSQLI_BINARY_FLAG
256    = MYSQLI_ENUM_FLAG
512    = MYSQLI_AUTO_INCREMENT_FLAG
1024   = MYSQLI_TIMESTAMP_FLAG
2048   = MYSQLI_SET_FLAG
32768  = MYSQLI_NUM_FLAG
16384  = MYSQLI_PART_KEY_FLAG
32768  = MYSQLI_GROUP_FLAG
65536  = MYSQLI_UNIQUE_FLAG
131072 = MYSQLI_BINCMP_FLAG
*/

	function FetchField($fieldOffset = -1){
		$fieldnr = $fieldOffset;
		if ($fieldOffset != -1) {
			$fieldOffset = @mysqli_field_seek($this->_queryID, $fieldnr);
		}
		$o = @mysqli_fetch_field($this->_queryID);
		if (!$o) return false;

		//Fix for HHVM
		if ( !isset($o->flags) ) {
			$o->flags = 0;
		}
		/* Properties of an ADOFieldObject as set by MetaColumns */
		$o->primary_key = $o->flags & MYSQLI_PRI_KEY_FLAG;
		$o->not_null = $o->flags & MYSQLI_NOT_NULL_FLAG;
		$o->auto_increment = $o->flags & MYSQLI_AUTO_INCREMENT_FLAG;
		$o->binary = $o->flags & MYSQLI_BINARY_FLAG;
		// $o->blob = $o->flags & MYSQLI_BLOB_FLAG; /* not returned by MetaColumns */
		$o->unsigned = $o->flags & MYSQLI_UNSIGNED_FLAG;

		return $o;
	}

	function GetRowAssoc($upper = ADODB_ASSOC_CASE){
		if ($this->fetchMode == MYSQLI_ASSOC && $upper == ADODB_ASSOC_CASE_LOWER) {
			return $this->fields;
		}
		$row = ADORecordSet::GetRowAssoc($upper);
		return $row;
	}

	/* Use associative array to get fields array */
	function Fields($colname)
	{
		if ($this->fetchMode != MYSQLI_NUM) {
			return @$this->fields[$colname];
		}

		if (!$this->bind) {
			$this->bind = array();
			for ($i = 0; $i < $this->_numOfFields; $i++) {
				$o = $this->FetchField($i);
				$this->bind[strtoupper($o->name)] = $i;
			}
		}
		return $this->fields[$this->bind[strtoupper($colname)]];
	}

	function _seek($row)
	{
		if ($this->_numOfRows == 0 || $row < 0) {
			return false;
		}

		mysqli_data_seek($this->_queryID, $row);
		$this->EOF = false;
		return true;
	}


	function NextRecordSet(){
	global $ADODB_COUNTRECS;

		mysqli_free_result($this->_queryID);
		$this->_queryID = -1;
		// Move to the next recordset, or return false if there is none. In a stored proc
		// call, mysqli_next_result returns true for the last "recordset", but mysqli_store_result
		// returns false. I think this is because the last "recordset" is actually just the
		// return value of the stored proc (ie the number of rows affected).
		if(!mysqli_next_result($this->connection->_connectionID)) {
		return false;
		}
		// CD: There is no $this->_connectionID variable, at least in the ADO version I'm using
		$this->_queryID = ($ADODB_COUNTRECS) ? @mysqli_store_result( $this->connection->_connectionID )
						: @mysqli_use_result( $this->connection->_connectionID );
		if(!$this->_queryID) {
			return false;
		}
		$this->_inited = false;
		$this->bind = false;
		$this->_currentRow = -1;
		$this->Init();
		return true;
	}

	// 10% speedup to move MoveNext to child class
	// This is the only implementation that works now (23-10-2003).
	// Other functions return no or the wrong results.
	function MoveNext(){
		if ($this->EOF) return false;
		$this->_currentRow++;
		$this->fields = @mysqli_fetch_array($this->_queryID,$this->fetchMode);

		if (is_array($this->fields)) {
			$this->_updatefields();
			return true;
		}
		$this->EOF = true;
		return false;
	}

	function _fetch(){
		$this->fields = mysqli_fetch_array($this->_queryID,$this->fetchMode);
		$this->_updatefields();
		return is_array($this->fields);
	}

	function _close(){
		//if results are attached to this pointer from Stored Proceedure calls, the next standard query will die 2014
		//only a problem with persistant connections

		if(isset($this->connection->_connectionID) && $this->connection->_connectionID) {
			while(mysqli_more_results($this->connection->_connectionID)){
				mysqli_next_result($this->connection->_connectionID);
			}
		}

		if($this->_queryID instanceof mysqli_result) {
			mysqli_free_result($this->_queryID);
		}
		$this->_queryID = false;
	}

/*

0 = MYSQLI_TYPE_DECIMAL
1 = MYSQLI_TYPE_CHAR
1 = MYSQLI_TYPE_TINY
2 = MYSQLI_TYPE_SHORT
3 = MYSQLI_TYPE_LONG
4 = MYSQLI_TYPE_FLOAT
5 = MYSQLI_TYPE_DOUBLE
6 = MYSQLI_TYPE_NULL
7 = MYSQLI_TYPE_TIMESTAMP
8 = MYSQLI_TYPE_LONGLONG
9 = MYSQLI_TYPE_INT24
10 = MYSQLI_TYPE_DATE
11 = MYSQLI_TYPE_TIME
12 = MYSQLI_TYPE_DATETIME
13 = MYSQLI_TYPE_YEAR
14 = MYSQLI_TYPE_NEWDATE
247 = MYSQLI_TYPE_ENUM
248 = MYSQLI_TYPE_SET
249 = MYSQLI_TYPE_TINY_BLOB
250 = MYSQLI_TYPE_MEDIUM_BLOB
251 = MYSQLI_TYPE_LONG_BLOB
252 = MYSQLI_TYPE_BLOB
253 = MYSQLI_TYPE_VAR_STRING
254 = MYSQLI_TYPE_STRING
255 = MYSQLI_TYPE_GEOMETRY
*/

	function MetaType($t, $len = -1, $fieldobj = false)
	{
		if (is_object($t)) {
			$fieldobj = $t;
			$t = $fieldobj->type;
			$len = $fieldobj->max_length;
		}


		$len = -1; // mysql max_length is not accurate
		switch (strtoupper($t)) {
		case 'STRING':
		case 'CHAR':
		case 'VARCHAR':
		case 'TINYBLOB':
		case 'TINYTEXT':
		case 'ENUM':
		case 'SET':

		case MYSQLI_TYPE_TINY_BLOB :
		#case MYSQLI_TYPE_CHAR :
		case MYSQLI_TYPE_STRING :
		case MYSQLI_TYPE_ENUM :
		case MYSQLI_TYPE_SET :
		case 253 :
			if ($len <= $this->blobSize) return 'C';

		case 'TEXT':
		case 'LONGTEXT':
		case 'MEDIUMTEXT':
			return 'X';

		// php_mysql extension always returns 'blob' even if 'text'
		// so we have to check whether binary...
		case 'IMAGE':
		case 'LONGBLOB':
		case 'BLOB':
		case 'MEDIUMBLOB':

		case MYSQLI_TYPE_BLOB :
		case MYSQLI_TYPE_LONG_BLOB :
		case MYSQLI_TYPE_MEDIUM_BLOB :
			return !empty($fieldobj->binary) ? 'B' : 'X';

		case 'YEAR':
		case 'DATE':
		case MYSQLI_TYPE_DATE :
		case MYSQLI_TYPE_YEAR :
			return 'D';

		case 'TIME':
		case 'DATETIME':
		case 'TIMESTAMP':

		case MYSQLI_TYPE_DATETIME :
		case MYSQLI_TYPE_NEWDATE :
		case MYSQLI_TYPE_TIME :
		case MYSQLI_TYPE_TIMESTAMP :
			return 'T';

		case 'INT':
		case 'INTEGER':
		case 'BIGINT':
		case 'TINYINT':
		case 'MEDIUMINT':
		case 'SMALLINT':

		case MYSQLI_TYPE_INT24 :
		case MYSQLI_TYPE_LONG :
		case MYSQLI_TYPE_LONGLONG :
		case MYSQLI_TYPE_SHORT :
		case MYSQLI_TYPE_TINY :
			if (!empty($fieldobj->primary_key)) return 'R';
			return 'I';

		// Added floating-point types
		// Maybe not necessery.
		case 'FLOAT':
		case 'DOUBLE':
//		case 'DOUBLE PRECISION':
		case 'DECIMAL':
		case 'DEC':
		case 'FIXED':
		default:
			//if (!is_numeric($t)) echo "<p>--- Error in type matching $t -----</p>";
			return 'N';
		}
	} // function


} // rs class



class ADORecordSet_array_mongo extends ADORecordSet_array {

	function __construct($id=-1,$mode=false)
	{
		parent::__construct($id,$mode);
	}

	function MetaType($t, $len = -1, $fieldobj = false)
	{
		if (is_object($t)) {
			$fieldobj = $t;
			$t = $fieldobj->type;
			$len = $fieldobj->max_length;
		}


		$len = -1; // mysql max_length is not accurate
		switch (strtoupper($t)) {
		case 'STRING':
		case 'CHAR':
		case 'VARCHAR':
		case 'TINYBLOB':
		case 'TINYTEXT':
		case 'ENUM':
		case 'SET':

		case MYSQLI_TYPE_TINY_BLOB :
		#case MYSQLI_TYPE_CHAR :
		case MYSQLI_TYPE_STRING :
		case MYSQLI_TYPE_ENUM :
		case MYSQLI_TYPE_SET :
		case 253 :
			if ($len <= $this->blobSize) return 'C';

		case 'TEXT':
		case 'LONGTEXT':
		case 'MEDIUMTEXT':
			return 'X';

		// php_mysql extension always returns 'blob' even if 'text'
		// so we have to check whether binary...
		case 'IMAGE':
		case 'LONGBLOB':
		case 'BLOB':
		case 'MEDIUMBLOB':

		case MYSQLI_TYPE_BLOB :
		case MYSQLI_TYPE_LONG_BLOB :
		case MYSQLI_TYPE_MEDIUM_BLOB :

			return !empty($fieldobj->binary) ? 'B' : 'X';
		case 'YEAR':
		case 'DATE':
		case MYSQLI_TYPE_DATE :
		case MYSQLI_TYPE_YEAR :

			return 'D';

		case 'TIME':
		case 'DATETIME':
		case 'TIMESTAMP':

		case MYSQLI_TYPE_DATETIME :
		case MYSQLI_TYPE_NEWDATE :
		case MYSQLI_TYPE_TIME :
		case MYSQLI_TYPE_TIMESTAMP :

			return 'T';

		case 'INT':
		case 'INTEGER':
		case 'BIGINT':
		case 'TINYINT':
		case 'MEDIUMINT':
		case 'SMALLINT':

		case MYSQLI_TYPE_INT24 :
		case MYSQLI_TYPE_LONG :
		case MYSQLI_TYPE_LONGLONG :
		case MYSQLI_TYPE_SHORT :
		case MYSQLI_TYPE_TINY :

			if (!empty($fieldobj->primary_key)) return 'R';

			return 'I';


		// Added floating-point types
		// Maybe not necessery.
		case 'FLOAT':
		case 'DOUBLE':
//		case 'DOUBLE PRECISION':
		case 'DECIMAL':
		case 'DEC':
		case 'FIXED':
		default:
			//if (!is_numeric($t)) echo "<p>--- Error in type matching $t -----</p>";
			return 'N';
		}
	} // function

}
