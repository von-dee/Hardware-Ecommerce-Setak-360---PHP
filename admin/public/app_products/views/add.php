


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Assets</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_assetsmanagement')?>">Assets</a></li>
					<li class="breadcrumb-item"><a href="#">Add</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-dark" onclick="$('#pg').val('app_assetsmanagement');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
				&nbsp; &nbsp;
				<button class="btn btn-success-rgba" onclick="$('#pg').val('app_assetsmanagement');$('#view').val('add');$('#class_call').val('add');$('#keys').val('');document.myform.submit();"><i class="feather icon-check-square"></i> &nbsp; Submit</button>
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

						<!-- Assets'S PERSONAL INFORMATION  -->
						<div class="row" style="padding: 2em;">
						
							<div class="col-sm-12">
								<h4>Assets Information</h4>
								<br>
							</div>

							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_type">Assets Type</label></div>
									<div class="col-md-9 showcase_content_area">
										<select class="form-control" id="assets_type" name="assets_type">
											<option value="Defult">Select Asset Type</option>
											<option value="Carrier">Carrier</option>
											<option value="Bike">Bike</option>
											<option value="T-shirt">T-shirt</option>
											<option value="Hat">Hat</option>
										</select>
									</div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_purchasedate">Date of Purchase</label></div>
									<div class="col-md-9 showcase_content_area"><input type="date"
											class="form-control" id="assets_purchasedate" name="assets_purchasedate" value=""></div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_info">Asset Info</label></div>
									<div class="col-md-9 showcase_content_area"><input type="text"
											class="form-control" id="assets_info" name="assets_info" value=""></div>
								</div>

								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_quantity">Asset Quantity</label></div>
									<div class="col-md-9 showcase_content_area"><input type="number"
											class="form-control" id="assets_quantity" name="assets_quantity" value=""></div>
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_name">Asset Name</label></div>
									<div class="col-md-9 showcase_content_area"><input type="email"
											class="form-control" id="assets_name" name="assets_name" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area"><label
											for="assets_price">Asset Price</label></div>
									<div class="col-md-9 showcase_content_area"><input type="number"
											class="form-control" id="assets_price" name="assets_price" value=""></div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-3 showcase_text_area">
										<label for="assets_description">Assets Description</label>
									</div>
									<div class="col-md-9 showcase_content_area">
										<textarea class="form-control" name="assets_description" id="assets_description" cols="30" rows="4"></textarea>
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
