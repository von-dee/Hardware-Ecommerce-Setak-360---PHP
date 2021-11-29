


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Staff</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Staff</a></li>
					<li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-dark" onclick="$('#pg').val('app_staff');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
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
								<h4>Staff's Personal Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_name">First Name</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="staff_name" name="staff_name" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_dateofbirth">Date of Birth</label></div>
									<div class="col-md-9 showcase_content_area"><input type="date"
											class="form-control" id="staff_dateofbirth" name="staff_dateofbirth" value=""></div>
								</div>
								
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_phone">Phone Number</label></div>
									<div class="col-md-9 showcase_content_area"><input type="number"
											class="form-control" id="staff_phone" name="staff_phone" value=""></div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_email">User Type</label></div>
									<div class="col-md-9 showcase_content_area">
										<select class="form-control" id="feed_subject" name="feed_subject">
											<option value="Defult">Select User Type</option>
											<option value="A">Administrator</option>
											<option value="B">Office Worker</option>
										</select>
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_email">Salary</label></div>
									<div class="col-md-9 showcase_content_area"><input type="email"
											class="form-control" id="staff_email" name="staff_email" value=""></div>
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="staff_email">Last Name</label></div>
									<div class="col-md-9 showcase_content_area"><input type="email"
											class="form-control" id="staff_email" name="staff_email" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_homeaddress">Home Address</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" class="form-control" id="staff_homeaddress" name="staff_homeaddress" value="">
									</div>							
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_accountemail">Email</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="email" class="form-control" id="staff_accountemail" name="staff_accountemail" value="">
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="staff_info">More Info</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<textarea class="form-control" name="staff_info" id="staff_info" cols="30" rows="4"></textarea>
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
