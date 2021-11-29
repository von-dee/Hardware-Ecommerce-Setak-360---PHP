<?php
/* 
V4.98 13 Feb 2008  (c) 2000-2008 John Lim (jlim#natsoft.com.my). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. 
Set tabs to 4 for best viewing.
  
  Latest version is available at http://adodb.sourceforge.net
  
  Native sqlsrv driver. Requires sqlsrv client. Works on Windows. 
  To configure for Unix, see 
   	http://phpbuilder.com/columns/alberto20000919.php3
	
*/

// security - hide paths

if (!defined('ADODB_DIR')) die();

//----------------------------------------------------------------
// sqlsrv returns dates with the format Oct 13 2002 or 13 Oct 2002
// and this causes tons of problems because localized versions of 
// sqlsrv will return the dates in dmy or  mdy order; and also the 
// month strings depends on what language has been configured. The 
// following two variables allow you to control the localization
// settings - Ugh.
//
// MORE LOCALIZATION INFO
// ----------------------
// To configure datetime, look for and modify sqlcommn.loc, 
//  	typically found in c:\sqlsrv\install
// Also read :
//	 http://msdn.microsoft.com/en-us/library/cc296152%28SQL.90%29.aspx
// Alternatively use:
// 	   CONVERT(char(12),datecol,120)
//
// Also if your month is showing as month-1, 
//   e.g. Jan 13, 2002 is showing as 13/0/2002, then see
//     http://phplens.com/lens/lensforum/msgs.php?id=7048&x=1
//   it's a localisation problem.
//----------------------------------------------------------------


global $ADODB_sqlsrv_mths;		// array, months must be upper-case


	$ADODB_sqlsrv_date_order = 'mdy'; 
	$ADODB_sqlsrv_mths = array(
		'JAN'=>1,'FEB'=>2,'MAR'=>3,'APR'=>4,'MAY'=>5,'JUN'=>6,
		'JUL'=>7,'AUG'=>8,'SEP'=>9,'OCT'=>10,'NOV'=>11,'DEC'=>12);


//---------------------------------------------------------------------------
// Call this to autoset $ADODB_sqlsrv_date_order at the beginning of your code,
// just after you connect to the database. Supports mdy and dmy only.
// Not required for PHP 4.2.0 and above.
function AutoDetect_SQLSRV_Date_Order($conn)
{
global $ADODB_sqlsrv_date_order;
	$adate = $conn->GetOne('select getdate()');
	if ($adate) {
		$anum = (int) $adate;
		if ($anum > 0) {
			if ($anum > 31) {
				//ADOConnection::outp( "SQLSRV: YYYY-MM-DD date format not supported currently");
			} else
				$ADODB_sqlsrv_date_order = 'dmy';
		} else
			$ADODB_sqlsrv_date_order = 'mdy';
	}
}

class ADODB_sqlsrv extends ADOConnection {

	var $databaseType = "sqlsrv";	
	var $dataProvider = "sqlsrv";
	var $replaceQuote = "''"; // string to use to replace quotes
	var $fmtDate = "'Y-m-d'";
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $hasInsertID = true;
	var $substr = "substring";
	var $length = 'len';
	var $hasAffectedRows = true;
	var $metaDatabasesSQL = "select name from sys.databases where name <> 'master'";
	var $metaTablesSQL = "select name,case when type='U' then 'T' else 'V' end from sysobjects where (type='U' or type='V') and (name not in ('sysallocations','syscolumns','syscomments','sysdepends','sysfilegroups','sysfiles','sysfiles1','sysforeignkeys','sysfulltextcatalogs','sysindexes','sysindexkeys','sysmembers','sysobjects','syspermissions','sysprotects','sysreferences','systypes','sysusers','sysalternates','sysconstraints','syssegments','REFERENTIAL_CONSTRAINTS','CHECK_CONSTRAINTS','CONSTRAINT_TABLE_USAGE','CONSTRAINT_COLUMN_USAGE','VIEWS','VIEW_TABLE_USAGE','VIEW_COLUMN_USAGE','SCHEMATA','TABLES','TABLE_CONSTRAINTS','TABLE_PRIVILEGES','COLUMNS','COLUMN_DOMAIN_USAGE','COLUMN_PRIVILEGES','DOMAINS','DOMAIN_CONSTRAINTS','KEY_COLUMN_USAGE','dtproperties'))";
	var $metaColumnsSQL = "select c.name,t.name,c.length, (case when c.xusertype=61 then 0 else c.xprec end), (case when c.xusertype=61 then 0 else c.xscale end) from syscolumns c join systypes t on t.xusertype=c.xusertype join sysobjects o on o.id=c.id where o.name='%s'";
	var $hasTop = 'top';		// support sqlsrv SELECT TOP 10 * FROM TABLE
	var $hasGenID = true;
	var $sysDate = 'convert(datetime,convert(char,GetDate(),102),102)';
	var $sysTimeStamp = 'GetDate()';
	var $_has_sqlsrv_init;
	var $maxParameterLen = 4000;
	var $arrayClass = 'ADORecordSet_array_sqlsrv';
	var $uniqueSort = true;
	var $leftOuter = '*=';
	var $rightOuter = '=*';
	var $ansiOuter = true; // for ms sql7 or later
	var $poorAffectedRows = true;
	var $identitySQL = 'select SCOPE_IDENTITY()'; // 'select SCOPE_IDENTITY'; # for ms sql 2000
	var $uniqueOrderBy = true;
	var $_bindInputArray = false;
    var $lastStmt;
    var $_enableDevelopmentLog = true;
    
	function ADODB_sqlsrv() 
	{		
		$this->_has_sqlsrv_init = (strnatcmp(PHP_VERSION,'4.1.0')>=0);
	}

	function ServerInfo()
	{
        /*
	global $ADODB_FETCH_MODE;
	
	
		if ($this->fetchMode === false) {
			$savem = $ADODB_FETCH_MODE;
			$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		} else 
			$savem = $this->SetFetchMode(ADODB_FETCH_NUM);
				
		if (0) {
			$stmt = $this->PrepareSP('sp_server_info');
			$val = 2;
			$this->Parameter($stmt,$val,'attribute_id');
			$row = $this->GetRow($stmt);
		}
		
		$row = $this->GetRow("execute sp_server_info 2");
		
		
		if ($this->fetchMode === false) {
			$ADODB_FETCH_MODE = $savem;
		} else
			$this->SetFetchMode($savem);
        */
		$info = "Microsoft SQL Server 2008 - 10.0.2740";
		$arr['description'] = $info;
		$arr['version'] = ADOConnection::_findvers($info);
		return $arr;
	}
	
	function IfNull( $field, $ifNull ) 
	{
		return " ISNULL($field, $ifNull) "; // if MS SQL Server
	}
	
	function _insertid()
	{
        if ($this->lastStmt !== false)
        {
            if (sqlsrv_next_result($this->lastStmt))
            {
                sqlsrv_fetch($this->lastStmt);
                $this->lastInsID = sqlsrv_get_field($this->lastStmt, 0);
                return $this->lastInsID;
            }
        }
        
        return false;
	}

	function _affectedrows()
	{
        if ($this->lastStmt != false)
        {
            return @sqlsrv_rows_affected($this->lastStmt);
        }
		
        return -1;
	}

	var $_dropSeqSQL = "drop table %s";
	
	function CreateSequence($seq='adodbseq',$start=1)
	{
		
		$this->Execute('BEGIN TRANSACTION adodbseq');
		$start -= 1;
		$this->Execute("create table $seq (id float(53))");
		$ok = $this->Execute("insert into $seq with (tablock,holdlock) values($start)");
		if (!$ok) {
				$this->Execute('ROLLBACK TRANSACTION adodbseq');
				return false;
		}
		$this->Execute('COMMIT TRANSACTION adodbseq'); 
		return true;
	}

	function GenID($seq='adodbseq',$start=1)
	{
		//$this->debug=1;
		$this->Execute('BEGIN TRANSACTION adodbseq');
		$ok = $this->Execute("update $seq with (tablock,holdlock) set id = id + 1");
		if (!$ok) {
			$this->Execute("create table $seq (id float(53))");
			$ok = $this->Execute("insert into $seq with (tablock,holdlock) values($start)");
			if (!$ok) {
				$this->Execute('ROLLBACK TRANSACTION adodbseq');
				return false;
			}
			$this->Execute('COMMIT TRANSACTION adodbseq'); 
			return $start;
		}
		$num = $this->GetOne("select id from $seq");
		$this->Execute('COMMIT TRANSACTION adodbseq'); 
		return $num;
		
		// in old implementation, pre 1.90, we returned GUID...
		//return $this->GetOne("SELECT CONVERT(varchar(255), NEWID()) AS 'Char'");
	}
	

	function &SelectLimit($sql,$nrows=-1,$offset=-1, $inputarr=false,$secs2cache=0)
	{
		if ($nrows > 0 && $offset <= 0) {
			$sql = preg_replace(
				'/(^\s*select\s+(distinctrow|distinct)?)/i','\\1 '.$this->hasTop." $nrows ",$sql);
			$rs =& $this->Execute($sql,$inputarr);
		} else
			$rs =& ADOConnection::SelectLimit($sql,$nrows,$offset,$inputarr,$secs2cache);
	
		return $rs;
	}
	
	
	// Format date column in sql string given an input format that understands Y M D
	function SQLDate($fmt, $col=false)
	{	
		if (!$col) $col = $this->sysTimeStamp;
		$s = '';
		
		$len = strlen($fmt);
		for ($i=0; $i < $len; $i++) {
			if ($s) $s .= '+';
			$ch = $fmt[$i];
			switch($ch) {
			case 'Y':
			case 'y':
				$s .= "datename(yyyy,$col)";
				break;
			case 'M':
				$s .= "convert(char(3),$col,0)";
				break;
			case 'm':
				$s .= "replace(str(month($col),2),' ','0')";
				break;
			case 'Q':
			case 'q':
				$s .= "datename(quarter,$col)";
				break;
			case 'D':
			case 'd':
				$s .= "replace(str(day($col),2),' ','0')";
				break;
			case 'h':
				$s .= "substring(convert(char(14),$col,0),13,2)";
				break;
			
			case 'H':
				$s .= "replace(str(datepart(hh,$col),2),' ','0')";
				break;
				
			case 'i':
				$s .= "replace(str(datepart(mi,$col),2),' ','0')";
				break;
			case 's':
				$s .= "replace(str(datepart(ss,$col),2),' ','0')";
				break;
			case 'a':
			case 'A':
				$s .= "substring(convert(char(19),$col,0),18,2)";
				break;
				
			default:
				if ($ch == '\\') {
					$i++;
					$ch = substr($fmt,$i,1);
				}
				$s .= $this->qstr($ch);
				break;
			}
		}
		return $s;
	}

	
	function BeginTrans()
	{
		if ($this->transOff) return true; 
		$this->transCnt += 1;
        return sqlsrv_begin_transaction($this->_connectionID);
	   	//$this->Execute('BEGIN TRAN');
	   	//return true;
	}
		
	function CommitTrans($ok=true) 
	{ 
		if ($this->transOff) return true; 
		if (!$ok) return $this->RollbackTrans();
		if ($this->transCnt) $this->transCnt -= 1;
		return sqlsrv_commit($this->_connectionID);
        //$this->Execute('COMMIT TRAN');
		//return true;
	}
	function RollbackTrans()
	{
		if ($this->transOff) return true; 
		if ($this->transCnt) $this->transCnt -= 1;
		return sqlsrv_rollback($this->_connectionID);
        //$this->Execute('ROLLBACK TRAN');
		//return true;
	}
	
	function SetTransactionMode( $transaction_mode ) 
	{
		$this->_transmode  = $transaction_mode;
		if (empty($transaction_mode)) {
			$this->Execute('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
			return;
		}
		if (!stristr($transaction_mode,'isolation')) $transaction_mode = 'ISOLATION LEVEL '.$transaction_mode;
		$this->Execute("SET TRANSACTION ".$transaction_mode);
	}
	
	/*
		Usage:
		
		$this->BeginTrans();
		$this->RowLock('table1,table2','table1.id=33 and table2.id=table1.id'); # lock row 33 for both tables
		
		# some operation on both tables table1 and table2
		
		$this->CommitTrans();
		
		See http://www.swynk.com/friends/achigrik/SQL70Locks.asp
	*/
	function RowLock($tables,$where,$flds='top 1 null as ignore') 
	{
		if (!$this->transCnt) $this->BeginTrans();
		return $this->GetOne("select $flds from $tables with (ROWLOCK,HOLDLOCK) where $where");
	}
	
	
	function &MetaIndexes($table,$primary=false)
	{
		$table = $this->qstr($table);

		$sql = "SELECT i.name AS ind_name, c.name AS col_name, USER_NAME(o.principal_id) AS Owner, c.object_id AS colid, k.key_ordinal as Keyno, i.is_primary_key AS IsPK, i.is_unique AS IsUnique FROM  sys.objects o INNER JOIN  sys.indexes i ON o.object_id = i.object_id INNER JOIN  sys.index_columns k ON I.object_id = k.object_id AND i.index_id = k.index_id INNER JOIN  sys.columns c ON k.object_id = c.object_id AND k.column_id = c.column_id WHERE  LEFT(i.name, 8) <> '_WA_Sys_' AND o.name LIKE $table ORDER BY  o.name, i.Name, k.key_ordinal";

		global $ADODB_FETCH_MODE;
		$save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        if ($this->fetchMode !== FALSE) {
        	$savem = $this->SetFetchMode(FALSE);
        }
        
        $rs = $this->Execute($sql);
        if (isset($savem)) {
        	$this->SetFetchMode($savem);
        }
        $ADODB_FETCH_MODE = $save;

        if (!is_object($rs)) {
        	return FALSE;
        }

		$indexes = array();
		while ($row = $rs->FetchRow()) {
			if (!$primary && $row[5]) continue;
			
            $indexes[$row[0]]['unique'] = $row[6];
            $indexes[$row[0]]['columns'][] = $row[1];
    	}
        return $indexes;
	}
	
	function MetaForeignKeys($table, $owner=false, $upper=false)
	{
	global $ADODB_FETCH_MODE;
	
		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		$table = $this->qstr(strtoupper($table));
        
		$sql = "select object_name(constraint_object_id) as constraint_name, col_name(parent_object_id, parent_column_id) as column_name, object_name(referenced_object_id) as referenced_table_name,col_name(referenced_object_id, referenced_column_id) as referenced_column_name from sys.foreign_key_columns where object_name(parent_object_id) = $table order by constraint_name";
		
		$constraints =& $this->GetArray($sql);
		
		$ADODB_FETCH_MODE = $save;
		
		$arr = false;
		foreach($constraints as $constr) {
			//print_r($constr);
			$arr[$constr[0]][$constr[2]][] = $constr[1].'='.$constr[3]; 
		}
		if (!$arr) return false;
		
		$arr2 = false;
		
		foreach($arr as $k => $v) {
			foreach($v as $a => $b) {
				if ($upper) $a = strtoupper($a);
				$arr2[$a] = $b;
			}
		}
		return $arr2;
	}

	//From: Fernando Moreira <FMoreira@imediata.pt>
	function MetaDatabases() 
	{
        $qry=$this->metaDatabasesSQL;
        $stmt = sqlsrv_query($this->_connectionID, $qry);
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
        {
           $ar[] = $row[0]; 
        }
        
        return $ar;
	} 

	// "Stein-Aksel Basma" <basma@accelero.no>
	// tested with MS SQL 2000
	function &MetaPrimaryKeys($table)
	{
        global $ADODB_FETCH_MODE;
	
		$schema = '';
		$this->_findschema($table,$schema);
		if (!$schema) $schema = $this->database;
		if ($schema) $schema = "and k.table_catalog like '$schema%'"; 

		$sql = "select distinct k.column_name,ordinal_position from information_schema.key_column_usage k, information_schema.table_constraints tc  where tc.constraint_name = k.constraint_name and tc.constraint_type = 'PRIMARY KEY' and k.table_name = '$table' $schema order by ordinal_position ";
		
		$savem = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		$a = $this->GetCol($sql);
		$ADODB_FETCH_MODE = $savem;
		
		if ($a && sizeof($a)>0) return $a;
		$false = false;
		return $false;	  
	}

	
	function &MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
		if ($mask) {
			$save = $this->metaTablesSQL;
			$mask = $this->qstr(($mask));
			$this->metaTablesSQL .= " AND name like $mask";
		}
		$ret =& ADOConnection::MetaTables($ttype,$showSchema);
		
		if ($mask) {
			$this->metaTablesSQL = $save;
		}
		return $ret;
	}
 
	function SelectDB($dbName) 
	{
		$this->database = $dbName;
		$this->databaseName = $dbName; # obsolete, retained for compat with older adodb versions
        return $this->Connect($this->host, $this->user, $this->password, $this->database);			
	}
	
	function ErrorMsg() 
	{
		if ($this->_errorCode !== false) return $this->_errorMsg;
        return false;
	}
	
	function ErrorNo() 
	{
		if ($this->_errorCode !== false) return $this->_errorCode;
        return -1;
	}
    
	// returns true or false
	function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
        self::_devLog("");
		if (!function_exists('sqlsrv_connect')) return false;
		$this->_connectionID = sqlsrv_connect($argHostname, array("UID" => $argUsername, "PWD" => $argPassword, "Database" => $argDatabasename, "ReturnDatesAsStrings" => true));
		if ($this->_connectionID === false) return false;
		return true;
	}
	
	
	// returns true or false
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		
        self::_devLog("");
        if ($this->_connectionID != false && $this->database == $argDatabasename)
        {
            self::_devLog("Already connected");
            return true;
        }
        return $this->_connect($argHostname, $argUsername, $argPassword, $argDatabasename);
	}
	
	function Prepare($sql)
	{
		$sqlarr = explode('?',$sql);
		if (sizeof($sqlarr) <= 1) return $sql;
		$sql2 = $sqlarr[0];
		for ($i = 1, $max = sizeof($sqlarr); $i < $max; $i++) {
			$sql2 .=  '@P'.($i-1) . $sqlarr[$i];
		} 
		return array($sql,$this->qstr($sql2),$max);
	}
	
	function PrepareSP($sql)
	{
		if (!$this->_has_sqlsrv_init) {
			ADOConnection::outp( "PrepareSP: sqlsrv_init only available since PHP 4.1.0");
			return $sql;
		}
        
		$stmt = sqlsrv_prepare($this->_connectionID, $sql);
		if (!$stmt)  return $sql;
		return array($sql,$stmt);
	}
	
	// returns concatenated string
    // MSSQL requires integers to be cast as strings
    // automatically cast every datatype to VARCHAR(255)
    // @author David Rogers (introspectshun)
    function Concat()
    {
            $s = "";
            $arr = func_get_args();

            // Split single record on commas, if possible
            if (sizeof($arr) == 1) {
                foreach ($arr as $arg) {
                    $args = explode(',', $arg);
                }
                $arr = $args;
            }

            array_walk($arr, create_function('&$v', '$v = "CAST(" . $v . " AS VARCHAR(255))";'));
            $s = implode('+',$arr);
            if (sizeof($arr) > 0) return "$s";
            
			return '';
    }
	
	
	/* 
		Unfortunately, it appears that ms sql cannot handle varbinary > 255 chars
		So all your blobs must be of type "image".
		
		Remember to set in php.ini the following...
		
		; Valid range 0 - 2147483647. Default = 4096. 
		ms sql.textlimit = 0 ; zero to pass through 

		; Valid range 0 - 2147483647. Default = 4096. 
		ms sql.textsize = 0 ; zero to pass through 
	*/
	function UpdateBlob($table,$column,$val,$where,$blobtype='BLOB')
	{
	
		if (strtoupper($blobtype) == 'CLOB') {
			$sql = "UPDATE $table SET $column='" . $val . "' WHERE $where";
			return $this->Execute($sql) != false;
		}
		$sql = "UPDATE $table SET $column=0x".bin2hex($val)." WHERE $where";
		return $this->Execute($sql) != false;
	}
	
	// returns query ID if successful, otherwise false
	function _query($sql,$inputarr)
	{
		$sqlType = "none";
		$this->_errorMsg = false;
		if (is_array($inputarr)) {
			
			# bind input params with sp_executesql: 
			# see http://www.quest-pipelines.com/newsletter-v3/0402_F.htm
			# works only with sql server 7 and newer
			if (!is_array($sql)) $sql = $this->Prepare($sql);
			$params = '';
			$decl = '';
			$i = 0;
			foreach($inputarr as $v) {
				if ($decl) {
					$decl .= ', ';
					$params .= ', ';
				}	
				if (is_string($v)) {
					$len = strlen($v);
					if ($len == 0) $len = 1;
					
					if ($len > 4000 ) {
						// NVARCHAR is max 4000 chars. Let's use NTEXT
						$decl .= "@P$i NTEXT";
					} else {
						$decl .= "@P$i NVARCHAR($len)";
					}

					$params .= "@P$i=N". (strncmp($v,"'",1)==0? $v : $this->qstr($v));
				} else if (is_integer($v)) {
					$decl .= "@P$i INT";
					$params .= "@P$i=".$v;
				} else if (is_float($v)) {
					$decl .= "@P$i FLOAT";
					$params .= "@P$i=".$v;
				} else if (is_bool($v)) {
					$decl .= "@P$i INT"; # Used INT just in case BIT in not supported on the user's MS SQL version. It will cast appropriately.
					$params .= "@P$i=".(($v)?'1':'0'); # True == 1 in MS SQL BIT fields and acceptable for storing logical true in an int field
				} else {
					$decl .= "@P$i CHAR"; # Used char because a type is required even when the value is to be NULL.
					$params .= "@P$i=NULL";
					}
				$i += 1;
			}
			$decl = $this->qstr($decl);
			if ($this->debug) ADOConnection::outp("<font size=-1>sp_executesql N{$sql[1]},N$decl,$params</font>");
			$rez = sqlsrv_query($this->_connectionID, "sp_executesql N{$sql[1]},N$decl,$params");
			$sqlType = "0";
		} else if (is_array($sql)) {
			# PrepareSP()
			$rez = sqlsrv_query($this->_connectionID, $sql[1]);
			$sqlType = "1";
		} else {
			if (strtolower(substr($sql, 0, 7)) == "insert ")
			{
				$sql .= "; SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME;";
				$rez = sqlsrv_query($this->_connectionID, $sql);
				$sqlType = "2";
			}
			else if (strtolower(substr($sql, 0, 7)) == "update ")
			{
			    $rez = sqlsrv_query($this->_connectionID, $sql);
			    $sqlType = "3";
			}
			else
			{
			    /*
			    if ($this->metaTablesSQL == $sql)
			    {
				sqlrv_close($this->_connectionID);
				$this->Connect();
			    }
			    */
			    $rez = sqlsrv_query($this->_connectionID, $sql, null, array( "Scrollable" => SQLSRV_CURSOR_FORWARD)); // KEYSET would allow for sqlsrv_num_rows but in azure it just takes too long.
			    $sqlType = "4";
			}
		}
        
        // Error checking
        $this->_errorMsg = null;
        $this->_errorCode = false;
        if ($rez === false)
        {
            $errors = sqlsrv_errors();
            if( $errors != null)
            {
                $this->_errorMsg = $errors[0]['message'];
                $this->_errorCode = $errors[0]['code'];
                self::_devLog("Error (" .  $this->_errorCode . ", SQL Type: $sqlType): " . $this->_errorMsg, true);
            }
        }
        else
        {
            self::_devLog("SQL type=$sqlType");
        }
        
        $this->lastStmt = $rez;
		return $rez;
	}

// moodle change start - see readme_moodle.txt
	/**
	* Correctly quotes a string so that all strings are escaped. We prefix and append
	* to the string single-quotes.
	* An example is  $db->qstr("Don't bother",magic_quotes_runtime());
	* 
	* @param s         the string to quote
	* @param [magic_quotes]    if $s is GET/POST var, set to get_magic_quotes_gpc().
	*              This undoes the stupidity of magic quotes for GPC.
	*
	* @return  quoted string to be sent back to database
	*/
	function qstr($s,$magic_quotes=false)
	{
        return "'" . self::addq($s, $magic_quotes) . "'";
	}
    
	/**
	* Quotes a string, without prefixing nor appending quotes. 
	*/
	function addq($s,$magic_quotes=false)
	{
        $s = str_replace("\\\"",'"',$s);
        $s = str_replace("\\\\","\\",$s);
        $s = str_replace("\\'", "'", $s);
        $s = str_replace("'", $this->replaceQuote, $s);
        //self::_devLog($s);
        return $s;
	}
// moodle change end - see readme_moodle.txt
	
	// returns true or false
	function _close()
	{
        self::_devLog("");
		if ($this->transCnt) $this->RollbackTrans();
		$rez = @sqlsrv_close($this->_connectionID);
		$this->_connectionID = false;
		return $rez;
	}
	
	// ms sql uses a default date like Dec 30 2000 12:00AM
	static function UnixDate($v)
	{
		return ADORecordSet_array_sqlsrv::UnixDate($v);
	}
	
	static function UnixTimeStamp($v)
	{
		return ADORecordSet_array_sqlsrv::UnixTimeStamp($v);
	}
    
    function _devLog($message, $isError = false)
    {
        if ($this->_enableDevelopmentLog !== true) return;
        
        $type = 3;
        $destination = "c:/moodledata/sqlsrv.log";
        
        if ($isError === true)
        {
            $backTrace = debug_backtrace();
            $func = "(no function)";
            //print_r($backTrace);
            if (count($backTrace) > 1)
            {
                $caller = $backTrace[1];
                $func = "[" . $caller["line"] . ":" . $caller["file"] . "] > " . $caller["function"] . "(" . implode(", ", $caller["args"]) . ")";
            }
            
            $entry = date("Y-m-d H:i:s") . " > ERROR > ADODB SQLSRV > " . $func . " >> " . $message . "\r\n";
	    $entry = str_replace("\r\n", " ", $entry);
	    $entry = str_replace("\r", " ", $entry);
	    $entry = str_replace("\n", " ", $entry);
	    
            if (@getenv("RoleRoot") === false)
                @error_log($entry . "\r\n", $type, $destination);
            
            for ($i = 2; $i < count($backTrace); $i++)
            {
                $caller = $backTrace[$i];
                if (is_array($caller['args']))
                {
                    $args = ""; // @implode(", ", $caller["args"])
                    foreach ($caller["args"] as $arg)
                    {
                        if (is_array($arg) || is_object($arg))
                        {
                            $args .= "(" . gettype($arg) . "), ";
                        }
                        else
                        {
                            $args .= $arg . ", ";
                        }
                        
                    }
                    
                    $func = "                [" . $caller["line"] . ":" . $caller["file"] . "] > " . $caller["function"] . "(" . $args . ")\r\n";
                }
                else
                {
                    $func = "                [" . $caller["line"] . ":" . $caller["file"] . "] > " . $caller["function"] . "()\r\n";
                }
                
                if (@getenv("RoleRoot") === false)
                    @error_log($func, $type, $destination);
            }
            
        }
        else
        {
            $backTrace = debug_backtrace();
            $func = "(no function)";
            
            if (count($backTrace) > 1)
            {
                $caller = $backTrace[1];
                $func = "[" . $caller["line"] . ":" . $caller["file"] . "] > " . $caller["function"] . "(" . implode(", ", $caller["args"]) . ")";
            }
            
            $entry = date("Y-m-d H:i:s") . " > INFO > ADODB SQLSRV > " . $func . " >> " . $message . "\r\n";
	    $entry = str_replace("\r\n", " ", $entry);
	    $entry = str_replace("\r", " ", $entry);
	    $entry = str_replace("\n", " ", $entry);
	    
            if (@getenv("RoleRoot") === false)
                @error_log($entry . "\r\n", $type, $destination); 
        }
        
    }
}
	
/*--------------------------------------------------------------------------------------
	 Class Name: Recordset
--------------------------------------------------------------------------------------*/

class ADORecordset_sqlsrv extends ADORecordSet {	

	var $databaseType = "sqlsrv";
	var $canSeek = false;
	var $hasFetchAssoc; // see http://phplens.com/lens/lensforum/msgs.php?id=6083
	// _mths works only in non-localised system
    var $fieldMeta;
	var $currentFieldOffset;
    
	function ADORecordset_sqlsrv($id,$mode=false)
	{
		// freedts check...
		$this->hasFetchAssoc = function_exists('sqlsrv_fetch');
        $this->EOF = false;

		if ($mode === false) { 
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
        }
		$this->fetchMode = $mode;
		return $this->ADORecordSet($id,$mode);
	}
    
	function _initrs()
	{
        GLOBAL $ADODB_COUNTRECS;	
		$this->_numOfRows = -1; //($ADODB_COUNTRECS)? @sqlsrv_num_rows($this->_queryID):-1; // num_rows is only supported through KEYSET or STATIC cursors which create temp tables and makes it very slow in Azure.
		$this->_numOfFields = @sqlsrv_num_fields($this->_queryID);
        $this->fieldMeta = null;
        $this->EOF = false;
	}
	

	//Contributed by "Sven Axelsson" <sven.axelsson@bokochwebb.se>
	// get next resultset - requires PHP 4.0.5 or later
	function NextRecordSet()
	{
		if (!sqlsrv_next_result($this->_queryID)) return false;
		$this->_inited = false;
		$this->bind = false;
		$this->_currentRow = -1;
		$this->Init();
        $this->fieldMeta = null;
        $this->currentFieldOffset = 0;
        $this->EOF = false;
		return true;
	}

	/* Use associative array to get fields array */
	function Fields($colname)
	{
		if ($this->fetchMode != ADODB_FETCH_NUM) return $this->fields[$colname];
		if (!$this->bind) {
			$this->bind = array();
			for ($i=0; $i < $this->_numOfFields; $i++) {
				$o = $this->FetchField($i);
				$this->bind[strtoupper($o->name)] = $i;
			}
		}
		
		 return $this->fields[$this->bind[strtoupper($colname)]];
	}
	
	/*	Returns: an object containing field information. 
		Get column information in the Recordset object. fetchField() can be used in order to obtain information about
		fields in a certain query result. If the field offset isn't specified, the next field that wasn't yet retrieved by
		fetchField() is retrieved.	*/

    
	function &FetchField($fieldOffset = -1) 
	{
        if (!is_array($this->fieldMeta))
        {
            $this->fieldMeta = sqlsrv_field_metadata($this->_queryID);
        }
        
        if ($fieldOffset == -1)
        {
            $this->currentFieldOffset++;
            $fieldOffset = $this->currentFieldOffset;
        }
        
        if ($fieldOffset > count($this->fieldMeta) - 1) return false;
		$f = $this->fieldMeta[$fieldOffset];
        
        $o = new stdClass();
        $o->name = $f['Name'];
        $o->type = $f['Type'];
		if (ADODB_ASSOC_CASE == 0) $o->name = strtolower($o->name);
		else if (ADODB_ASSOC_CASE == 1) $o->name = strtoupper($o->name);
		return $o;
	}
	
	function _seek($row) 
	{
        return false;
	}

	// speedup
	function MoveNext() 
	{
        //if (!is_array($this->fieldMeta)) $this->FetchField();
        
		if ($this->EOF) return false;
        
        if ($this->fetchMode & ADODB_FETCH_ASSOC)
        {
            if ($this->fetchMode & ADODB_FETCH_NUM)
            {
                $res = sqlsrv_fetch_array($this->_queryID, SQLSRV_FETCH_BOTH, SQLSRV_SCROLL_NEXT);
            }
            else
            {
                $res = sqlsrv_fetch_array($this->_queryID, SQLSRV_FETCH_ASSOC, SQLSRV_SCROLL_NEXT);
            }
        }
        else
        {
            $res = sqlsrv_fetch_array($this->_queryID, SQLSRV_FETCH_NUMERIC, SQLSRV_SCROLL_NEXT);
        }
        
        if (is_array($res))
        {
            $this->fields = array();
            $keys = array_keys($res);
            foreach ($keys as $key)
            {
                $fkey = strtolower($key);
                if (ADODB_ASSOC_CASE == 1) $fkey = strtoupper($key);
                $this->fields[$fkey] = $res[$key];
            }
            
            return true;
        }
        else
        {
            $this->EOF = true;
            return false;
        }
	}

	
	// INSERT UPDATE DELETE returns false even if no error occurs in 4.0.4
	// also the date format has been changed from YYYY-mm-dd to dd MMM YYYY in 4.0.4. Idiot!
	function _fetch($ignore_fields=false) 
	{
        return $this->MoveNext();
	}
	
	/*	close() only needs to be called if you are worried about using too much memory while your script
		is running. All associated result memory for the specified result identifier will automatically be freed.	*/

	function _close() 
	{
		$rez = sqlsrv_free_stmt($this->_queryID);	
		$this->_queryID = false;
		return $rez;
	}
	// ms sql uses a default date like Dec 30 2000 12:00AM
	static function UnixDate($v)
	{
		return ADORecordSet_array_sqlsrv::UnixDate($v);
	}
	
	static function UnixTimeStamp($v)
	{
		return ADORecordSet_array_sqlsrv::UnixTimeStamp($v);
	}
	
	function MetaType($t,$len=-1,$fieldobj=false)
	{
        return 'C';
    }
    
}


class ADORecordSet_array_sqlsrv extends ADORecordSet_array {
	function ADORecordSet_array_sqlsrv($id=-1,$mode=false) 
	{
		$this->ADORecordSet_array($id,$mode);
	}
	
		// ms sql uses a default date like Dec 30 2000 12:00AM
	static function UnixDate($v)
	{
	
		if (is_numeric(substr($v,0,1)) && ADODB_PHPVER >= 0x4200) return parent::UnixDate($v);
		
	global $ADODB_sqlsrv_mths,$ADODB_sqlsrv_date_order;
	
		//Dec 30 2000 12:00AM 
		if ($ADODB_sqlsrv_date_order == 'dmy') {
			if (!preg_match( "|^([0-9]{1,2})[-/\. ]+([A-Za-z]{3})[-/\. ]+([0-9]{4})|" ,$v, $rr)) {
				return parent::UnixDate($v);
			}
			if ($rr[3] <= TIMESTAMP_FIRST_YEAR) return 0;
			
			$theday = $rr[1];
			$themth =  substr(strtoupper($rr[2]),0,3);
		} else {
			if (!preg_match( "|^([A-Za-z]{3})[-/\. ]+([0-9]{1,2})[-/\. ]+([0-9]{4})|" ,$v, $rr)) {
				return parent::UnixDate($v);
			}
			if ($rr[3] <= TIMESTAMP_FIRST_YEAR) return 0;
			
			$theday = $rr[2];
			$themth = substr(strtoupper($rr[1]),0,3);
		}
		$themth = $ADODB_sqlsrv_mths[$themth];
		if ($themth <= 0) return false;
		// h-m-s-MM-DD-YY
		return  mktime(0,0,0,$themth,$theday,$rr[3]);
	}
	
	static function UnixTimeStamp($v)
	{
	
		if (is_numeric(substr($v,0,1)) && ADODB_PHPVER >= 0x4200) return parent::UnixTimeStamp($v);
		
	global $ADODB_sqlsrv_mths,$ADODB_sqlsrv_date_order;
	
		//Dec 30 2000 12:00AM
		 if ($ADODB_sqlsrv_date_order == 'dmy') {
			 if (!preg_match( "|^([0-9]{1,2})[-/\. ]+([A-Za-z]{3})[-/\. ]+([0-9]{4}) +([0-9]{1,2}):([0-9]{1,2}) *([apAP]{0,1})|"
			,$v, $rr)) return parent::UnixTimeStamp($v);
			if ($rr[3] <= TIMESTAMP_FIRST_YEAR) return 0;
		
			$theday = $rr[1];
			$themth =  substr(strtoupper($rr[2]),0,3);
		} else {
			if (!preg_match( "|^([A-Za-z]{3})[-/\. ]+([0-9]{1,2})[-/\. ]+([0-9]{4}) +([0-9]{1,2}):([0-9]{1,2}) *([apAP]{0,1})|"
			,$v, $rr)) return parent::UnixTimeStamp($v);
			if ($rr[3] <= TIMESTAMP_FIRST_YEAR) return 0;
		
			$theday = $rr[2];
			$themth = substr(strtoupper($rr[1]),0,3);
		}
		
		$themth = $ADODB_sqlsrv_mths[$themth];
		if ($themth <= 0) return false;
		
		switch (strtoupper($rr[6])) {
		case 'P':
			if ($rr[4]<12) $rr[4] += 12;
			break;
		case 'A':
			if ($rr[4]==12) $rr[4] = 0;
			break;
		default:
			break;
		}
		// h-m-s-MM-DD-YY
		return  mktime($rr[4],$rr[5],0,$themth,$theday,$rr[3]);
	}
    
	function MetaType($t,$len=-1,$fieldobj=false)
	{
        return 'C';
    }
}

/*
Code Example 1:

select 	object_name(constid) as constraint_name,
       	object_name(fkeyid) as table_name, 
        col_name(fkeyid, fkey) as column_name,
	object_name(rkeyid) as referenced_table_name,
   	col_name(rkeyid, rkey) as referenced_column_name
from sysforeignkeys
where object_name(fkeyid) = x
order by constraint_name, table_name, referenced_table_name,  keyno

Code Example 2:
select 	constraint_name,
	column_name,
	ordinal_position
from information_schema.key_column_usage
where constraint_catalog = db_name()
and table_name = x
order by constraint_name, ordinal_position

http://www.databasejournal.com/scripts/article.php/1440551
*/

?>

