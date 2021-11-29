<?php  

	$export_url = "./public/app_reports/excelreports/ex_Riders/filter.php";

	$payload = ['data'=>$result['data'], 'company'=>$result['company'], 'person'=>$session->get('loginuserfulname'), 'from'=>$result['from'], 'to'=>$result['to'], 'dateprinted'=>date('jS F Y')];

	$result_json = $engine->getDataEncrypt($payload);

?>



<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Riders</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Reports</a></li>
					<li class="breadcrumb-item"><a href="#">Riders</a></li>
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
							<h4 style="text-align: center; font-weight: 800;border-bottom: 1px solid #dedede;padding-bottom: 0.5em;margin-bottom: 1em;">COMPANY'S RIDERS REPORT</h4>
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
											style="width: 190.6px;">Full Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Position: activate to sort column ascending"
											style="width: 130px;">Date of Birth</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Office: activate to sort column ascending"
											style="width: 130px;">Home Address</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Age: activate to sort column ascending"
											style="width: 100px;">Phone Number</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 118px;">Email</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 118px;">Bike Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 118px;">Bike Number Plate</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
											colspan="1" aria-label="Salary: activate to sort column ascending"
											style="width: 150px;">Date Added</th>
									</tr>
								</thead>
								<tbody>
									<?php 	
										$x = 1;	
										foreach ($result['data'] as $val){
											$data =  $engine->getDataEncrypt($val);
											// var_dump($val); die();
									?>

									<tr role="row" class="odd">
										<td class="sorting_1"><?php echo $x;?></td>
										<td><?php echo $val['RDR_FIRSTNAME'].' '.$val['RDR_LASTNAME']; ?></td>
										<td><?php echo $val['RDR_DATEOFBIRTH']; ?></td>
										<td><?php echo $val['RDR_HOMEADDRESS']; ?></td>
										<td><?php echo $val['RDR_PHONE']; ?></td>
										<td><?php echo $val['RDR_EMAIL']; ?></td>
										<td><?php echo $val['RDR_BIKE_NAME']; ?></td>
										<td><?php echo $val['RDR_BIKE_NUMBERPLATE']; ?></td>
										<td><?php echo $val['RDR_DATEADDED']; ?></td>
									</tr>


									<?php
												$x= $x + 1;
											}


									?>

									
								</tbody>
								
							</table>
						</div>
					</div>

                    </div>
				</div>
			</div>
		</div>
	</div>

</div>