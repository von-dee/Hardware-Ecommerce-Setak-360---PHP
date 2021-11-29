<?php
/*
* This represents the excel report class
* It contains the header, property and various excel's report functions 
*/

 class excelReport
 {
	  private $sql;
	  private $objExcel;
	  private $PageMargins;
	  private $Style;
	  private $objDrawing;
	  public $comp_name;
	  public $rep_title;
	  public $getclientname;
	 // public $thelevel;
	  
      function  __construct() {
            global $sql;
        $this->sql=$sql;
		$this->objExcel = new PHPExcel();
		$this->PageMargins = new PHPExcel_Worksheet_PageMargins();
		$this->Style = new PHPExcel_Style();
		
		
		//Stylings
		$this->Style->applyFromArray(
	array(
		  'borders' => array(
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		 ));
	
        }		
	 
	  function ReportHeader($header)
	  {
		  
		   // Set properties
          $this->objExcel->getProperties()->setCreator($header[0])
							 ->setLastModifiedBy($header[0])
							 ->setTitle($header[0])
							 ->setSubject("Excel Report Document")
							 ->setDescription("Report Document for Office 2007 XLSX.")
							 ->setKeywords("office excel 2007 ")
							 ->setCategory("Exported Excel Reports");
		// Set header and footer. When no different headers for odd/even are used, odd header is assumed.
		 
         $this->objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader("&L&G&R&H".$header[0]."\n".$header[1]."\n".$header[2]."\n".$header[3]."\n".$header[4]."\n\n".$header[5]."\n".$header[6]." ");
         $this->objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $this->objExcel->getProperties()->getTitle() . '&RPage &P of &N');		
	  }
	
	// function registeredData($trustee,$client,$dateprinted,$data)
	function registeredData($data,$company,$person,$from,$to,$dateprinted){	  
	  
	  	$limitcadre = count($data) + 4;
	  	$this->objExcel->getActiveSheet()->setSharedStyle($this->Style, "A1:F1".$limitcadre);
  
	  $styleArray = array(
     	'font' => array(
		'bold' => true,
    	),
	    'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	    ),
       );
	  
	  $styleArraydline = array(
	        'font' => array(
    'underline' => PHPExcel_Style_Font::UNDERLINE_DOUBLE
	       ),
       );   
	  	    $this->objExcel->getActiveSheet()->getStyle('B1:F4')->applyFromArray($styleArray);
			$this->objExcel->getActiveSheet()->getStyle('B1:F4')->getFont()->setSize(15);
			$this->objExcel->getActiveSheet()->getStyle('B1:F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->objExcel->getActiveSheet()->mergeCells('B1:F1');
			$this->objExcel->getActiveSheet()->setCellValue('B1','COMPANYS SALES REPORT');
			
			$this->objExcel->getActiveSheet()->mergeCells('B2:F2');
			$this->objExcel->getActiveSheet()->setCellValue('B2','Company Name : '.$company);

			$this->objExcel->getActiveSheet()->mergeCells('B3:F3');
			$this->objExcel->getActiveSheet()->setCellValue('B3','Exported By : '.$person);

			$this->objExcel->getActiveSheet()->mergeCells('B4:C4');
			$this->objExcel->getActiveSheet()->setCellValue('B4','From : '.$from);

			$this->objExcel->getActiveSheet()->mergeCells('D4:F4');
			$this->objExcel->getActiveSheet()->setCellValue('D4','To : '.$to);

			
			////// setting coloumn withs 
			$this->objExcel->setActiveSheetIndex(0);
			$this->objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
			$this->objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
			$this->objExcel->getActiveSheet()->getColumnDimension('L')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
			$this->objExcel->getActiveSheet()->getColumnDimension('N')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('P')->setWidth(27);
			$this->objExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
			$this->objExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);


		  $this->objExcel->setActiveSheetIndex(0);
	  $this->objExcel->getActiveSheet()->getStyle('A5:R5')->applyFromArray($styleArray);
      $this->objExcel->getActiveSheet()->SetCellValue('A5', 'No.');
	  $this->objExcel->getActiveSheet()->SetCellValue('B5', 'Customer Name');
	  $this->objExcel->getActiveSheet()->SetCellValue('C5', 'Invoice Number');
	  $this->objExcel->getActiveSheet()->SetCellValue('D5', 'No. of Items');
	  $this->objExcel->getActiveSheet()->SetCellValue('E5', 'Date');
	  $this->objExcel->getActiveSheet()->SetCellValue('F5', 'Total Amount (GHS)');
	  $this->objExcel->getActiveSheet()->SetCellValue('G5', 'Amount Paid (GHS)');
	  $this->objExcel->getActiveSheet()->SetCellValue('H5', 'Change (GHS)');
	//   $this->objExcel->getActiveSheet()->SetCellValue('I4', 'Residential Address');
	//   $this->objExcel->getActiveSheet()->SetCellValue('J4', 'Occupation');
	//   $this->objExcel->getActiveSheet()->SetCellValue('K4', 'Nationality');
	//   $this->objExcel->getActiveSheet()->SetCellValue('L4', 'ID Type');
	//   $this->objExcel->getActiveSheet()->SetCellValue('M4', 'ID Number');
	//   $this->objExcel->getActiveSheet()->SetCellValue('N4', 'Ghana Post GPS');
	//   $this->objExcel->getActiveSheet()->SetCellValue('O4', 'Gender');
	//   $this->objExcel->getActiveSheet()->SetCellValue('P4', 'External Account');
	//   $this->objExcel->getActiveSheet()->SetCellValue('Q4', 'Employer');
	//   $this->objExcel->getActiveSheet()->SetCellValue('R4', 'Address');
	
	    $finaltot=0;	
	    $i = 6; //line number
		$b = 1; //column number
		// $cltcat = array('1'=>'Individual','2'=>'Commercial');
		// $tstatus = array('1'=>'Approved','2'=>'Fail','4'=>'Recall Approved','5'=>'Approved');
		// $month_array=array("01"=>"JANUARY","02"=>"FEBUARY","03"=>"MARCH","04"=>"APRIL","05"=>"MAY","06"=>"JUNE","07"=>"JULY","08"=>"AUGUST","09"=>"SEPTEMBER","10"=>"OCTOBER","11"=>"NOVEMBER","12"=>"DECEMBER");

	   if(is_array($data) && count($data) > 0){
	   foreach($data as $value){	
	// 	//    var_dump($value['RES_STAFFID']); die();		
            $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("0",$i,$b);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("1",$i,$value['SALE_CUSTOMERNAME']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("2",$i,$value['SALE_CODE']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("3",$i,$value['SALE_PRODUCTSTOTAL']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("4",$i,$value['SALE_DATEADDED']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("5",$i,$value['SALE_GRANDTOTAL']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("6",$i,$value['SALE_PAIDAMOUNT']);
			$this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("7",$i,$value['SALE_CHANGE']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("8",$i,$value['RES_RESIDENADDRESS']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("9",$i,$value['RES_OCCUPATION']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("10",$i,$value['RES_NATIONALITY']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("11",$i,$value['RES_IDTYPE']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("12",$i,$value['RES_IDNUMBER']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("13",$i,$value['RES_GHANAPOSTGPS']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("14",$i,$value['RES_GENDER']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("15",$i,$value['RES_EXTERNALADDRESS']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("16",$i,$value['RES_EMPLOYER']);
			// $this->objExcel->getActiveSheet()->SetCellValueByColumnAndRow("17",$i,$value['RES_ADDRESS']);
			
		$i++;
		$b++;	
		
	
	   }
	  
	    $styleArray = array( 'font'  => array('bold'  => true,'size'=> 20));
		
} 
$this->objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$this->objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

$this->PageMargins->setBottom(0.5);
$this->PageMargins->setTop(2.2);
$this->PageMargins->setLeft(0.2);
$this->PageMargins->setRight(0.2);

$this->objExcel->getActiveSheet()->setPageMargins($this->PageMargins);

     // worksheet name
     $this->objExcel->getActiveSheet()->setTitle('COMPANYS SALES REPORT'); 
	 
	//Output to client browser
	  	// Redirect output to a client's web browser (Excel2007)
	  
	  	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	  	header('Content-Disposition: attachment;filename="'."COMPANYS_SALES_REPORT".'.xls"');
	  	header('Cache-Control: max-age=0');
	  
	  	$objWriter = PHPExcel_IOFactory::createWriter($this->objExcel, 'Excel2007');
	  	$objWriter->save('php://output');
	  	exit;
	  }//End of all terminated data
	  
	 
  }
?>