<?php 


	include("../../../../config.php");
	include("excelReport.php");
	
	$engine = new Engine();
	$excel = new excelReport();
	
	

	$data = $engine->getDataDecrypt($keys);
	
	//$excel->ReportHeader($header);
	$header = array('No.', 'Created By', 'Category', 'Total Amount (GHS)', 'Amount Paid (GHS)', 'Unpaid Amount (GHS)', 'Date Added');
	
	$excel->ReportHeader($header);


	$excel->registeredData($data['data'],$data['company'],$data['person'],$data['from'],$data['to'],$data['dateprinted']);
	

	ob_end_clean();



?>