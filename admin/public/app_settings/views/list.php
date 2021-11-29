
<?php //echo "LIST ";
$rs= $paging->paginate();
?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Settings</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-success" onclick="$('#pg').val('app_staff');$('#view').val('add');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-plus-square"></i> &nbsp; Submit </button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->


<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
						<div class="table-responsive">
							<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4" style="padding: 2em;">
								<div class="row">
									<div class="col-sm-3">
									</div>

									<div class="col-sm-6">
										<div class="form-group row showcase_row_area">
											<div class="col-md-12 showcase_text_area">
												<h5 for="driver_fname">Company Details</h5>
											</div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_name">Company Name</label></div>
											<div class="col-md-9 showcase_content_area"><input type="text"
													class="form-control" id="company_name" name="company_name" value="<?php //echo $result->COMP_NAME; ?>"></div>
										</div>
										
										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_phone">Company Phone</label></div>
											<div class="col-md-9 showcase_content_area"><input type="number"
													class="form-control" id="company_phone" name="company_phone" value="<?php //echo $result->COMP_PHONE; ?>"></div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_email">Company Email</label></div>
											<div class="col-md-9 showcase_content_area"><input type="email"
													class="form-control" id="company_email" name="company_email" value="<?php //echo $result->COMP_EMAIL; ?>"></div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_website">Company Website</label></div>
											<div class="col-md-9 showcase_content_area"><input type="text"
													class="form-control" id="company_website" name="company_website" value="<?php //echo $result->COMP_WEBSITE; ?>"></div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_city">Company Location</label></div>
											<div class="col-md-9 showcase_content_area"><input type="text"
													class="form-control" id="company_city" name="company_city" value="<?php //echo $result->COMP_LOCATION; ?>"></div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="company_address">Company Address</label></div>
											<div class="col-md-9 showcase_content_area"><input type="text"
													class="form-control" id="company_address" name="company_address" value="<?php //echo $result->COMP_ADDRESS; ?>"></div>
										</div>
									</div>
									
									<div class="col-sm-3">
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
				<!-- End col -->
			</div>
		</div>
	</div>
</div>


