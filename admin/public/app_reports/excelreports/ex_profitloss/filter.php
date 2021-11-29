<?php 


	include("../../../../config.php");
	include("excelReport.php");
	
	$engine = new Engine();
	$excel = new excelReport();
	
	

	$data = $engine->getDataDecrypt($keys);
	
	//$excel->ReportHeader($header);
	$header = array('No.', 'Transaction Code', 'Transaction Date', 'Amount', 'Paytype', 'Payment Mode', 'Rider\'s Name', 'Date Added');
	
	$excel->ReportHeader($header);


	$excel->registeredData($data['data'],$data['company'],$data['person'],$data['from'],$data['to'],$data['dateprinted']);
	

	ob_end_clean();



?>