
<?php //echo "LIST ";
$result = $paging;

?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Profile</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-success" onclick="$('#pg').val('app_profile');$('#view').val('');$('#class_call').val('update');$('#keys').val('');document.myform.submit();"> <i class="feather icon-plus-square"></i> &nbsp; Update </button>
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
									<div class="col-sm-2">
									</div>

									<div class="col-sm-2">
										<label for="">First Name <span>*</span></label>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="firstname" aria-describedby="emailHelp" name="firstname" value="<?php echo $result[0]['USR_FIRSTNAME']; ?>">
										</div>
									</div>

									<div class="col-sm-3">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2">
									</div>

									<div class="col-sm-2">
										<label for="">Last Name <span>*</span></label>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="lastname" aria-describedby="emailHelp" name="lastname" value="<?php echo $result[0]['USR_OTHERNAME']; ?>">
										</div>
									</div>

									<div class="col-sm-3">
									</div>
								</div>



								<div class="row">
									<div class="col-sm-2">
									</div>

									<div class="col-sm-2">
										<label for="">Phone Number <span>*</span></label>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="number" class="form-control form-control-user" id="phonenumber" name="phonenumber" value="<?php echo $result[0]['USR_PHONE']; ?>">
										</div>
									</div>

									<div class="col-sm-3">
									</div>
								</div>



								<div class="row">
									<div class="col-sm-2">
									</div>

									<div class="col-sm-2">
										<label for="">Email <span>*</span></label>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="email" name="email" value="<?php echo $result[0]['USR_EMAIL']; ?>">
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


