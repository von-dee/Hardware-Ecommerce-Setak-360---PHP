<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">History [:Transactions]</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">History</a></li>
					<li class="breadcrumb-item"><a href="#">Transaction</a></li>
					<li class="breadcrumb-item"><a href="#">Details</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
			<button class="btn btn-dark" onclick="$('#pg').val('app_history');$('#view').val('list_transactions');$('#class_call').val('list_transactions');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
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

			<div class="card m-b-30">
				<div class="card-body">

					<div class="row" style="padding: 2em;">
						
						<div class="col-sm-12">
							<h4>Transaction's Details</h4>
							<br>
						</div>


						<div class="col-sm-6">
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_name">Request Code</label></div>
								<div class="col-md-9 showcase_content_area"><input type="text"
										class="form-control" id="staff_name" name="staff_name" value="<?php echo $result['TRN_REQUEST_CODE']; ?>"></div>
							</div>
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_dateofbirth">Pick Up - From</label></div>
								<div class="col-md-9 showcase_content_area"><input type="text"
										class="form-control" id="staff_dateofbirth" name="staff_dateofbirth" value="<?php echo $result['TRN_REQUEST_FROM']; ?>"></div>
							</div>
							
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_phone">Rider's Name</label></div>
								<div class="col-md-9 showcase_content_area"><input type="text"
										class="form-control" id="staff_phone" name="staff_phone" value="<?php echo $result['TRN_RIDER_NAME']; ?>"></div>
							</div>

							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_email">Client's Name</label></div>
								<div class="col-md-9 showcase_content_area">
								<input type="text"
										class="form-control" id="staff_phone" name="staff_phone" value="<?php echo $result['TRN_CLIENT_NAME']; ?>">
								</div>
							</div>

							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_email">Payment Mode</label></div>
								<div class="col-md-9 showcase_content_area"><input type="email"
										class="form-control" id="staff_email" name="staff_email" value="<?php echo $result['TRN_PAYMENT_MODE']; ?>"></div>
							</div>

							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_email">Payment Date</label></div>
								<div class="col-md-9 showcase_content_area"><input type="email"
										class="form-control" id="staff_email" name="staff_email" value="<?php echo $result['TRN_DATEADDED']; ?>"></div>
							</div>
							
						</div>
						<div class="col-sm-6">
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area"><label
										for="staff_email">Request Date</label></div>
								<div class="col-md-9 showcase_content_area"><input type="email"
										class="form-control" id="staff_email" name="staff_email" value="<?php echo $result['TRN_REQUEST_DATE']; ?>"></div>
							</div>
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area">
									<label for="staff_homeaddress">Drop off - To</label>
								</div>
								<div class="col-md-9 showcase_content_area">
									<input type="text" class="form-control" id="staff_homeaddress" name="staff_homeaddress" value="<?php echo $result['TRN_REQUEST_TO']; ?>">
								</div>							
							</div>
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area">
									<label for="staff_accountemail">Rider's Phone</label>
								</div>
								<div class="col-md-9 showcase_content_area">
									<input type="email" class="form-control" id="staff_accountemail" name="staff_accountemail" value="<?php echo $result['TRN_RIDER_PHONE']; ?>">
								</div>
							</div>
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area">
									<label for="staff_info">Client's Phone</label>
								</div>
								<div class="col-md-9 showcase_content_area">
									<input type="email" class="form-control" id="staff_accountemail" name="staff_accountemail" value="<?php echo $result['TRN_CLIENT_PHONE']; ?>">
								</div>
							</div>
							<div class="form-group row showcase_row_area">
								<div class="col-md-3 showcase_text_area">
									<label for="staff_info">Amount Paid</label>
								</div>
								<div class="col-md-9 showcase_content_area">
									<input type="email" class="form-control" id="staff_accountemail" name="staff_accountemail" value="<?php echo $result['TRN_AMOUNT_PAID']; ?>">
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="card-footer">
				</div>
			</div>

		</div>
	</div>
</div>