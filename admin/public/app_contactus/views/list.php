
<?php //echo "LIST ";
$rs= $paging->paginate();
?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Contact Us</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Contact Us</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button type="submit" class="btn btn-success-rgba" onclick="$('#pg').val('app_contactus');$('#view').val('');$('#class_call').val('add');$('#keys').val('<?php echo ''; ?>');document.myform.submit();"><i class="feather icon-check-square"></i> &nbsp; Submit</button>
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
											<div class="col-md-3 showcase_text_area"><label
													for="driver_fname">Subject</label></div>
											<div class="col-md-9 showcase_content_area">
												<select class="form-control" style="width: 15em;" id="feed_subject" name="feed_subject">
													<option value="Defult">Select Subject</option>
													<option value="Customer Issue">Customer Issue</option>
													<option value="Order Issue">Order Issue</option>
													<option value="System Error">System Error</option>
													<option value="Other">Other</option>
												</select>
											</p>
											</div>
										</div>

										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area"><label
													for="feed_message">Message</label></div>
											<div class="col-md-9 showcase_content_area">
												<textarea class="form-control" name="feed_message" id="feed_message" cols="30" rows="5"></textarea>
											</div>
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


