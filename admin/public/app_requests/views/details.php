<style>
	.shipper_note_bold {
		text-transform: uppercase;
		font-size: 0.8em;
		color: #9e9e9e;
	}


	.shipper_note {
		font-size: 0.8em;
		color: #9e9e9e;
	}

	.det_title {
		margin-bottom: 0.5em;
		color: #2b2b2b;
	}

	.det_container {
		margin-top: 3em;
	}

	.note_marg_top {
		margin-top: 0.5em !important;
	}

	h6{
		font-size: 1.2em;
	}

	.wait_text{
		color: #cb9751;
	}

	.org_color{
		color: #009fff;
	}

	.back_btn_ {
        float: right;
        background: transparent;
        border: 1.5px solid #ed9d98;
        color: #ed9d98;
        padding: 0.1em 1.2em;
        border-radius: 5px;
    }
</style>


<?php 

// var_dump($result['CHKOUT_ITEMS']); die();


?>





<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Requests</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Requests</a></li>
					<li class="breadcrumb-item"><a href="#">Details</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
				<button class="btn btn-dark" onclick="$('#pg').val('app_riders');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
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
                    <div class="col-lg-7 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0">Order No : #<?php echo $result['CHKOUT_CODE']; ?></h5>
                                    </div>
                                    <div class="col-5 text-right">
                                        <span class="badge badge-success-inverse">Completed</span>                                             
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">                                
                                <div class="row mb-5">
                                    <div class="col-md-6 col-lg-6 col-xl-3">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Order Placed</h6>
                                        <p class="mb-0"><?php echo $result['CHKOUT_ORDERDATE']; ?> at <?php echo $result['CHKOUT_ORDERTIME']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-3">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Name</h6>
                                        <p class="mb-0"><?php echo $result['CHKOUT_NAME']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-3">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Contact No</h6>
                                        <p class="mb-0">+<?php echo $result['CHKOUT_PHONE']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-3">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Email ID</h6>
                                        <p class="mb-0"><?php echo $result['CHKOUT_EMAIL']; ?></p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6 ">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Delivery Address <a href="#" class="badge badge-primary-inverse">note</a></h6>
                                        <p><?php echo $result['CHKOUT_LOCATION']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6 ">
                                        <div class="order-primary-detail mb-4">
                                        <h6>Billing <a href="#" class="badge badge-primary-inverse">note</a></h6>
                                        <p>₵<?php echo $result['CHKOUT_ORDERTOTAL']; ?></p>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div> 
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Order Items</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>                                                
                                                <th scope="col">Photo</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th scope="col" class="text-right">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                            $rs = $result['CHKOUT_ITEMS'];
                                            $rs = json_decode($rs, true);
                                            
                                            foreach ($rs as $val){
                                                // var_dump($val); die();
                                                $total = $val['item_quantity'] * $val['item_price'];
                                        ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><img src="media/images/setak_cart/handbox.png" class="img-fluid" width="35" alt="product"></td>
                                                <td><?php echo $val['item_name'] ?></td>
                                                <td><?php echo "1" ?></td>
                                                <td>₵<?php echo $val['item_price'] ?></td>
                                                <td class="text-right">₵<?php echo $total; ?></td>
                                                <td>
                                                    <a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i>
                                                    </a>
                                                    <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row border-top pt-3">
                                    <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                                        <div class="order-note">
                                            <p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>
                                            <h6>Note :</h6>
                                            <p>Please, Pack with product air bag and handle with care.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                                        <div class="order-total table-responsive ">
                                            <table class="table table-borderless text-right">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td>₵<?php echo $result['CHKOUT_SUBTOTAL']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Cost :</td>
                                                        <td>₵<?php echo $result['CHKOUT_DELIVERYCOST']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax(18%) :</td>
                                                        <td>₵00.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-black f-w-7 font-18">Amount :</td>
                                                        <td class="text-black f-w-7 font-18">₵<?php echo $result['CHKOUT_ORDERTOTAL']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-plus mr-2"></i>Add Product</button>
                                <button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-repeat mr-2"></i>Refund</button>
                                <button type="button" class="btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>Cancel</button>
                            </div>
                        </div>

                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-5 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h5 class="card-title mb-0">Order Status</h5>
                                    </div>
                                    <div class="col-8">
                                        
                                    </div>
                                </div>                                
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <span>Current Status: </span>

                                        <?php if($result['CHKOUT_STATUS'] == "0"){ ?>
                                            </b> : Request Cancelled </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "1"){
                                        ?>
                                            </b> : Request Pending </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "2"){
                                        ?>
                                            </b> : Request Accepted </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "3"){
                                        ?>
                                            </b> : Request Intransit </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "4"){
                                        ?>
                                            </b> : Request At Destination </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "5"){
                                        ?>
                                            </b> : Request Completed </b>
                                        <?php
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <span>Next Status: </span>

                                        <?php if($result['CHKOUT_STATUS'] == "0"){ ?>
                                            </b> : Can't change state </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "1"){
                                        ?>
                                            </b> : Request Accepted </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "2"){
                                        ?>
                                            </b> : Request Intransit </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "3"){
                                        ?>
                                            </b> : Request At Destination </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "4"){
                                        ?>
                                            </b> : Request Completed </b>
                                        <?php
                                            }else if($result['CHKOUT_STATUS'] == "5"){
                                        ?>
                                            </b> : Request Completed </b>
                                        <?php
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Update Order Status</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
<!-- End Contentbar -->



