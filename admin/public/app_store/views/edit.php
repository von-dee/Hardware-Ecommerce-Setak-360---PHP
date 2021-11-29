


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Edit Product</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_store')?>">Store</a></li>
					<li class="breadcrumb-item"><a href="#">Edit Product</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-dark" onclick="$('#pg').val('app_store');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
				&nbsp; &nbsp;
				<button class="btn btn-success-rgba" onclick="$('#pg').val('app_store');$('#view').val('');$('#class_call').val('update');$('#keys').val('<?php echo $result['PROD_CODE'] ?>');document.myform.submit();"><i class="feather icon-check-square"></i> &nbsp; Submit</button>
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
		<div class="col-lg-8 col-xl-9">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="card-title">Product Detail</h5>
				</div>
				<div class="card-body">
					<div>
						<div class="form-group row">
							<label for="productTitle" class="col-sm-12 col-form-label">Product Title</label>
							<div class="col-sm-12">
								<input type="text" class="form-control font-20"  name="productTitle" id="productTitle" placeholder="Title" value="<?php echo $result['PROD_NAME']; ?>">
							</div>
						</div>                                     
						<div class="form-group row">
							<label for="productTitle" class="col-sm-12 col-form-label">Cost Price</label>
							<div class="col-sm-12">
								<input type="number" class="form-control font-20" name="productCost" id="productCost" placeholder="₵00.00" value="<?php echo $result['PROD_PURCHASEPRICE']; ?>">
							</div>
						</div>      
						<div class="form-group row">
							<label for="productTitle" class="col-sm-12 col-form-label">Sales Price</label>
							<div class="col-sm-12">
								<input type="number" class="form-control font-20" name="productPrice" id="productPrice" placeholder="₵00.00" value="<?php echo $result['PROD_SALESPRICE']; ?>">
							</div>
						</div>      
						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Description</label>
							<div class="col-sm-12">
								<textarea class="form-control font-20" name="productDescription" placeholder="Description" id="productDescription" cols="30" rows="3"><?php echo $result['PROD_DESCRIPTION']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>               
		</div>
		<!-- End col -->
		<!-- Start col -->
		<div class="col-lg-4 col-xl-3">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="card-title">Product Image Gallery</h5>
				</div>
				<div class="card-body">
					<div class="d-inline-block mb-1">
						<div class="custom-file">
							<!-- <input type="file" class="custom-file-input" name="productImage" id="productImage" required>
							<label class="custom-file-label" for="productImage">Choose file...</label>
							<div class="invalid-feedback">Example invalid custom file feedback</div> -->
							
							<input type="hidden" id="productImageOld" name="productImageOld" value="<?php echo $result['PROD_PICTUREURL'] ?>">

							<img style="width: 80% !important;" src="media/upload/<?php echo $result['PROD_PICTUREURL'] ?>" class="img-fluid" alt="product">

							<input type="file" name="productImage" id="productImage">

						</div>
					</div>                            
				</div>
			</div>
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="card-title">Categories</h5>
				</div>
				<div class="card-body">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="accessories" checked="">
						<label class="custom-control-label" for="accessories">Accessories</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="computer">
						<label class="custom-control-label" for="computer">Computer</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="mobile">
						<label class="custom-control-label" for="mobile">Mobile</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="headphone">
						<label class="custom-control-label" for="headphone">Headphone</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="camera">
						<label class="custom-control-label" for="camera">Camera</label>
					</div>
				</div>
			</div>
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="card-title">Tags</h5>
				</div>
				<div class="card-body">
					<div class="product-tags">
						<span class="badge badge-secondary-inverse">New</span>
						<span class="badge badge-secondary-inverse">Latest</span>
						<span class="badge badge-secondary-inverse">Trending</span>
						<span class="badge badge-secondary-inverse">Popular</span>
						<span class="badge badge-secondary-inverse">Sale</span>
					</div>                                
				</div>
				<div class="card-footer">
					<div class="add-product-tags">
						<div>
							<div class="input-group">
								<input type="search" class="form-control" placeholder="Add Tags" aria-label="Search" aria-describedby="button-addonTags">
								<div class="input-group-append">
								<button class="input-group-text" type="submit" id="button-addonTags">Add</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- End col -->
	</div>
	<!-- End row -->
</div>



