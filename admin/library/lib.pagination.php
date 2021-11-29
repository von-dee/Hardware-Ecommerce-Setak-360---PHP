<?php
class Pagination {
    var $php_self;
    var $rows_per_page = 10; //Number of records to display per page
    var $total_rows = 0; //Total number of rows returned by the query
    var $links_per_page = 5; //Number of links to display per page
    var $append = ""; //Paremeters to append to pagination links
    var $sql = "";
    var $odb;
    var $debug = true;
    var $conn = false;
    var $page = 1;
    var $max_pages = 1;
    var $offset = 0;
    var $params;
    var $mapup =array();

    /**
     * Constructor
     *
     * @param resource $connection adodb connection link
     * @param object $sql is the adodb connection instands
     * @param Array $tablename tables to query from
     * @param integer $rows_per_page Number of records to display per page. Defaults to 10
     * @param integer $links_per_page Number of links to display per page. Defaults to 5
     * @param Array $input_array the query where condictions // where name='ato'
     * @param Array $outputcolumns the output columns. Default is All
     * @param Array $mappings the mapping columns in cases of join query.
     * @param string $append Parameters to be appended to pagination links
     */

    function __construct ($sql,$query_collection, $rows_per_page = 10, $links_per_page = 5,$input_array=[], $outputcolumns=[], $append = "") {


        $this->sql = $query_collection;
        $this->odb = $sql;
        $this->params=$input_array;
        $this->rows_per_page = (int)$rows_per_page;

        if(empty($rows_per_page)){
            $this->rows_per_page =20;
            @$_SESSION["limited"]=20;
        }

        if (intval($links_per_page ) > 0) {
            $this->links_per_page = (int)$links_per_page;
        } else {
            $this->links_per_page = 5;
        }
        $this->append = $append;
        $this->php_self = htmlspecialchars($_SERVER['PHP_SELF'] );
        if (isset($_REQUEST['page'] )) {
            $this->page = intval($_REQUEST['page'] );
        }
    }

    /**
     * Executes the SQL query and initializes internal variables
     *
     * @access public
     * @return resource
     */
    function paginate() {
        
        $serverinfo = $this->odb->ServerInfo();
        
        if(isset($serverinfo["engine"]) && $serverinfo["engine"] =="mongo"){
            $all_rs =$this->odb->getTotalNumberOfRows($this->sql,$this->params);
            //echo $all_rs->RecordCount();
            $this->total_rows = $all_rs;
        }else{
            //Find total number of rows
            $stmt = $this->odb->Prepare($this->sql);
            
            if(is_array($this->params) && !empty($this->params)){
                $all_rs = $this->odb->Execute($stmt,$this->params);
            }else{
                $all_rs = $this->odb->Execute($stmt);
            }
            
            
            if (! $all_rs) {
                
                if ($this->debug)
                    echo "SQL query failed. Check your query.<br /><br />Error Returned: " . $this->odb->ErrorMsg();
                    return false;
            }
            $this->total_rows = $all_rs->RecordCount();
        }
       

        //Return FALSE if no rows found
        if ($this->total_rows == 0) {
            if ($this->debug)
//                echo "Query returned zero rows.";
            return FALSE;
        }

        if($this->rows_per_page !='all'){
            //Max number of pages
            $this->max_pages = ceil($this->total_rows / $this->rows_per_page );
            if ($this->links_per_page > $this->max_pages) {
                $this->links_per_page = $this->max_pages;
            }

            //Check the page value just in case someone is trying to input an aribitrary value
            if ($this->page > $this->max_pages || $this->page <= 0) {
                $this->page = 1;
            }

            //Calculate Offset
            $this->offset = $this->rows_per_page * ($this->page - 1);

            //Fetch the required result set
            //$rs = $this->odb->Prepare($this->sql . " LIMIT {$this->offset}, {$this->rows_per_page}" );
            $rs = $this->odb->Prepare($this->sql);
            //select all
          

            if(is_array($this->params) && !empty($this->params)){

                $rs = $this->odb->SelectLimit($rs,$this->rows_per_page,$this->offset,$this->params);
                //$rs = $this->odb->Execute($rs,$this->params);
            }else{

                $rs = $this->odb->SelectLimit($rs,$this->rows_per_page,$this->offset);
            }//end of if

        }else{
            $rs = $this->odb->Prepare($this->sql);
            //select all
            if(is_array($this->params) && !empty($this->params)){
                $rs = $this->odb->SelectLimit($rs,-1,-1,$this->params);
                //$rs = $this->odb->Execute($rs,$this->params);
            }else{
                $rs = $this->odb->SelectLimit($rs);
               // $rs = $this->odb->Execute($rs);
            }//end of if
        }



        if (! $rs) {
            if ($this->debug)
                echo "Pagination query failed. Check your query.<br /><br />Error Returned: " . $this->odb->ErrorMsg();
            return false;
        }
        print $this->odb->ErrorMsg();
        
        
        if(isset($serverinfo["engine"]) && $serverinfo["engine"] =="mongo"){
            $rs = $rs->toArray();
        }else{
            $rs = $rs->GetArray();
        }
        return $rs;
    }

    /**
     * Display the link to the first page
     *
     * @access public
     * @param string $tag Text string to be displayed as the link. Defaults to 'First'
     * @return string
     */
    function renderFirst($tag = 'First') {
        if ($this->total_rows == 0)
            return FALSE;

        if ($this->page == 1) {
            return "";
        } else {
            //return '<a href="' . $this->php_self . '?page=1&' . $this->append . '">' . $tag . '</a> ';
            return '<a href="javascript:void(0)" onclick="document.getElementById(\'pagehiddenallform\').value=\'1\';document.getElementById(\'myform\').submit()" class="" title="First Page">' . $tag . '</a>';
        }
    }

    /**
     * Display the link to the last page
     *
     * @access public
     * @param string $tag Text string to be displayed as the link. Defaults to 'Last'
     * @return string
     */
    function renderLast($tag = 'Last') {
        if ($this->total_rows == 0)
            return FALSE;

        if ($this->page == $this->max_pages) {
            return "";
        } else {
            //return ' <a href="' . $this->php_self . '?page=' . $this->max_pages . '&' . $this->append . '">' . $tag . '</a>';
            return '<a href="javascript:void(0)" onclick="document.getElementById(\'pagehiddenallform\').value='.($this->max_pages).';document.getElementById(\'myform\').submit()" class="" title="Last Page">' . $tag . '</a>';
        }
    }

    /**
     * Display the next link
     *
     * @access public
     * @param string $tag Text string to be displayed as the link. Defaults to '>>'
     * @return string
     */
    function renderNext($tag = '&gt;&gt;',$tagon = '&lt;&lt;') {
        if ($this->total_rows == 0)
            return $tag;

        if ($this->page < $this->max_pages) {
            return (($this->page < ($this->max_pages - $this->links_per_page))?'':'').'<a href="javascript:void(0)" onclick="document.getElementById(\'pagehiddenallform\').value='.($this->page + 1).';document.getElementById(\'myform\').submit()" class="" title="Next Page">' . $tagon . '</a>';
        } else {
            return $tag;
        }
    }

    /**
     * Display the previous link
     *
     * @access public
     * @param string $tag Text string to be displayed as the link. Defaults to '<<'
     * @return string
     */
    function renderPrev($tag = '&lt;&lt;',$tagon = '&lt;&lt;') {
        if ($this->total_rows == 0)
            return $tag;

        if ($this->page > 1) {
            return '<a href="javascript:void(0)" onclick="document.getElementById(\'pagehiddenallform\').value='.($this->page - 1).';document.getElementById(\'myform\').submit()" class="" title="Previous Page">' . $tagon . '</a>'.(($this->page > $this->links_per_page)?'':'');
        } else {
            return " $tag";
        }
    }

    /**
     * Display the page links
     *
     * @access public
     * @return string
     */
    function renderNav($prefix = '<span class="page_link">', $suffix = '</span>') {
        if ($this->total_rows == 0)
            return FALSE;

        $batch = ceil($this->page / $this->links_per_page );
        $end = $batch * $this->links_per_page;
        if ($end == $this->page) {
            //$end = $end + $this->links_per_page - 1;
            //$end = $end + ceil($this->links_per_page/2);
        }
        if ($end > $this->max_pages) {
            $end = $this->max_pages;
        }
        $start = $end - $this->links_per_page + 1;
        $links = '';

        for($i = $start; $i <= $end; $i ++) {
            if ($i == $this->page) {
                $links .= $prefix . " $i " . $suffix;
            } else {
                $links .= ' ' . $prefix . '<a href="' . $this->php_self . '?page=' . $i . '&' . $this->append . '">' . $i . '</a>' . $suffix . ' ';
            }
        }

        return $links;
    }

    /**
     * Display the page number
     *
     * @access public
     * @return string
     */
    function renderNavNum(){
        if ($this->total_rows == 0)
            return FALSE;

        $batch = ceil($this->page / $this->links_per_page );
        $end = $batch * $this->links_per_page;
        if ($end > $this->max_pages) {
            $end = $this->max_pages;
        }
        $start = $end - $this->links_per_page + 1;
        $links = '';

        return $this->page;
    }
    /**
     * Display full pagination navigation
     *
     * @access public
     * @return string
     */
    function renderFullNav() {
        return $this->renderFirst() . '&nbsp;' . $this->renderPrev() . '&nbsp;' . $this->renderNav() . '&nbsp;' . $this->renderNext() . '&nbsp;' . $this->renderLast();
    }

    function limitList($limit,$formname){
        echo '<input type="hidden" value="" name="page" id="pagehiddenallform" />';
        echo '<select name="limit" onchange="document.'.$formname.'.submit()" style="width:60px;padding-left:5px; height:31px;border-radius:5px; border:1px solid #CDD4DB;background:transparent;color:inherit;appearance: none;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;-webkit-appearance: none;-moz-appearance: none;background-image:linear-gradient(45deg, transparent 50%, #939BA3 50%),linear-gradient(135deg, #939BA3 50%, transparent 50%),linear-gradient(to right, transparent, transparent);background-position:calc(100% - 10px) calc(0.8em + 2px),calc(100% - 5px) calc(0.8em + 2px),100% 0;background-size:5px 5px,5px 5px,2.5em 2.5em;background-repeat: no-repeat;">
                <option '.(($limit =='10')?'selected="selected"':'').' value="10">10</option>
                <option '.(($limit =='50')?'selected="selected"':'').' value="50">50</option>
                <option '.(($limit =='100')?'selected="selected"':'').' value="100">100</option>
                <option '.(($limit =='200')?'selected="selected"':'').' value="200">200</option>
                <option '.(($limit =='500')?'selected="selected"':'').' value="500">500</option>
            </select>';
    }

    /**
     * Set debug mode
     *
     * @access public
     * @param bool $debug Set to TRUE to enable debug messages
     * @return void
     */
    function setDebug($debug) {
        $this->debug = $debug;
    }

    function mapUp($subholdings){
        $this->mapup = $subholdings;
    }

    function buildForm(){
        $isValid = false;
        $exp = array("keys","view","selproduct","subaction","target","syscheckbox","syscheckbox2","syscheckbox3","checkmandate","inputdate","option","viewpage","inputyear","inputmonth","basregid","basdisid","basdepid","basminid","fdsearch","fsearch","report","inputusername","inputuserpassword","inputsurname","inputothername","prollid","phoneno","uregion","inputcategory","inputpriority","inputopexception","inputpassword","inputstatus","action_keysup","cirdisid","agencyid","cirunitid","ajaxfilter","frmname","month","year");

        if(is_array($_POST)){
            $str = '
				<input type="hidden" value="" name="page" id="pagehiddenallform" />';
            $isValid = true;
            foreach($_POST as $key => $value){
                if(in_array($key,$exp)){
                    $str .='<input type="hidden" value="'.$value.'" name="'.$key.'" />';
                }
            }
        }
        // for map ups
        if(is_array($this->mapup) && count($this->mapup) > 0){
            foreach ($this->mapup as $keymap => $valuemap){
                $str .='<input type="hidden" value="'.$valuemap.'" name="'.$keymap.'" />';
            }

        }
        if($isValid) {
            //$str .= '</form>';
        }
        echo $str;
    }//end of buildForm

    public function view_paginate($paging,$limit,$fdsearch){
        $pager = '<div class="page form">
                    <div class="row" style="padding-top:20px;padding-bottom:20px;">
                        <div class="col-sm-3">
                            <div id="pager">
                                '.$paging->renderFirst('').$paging->renderPrev('<span class="fa fa-chevron-left"></span>','<span class="fa fa-chevron-left"></span>').'
                                <input name="page" type="text" value="'.$paging->renderNavNum().'" readonly style="width:40px;padding-left:5px; height:31px;border-radius:5px; border:1px solid #CDD4DB;"/>
                                '.$paging->renderNext('<span class="fa fa-chevron-right"></span>','<span class="fa fa-chevron-right"></span>').'
                                '.$paging->renderLast('').$paging->limitList($limit,"myform").'
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" tabindex="1" value="'.$fdsearch.'" class="form-control square-input" name="fdsearch" placeholder="Enter to Search"
                                />
                                <span class="input-group-btn">
                                    <button type="submit" onclick="document.getElementById(\'view\').value=\'\';document.getElementById(\'viewpage\').value=\'searchitem\';document.myform.submit;" style="background:#fff;border:none;border-bottom:1px solid #CDD4DB;padding:5px;margin-left:-13px;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button style="background:#fff;border:none;border-bottom:1px solid #CDD4DB;padding:0 8px 5px 8px;margin-left:-3px;" onclick="document.getElementById(\'view\').value=\'\';document.getElementById(\'viewpage\').value=\'\';document.myform.submit;"><i class="fa fa-refresh"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <span style="float:right;">'.$paging->page_count($paging).'</span>
                        </div>
                    </div>   
                </div> ';
        return $pager;
    }

    public function page_count($paging){
        $count = $paging->renderNavNum().' of '.$paging->max_pages.' <b style="margin-left:10px;">Total: '.$paging->total_rows.'</b>';
        return $count;
    }
}
?>