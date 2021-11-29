<?php  

	$export_url = "./public/app_reports/excelreports/ex_expenses/filter.php";

	$payload = ['data'=>$result['data'], 'company'=>$result['company'], 'person'=>$session->get('loginuserfulname'), 'from'=>$result['from'], 'to'=>$result['to'], 'dateprinted'=>date('jS F Y')];

	$result_json = $engine->getDataEncrypt($payload);

?>



<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Completed Trips</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Reports</a></li>
					<li class="breadcrumb-item"><a href="#">Completed Trips</a></li>
					<li class="breadcrumb-item"><a href="#">Print</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <!-- <button class="btn btn-primary-rgba"><i class="feather icon-refresh-cw"></i> &nbsp; Refresh</button> -->
				<button class="btn btn-dark" onclick="$('#pg').val('app_riders');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->



<!-- Start Contentbar -->    
<div class="contentbar">

<?php

// var_dump($result); die();

?>
	
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-sm-6">
					<h6 class="m-0 font-weight-bold text-primary">Report Formats :</h6>
				</div>
				<div class="col-sm-6">

                    <a  href="javascript:PrintPage('dataTable_wrapper')"class="btn btn-primary btn-icon-split" style="float: right;">
						<span class="icon text-white-50">
							<i class="feather icon-printer"></i>
						</span>
						<span class="text">Print</span>
					</a>	

                    <a  href="javascript:<?php echo 'document.myform.action=\''.$export_url.'\'; $(\'#keys\').val(\''.$result_json.'\');  document.myform.submit();' ?>"class="btn btn-primary btn-icon-split" style="float: right; margin-right: 1em;">
						<span class="icon text-white-50">
							<i class="feather icon-file-text"></i>
						</span>
						<span class="text">Excel</span>
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div>

					<br>

					<div class="row">
						<div class="col-sm-12">
							<h4 style="text-align: center; font-weight: 800;border-bottom: 1px solid #dedede;padding-bottom: 0.5em;margin-bottom: 1em;">COMPANY'S COMPLETED TRIPS REPORT</h4>
						</div>

						<div class="col-sm-6">
							<p style="margin: 5px;">
								<b>Company Name</b> : <span> <?php echo $result['company']; ?> </span>
							</p>
							<p style="margin: 5px;">
								<b>Printed By</b> : <span> <?php echo $session->get('loginuserfulname'); ?> </span>
							</p>
							<p style="margin: 5px;">
								<b>Date Printed</b> : <span> <?php echo date("Y-m-d H:s:m" ); ?> </span>
							</p>
						</div>

						<div class="col-sm-6">
							<p style="margin: 5px;">
								<b>From</b> : <span> <?php echo $result['from']; ?> </span>
							</p>
							<p style="margin: 5px;">
								<b>To</b> : <span> <?php echo $result['to']; ?> </span>
							</p>
						</div>


					</div>

					<br>

                    <div class="row">
						<div class="col-sm-12">
							<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
								role="grid" aria-describedby="dataTable_info" style="width: 100%;">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending"
											aria-label="Name: activate to sort column descending"
											style="width: 40px;">#</th>
										<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending"
											aria-label="Name: activate to sort column descending"
											style="width: 150px;">Requestor Name</th>
										<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" 			colspan="1" aria-sort="ascending"
											aria-label="Name: activate to sort column descending"
											style="width: 170px;">Requestor's Phone</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Position: activate to sort column ascending"
											style="width: 130px;">Rider Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Office: activate to sort column ascending"
											style="width: 130px;">Rider's Phone</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Age: activate to sort column ascending"
											style="width: 100px;">Item Type</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Age: activate to sort column ascending"
											style="width: 100px;">Quantity</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Start date: activate to sort column ascending"
											style="width: 128.2px;">Origin (From)</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 150px;">Destination (To)</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 150px;">Pickup Date & Time</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 150px;">Total (GHC)</th>
									</tr>
								</thead>
								<tbody>
									<?php 	
										$x = 1;							
										foreach ($result['data'] as $val){
									?>

									<tr role="row" class="odd">
										<td class="sorting_1"><?php echo $x;?></td>
										<td><?php echo $val['REQ_REQUESTORNAME']; ?></td>
										<td><?php echo $val['REQ_REQUESTOR_PHONE']; ?></td>
										<td><?php echo $val['REQ_RIDERNAME']; ?></td>
										<td><?php echo $val['REQ_RIDERPHONE']; ?></td>
										<td><?php echo $val['REQ_ITEMS']; ?></td>
										<td><?php echo $val['REQ_TOTAL_ITEMS']; ?></td>
										<td><?php echo $val['REQ_LOCATION_FROM']; ?></td>
										<td><?php echo $val['REQ_LOCATION']; ?></td>
										<td><?php echo $val['REQ_PICKUP_DATE'] .' '.$val['REQ_PICKUP_TIME']; ?></td>
										<td><?php echo $val['REQ_TOTAL_AMOUNT']; ?></td>
									</tr>


									<?php
												$x= $x + 1;
											}


									?>

									
								</tbody>
								<!-- <tbody>
									<tr role="row" class="odd">
										<td class="sorting_1">Airi Satou</td>
										<td>Accountant</td>
										<td>Tokyo</td>
										<td>33</td>
										<td>2008/11/28</td>
										<td>162,700</td>
										<td>162,700</td>
										<td style="padding-left: 1px;"> 
											<div class="row">
												<div class="col-sm-12 col-md-8">
													<a  href="javascript:void(0);" onclick="$('#pg').val('app_products');$('#view').val('details');$('#class_call').val('details');$('#keys').val('<?php //echo ''; ?>');document.myform.submit();" class="btn btn-primary btn-icon-split" >
														<span class="icon text-white-50">
															<i class="fas fa-info-circle"></i>
														</span>
														<span class="text">Details</span>
													</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody> -->
							</table>
						</div>
					</div>

                    </div>
				</div>
			</div>
		</div>
	</div>

</div>