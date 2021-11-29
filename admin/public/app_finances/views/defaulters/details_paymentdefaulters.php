


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Payment Defaulters</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Finances</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment Defaulters</a></li>
                    <li class="breadcrumb-item"><a href="#">Details</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-dark" onclick="$('#pg').val('app_finances');$('#view').val('paymentdefaulters');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
				&nbsp; &nbsp;

                <?php
                if($result['PRD_RIDERSTATUS'] == "1"){
                ?>

                    <button class="btn btn-danger-rgba" onclick="$('#pg').val('app_finances');$('#view').val('paymentdefaulters');$('#class_call').val('update_payriders');$('#keys').val('<?php echo $result['PRD_CODE']; ?>');document.myform.submit();"><i class="feather icon-user-x"></i> &nbsp; Block Rider</button>

                <?php
                }else if($result['PRD_RIDERSTATUS'] == "0"){
                ?>
                    
                    <button class="btn btn-info-rgba" onclick="$('#pg').val('app_finances');$('#view').val('paymentdefaulters');$('#class_call').val('update_payriders');$('#keys').val('<?php echo $result['PRD_CODE']; ?>');document.myform.submit();"><i class="feather icon-user-check"></i> &nbsp; Unblock Rider</button>

                <?php
                }
                ?>

				
                &nbsp; &nbsp;
				<button class="btn btn-success-rgba" onclick="$('#pg').val('app_finances');$('#view').val('paymentdefaulters');$('#class_call').val('update_payriders');$('#keys').val('<?php echo $result['PRD_CODE']; ?>');document.myform.submit();"><i class="feather icon-check-square"></i> &nbsp; Pay Rider</button>
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

						<!-- DRIVER'S PERSONAL INFORMATION  -->
						<div class="row" style="padding: 2em;">
						
							<div class="col-sm-12">
								<h4>Rider Payment Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_firstname">Rider's Name</label></div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_firstname" name="staff_firstname" value="<?php echo $result['PRM_RIDERNAME']; ?>">
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_homeaddress">ROAM's Share</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_homeaddress" name="staff_homeaddress" value="<?php echo $result['PRM_AMOUNTTOPAYROAM']; ?>">
									</div>							
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_email">Date Added</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_email" name="staff_email" value="<?php echo $result['PRM_DATEADDED']; ?>">
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_email">Date Paid</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_email" name="staff_email" value="<?php echo $result['PRM_DATEPAID']; ?>">
									</div>
								</div>

							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_firstname">Rider's Phone</label></div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_firstname" name="staff_firstname" value="<?php echo $result['PRM_RIDERPHONE']; ?>">
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_phone">Total Amount</label></div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_phone" name="staff_phone" value="<?php echo $result['PRM_AMOUNTTOTAL']; ?>">
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_lastname">Rider's Share<table></table></label></div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" readonly class="form-control" id="staff_lastname" name="staff_lastname" value="<?php echo $result['PRM_AMOUNTFORRIDER']; ?>">
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
