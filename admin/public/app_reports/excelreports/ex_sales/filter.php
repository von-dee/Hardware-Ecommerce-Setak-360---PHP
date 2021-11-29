<?php 


	include("../../../../config.php");
	include("excelReport.php");
	
	$engine = new Engine();
	$excel = new excelReport();
	
	

	$data = $engine->getDataDecrypt($keys);
	
	//$excel->ReportHeader($header);
	$header = array('No.', 'Customer Name', 'Invoice Number', 'No. of Items', 'Date Added', 'Amount Paid (GHS)', 'Change (GHS)', 'Total Cost (GHS)','Total Loss (GHS)','Total Amount (GHS)');
	
	$excel->ReportHeader($header);


	$excel->registeredData($data['data'],$data['company'],$data['person'],$data['from'],$data['to'],$data['dateprinted']);
	

	ob_end_clean();



?>