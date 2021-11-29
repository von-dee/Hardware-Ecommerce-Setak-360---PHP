<?php 


	include("../../../../config.php");
	include("excelReport.php");
	
	$engine = new Engine();
	$excel = new excelReport();
	
	

	$data = $engine->getDataDecrypt($keys);
	
	//$excel->ReportHeader($header);
	$header = array('No.', 'Full Name', 'Date of Birth', 'Home Address', 'Phone Number', 'Email', 'Bike Name', 'Bike Number Plate', 'Date Added');
	
	$excel->ReportHeader($header);


	$excel->registeredData($data['data'],$data['company'],$data['person'],$data['from'],$data['to'],$data['dateprinted']);
	

	ob_end_clean();



?>