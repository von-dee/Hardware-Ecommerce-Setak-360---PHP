


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Riders</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_riders')?>">Riders</a></li>
					<li class="breadcrumb-item"><a href="#">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- <div class="col-md-4 col-lg-2">
            <div class="widgetbar">
				</div>                        
		</div> -->
		<div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				
				<button class="btn btn-dark" onclick="$('#pg').val('app_riders');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
				&nbsp; &nbsp;
				<button class="btn btn-success-rgba" onclick="$('#pg').val('app_riders');$('#view').val('add');$('#class_call').val('add');$('#keys').val('');document.myform.submit();"><i class="feather icon-check-square"></i> &nbsp; Submit</button>
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
								<h4>Rider's Personal Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="rider_name">First Name</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="rider_name" name="rider_firstname" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="rider_dateofbirth">Date of Birth</label></div>
									<div class="col-md-9 showcase_content_area"><input type="date"
											class="form-control" id="rider_dateofbirth" name="rider_dateofbirth" value=""></div>
								</div>
								
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="rider_phone">Phone Number</label></div>
									<div class="col-md-9 showcase_content_area"><input type="number"
											class="form-control" id="rider_phone" name="rider_phone" value=""></div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="license_type">License Type</label></div>
									<div class="col-md-9 showcase_content_area">
										<select class="form-control" id="license_type" name="license_type">
											<option value="Defult">Select License Type</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
										</select>
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="rider_licenseno">License Number</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="rider_licenseno" name="rider_licenseno" value=""></div>
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="rider_lastname">Last Name</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="rider_lastname" name="rider_lastname" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="rider_homeaddress">Home Address</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" class="form-control" id="rider_homeaddress" name="rider_homeaddress" value="">
									</div>							
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="rider_email">Email</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="email" class="form-control" id="rider_email" name="rider_email" value="">
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="rider_more_info">More Info</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<textarea class="form-control" name="rider_more_info" id="rider_more_info" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>


						<!-- RIDER'S BIKE ASSETS INFORMATION  -->
						<div class="row" style="padding: 2em;">
							
							<div class="col-sm-12">
								<h4>Rider's Bike Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="bike_brand">Bike Brand</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<select class="form-control" id="bike_brand" name="bike_brand">
											<option value="Defult">Select Bike Brand</option>
											<option value="Honda CGF 125">Honda CGF 125</option>
											<option value="Yamaha YBR125">Yamaha YBR125</option>
											<option value="Husqvarna Nuda 900">Husqvarna Nuda 900</option>
										</select>
									</div>
								</div>
								
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="bike_charses_number">Charses Number</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="bike_charses_number" name="bike_charses_number" value=""></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="bike_license_plate">License Plate Number</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<input type="text" class="form-control" id="bike_license_plate" name="bike_license_plate" value="">
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="bike_description">Description</label></div>
									<div class="col-md-9 showcase_content_area">
										<textarea class="form-control" name="bike_description" id="bike_description" cols="30" rows="4"></textarea>
									</div>
								</div>
								
							</div>
						</div>


						<!-- RIDER'S ASSESTS INFORMATION  -->
						<div class="row" style="padding: 2em;">
							
							<div class="col-sm-12">
								<h4>Rider's Bike Assets Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="assets_container_type">Container Type</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<select class="form-control" id="assets_container_type" name="assets_container_type">
											<option value="Defult">Select Container Type</option>
											<option value="A">Plastic</option>
											<option value="B">Box</option>
											<option value="C">Bag</option>
										</select>
									</div>
								</div>
								
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_container_code">Container Code</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="assets_container_code" name="assets_container_code" value=""></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_container_description">Description</label></div>
									<div class="col-md-9 showcase_content_area">
										<textarea class="form-control" name="assets_container_description" id="assets_container_description" cols="30" rows="4"></textarea>
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
