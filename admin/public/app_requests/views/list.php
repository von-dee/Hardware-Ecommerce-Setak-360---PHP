
<?php //echo "LIST ";
$rs= $paging->paginate();

?>


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Orders</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-refresh-cw"></i> &nbsp; Refresh</button>
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
        <div class="col-lg-6 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
            
                        <div class="col-sm-12 col-md-1">
                            <label>Show </label>
                        </div>
                        
                        <div class="col-sm-12 col-md-3">
                            <div>
                                <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
                                <?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
                                <input name="page" size="5" type="text" class="pagedisplay short pag_input" value="<?php echo $paging->renderNavNum();?>" readonly />
                                <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
                                <?php echo $paging->renderLast('<span class="fa fa-angle-double-right"></span>');?>
                                <?php $paging->limitList($list->limit,"myform");?>
                            </div>
                        </div>	

                        
                        <div class="col-sm-12 col-md-1">
                            <label>Search:</label>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <input type="search" class="form-control form-control-sm search_input" placeholder="" aria-controls="dataTable">
                        </div>

                        <div class="col-sm-12 col-md-1">
                        </div>	

                        <div class="col-sm-12 col-md-1">
                            <label style="float: right;">Sort:</label>
                        </div>

                        <div class="col-sm-12 col-md-2">
                            
                            <select class="form-control" id="search_subject" name="search_subject" onchange="$('#pg').val('app_requests');$('#view').val('');$('#class_call').val('');  document.getElementById('myform').submit();">
                                <option <?php if($search_subject == "all"){ echo "selected"; } ?> value="all">All Requests</option>
                                <option <?php if($search_subject == "new"){ echo "selected"; } ?> value="new">New</option>
                                <option <?php if($search_subject == "inprogress"){ echo "selected"; } ?> value="inprogress">In-progress</option>
                                <option <?php if($search_subject == "completed"){ echo "selected"; } ?> value="completed">Completed</option>
                                <option <?php if($search_subject == "cancelled"){ echo "selected"; } ?> value="cancelled">Cancelled</option>
                            </select>
                            
                        </div>
                                
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->


    <!-- Start row -->
    <div class="row">                  
       
                    <?php 

                        if($paging->total_rows > 0 ){

                            $page = (empty($page))? 1:$page;
                            $num = (isset($page))? ($list->limit*($page-1))+1:1;
                            
                            $x=1;

                            foreach ($rs as $val){
                                $data =  $engine->getDataEncrypt($val);
                                // var_dump($val); 
                                // die();
                    ?>
        
                    <?php
                        // if($val['SALE_STATUS'] == "0"){
                    ?>

                        <!-- Start col -->
                        <div class="col-lg-6 col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-3">
                                                    <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-shopping-cart"></i></span>
                                                </div>
                                                <div class="col-9 text-left">
                                                    <!-- <p style="margin-bottom: 0; padding-bottom: 0;">Order</p>
                                                    <hr style="margin: 5px; margin-left: 0px;"> -->
                                                    <div class="product-bar m-b-30">
                                                            <div class="product-head">
                                                                <a href="#"><img src="media/images/setak_cart/handbox.png" class="img-fluid" alt="product"></a>
                                                                <p><span class="badge badge-success font-14">25% off</span></p>
                                                            </div>     
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12 text-left">
                                                    <p style="margin-bottom: 0; padding-bottom: 0;">Client </p>
                                                    <hr style="margin: 5px; margin-left: 0px;">
                                                    <h6 class="card-title font-14"><?php echo $val['CHKOUT_NAME']; ?></h6>
                                                    <h6 class="card-title font-14"><i class="feather icon-phone-call"></i> <?php echo $val['CHKOUT_PHONE']; ?></h6>
                                                    <h6 class="card-title font-14"><i class="feather icon-mail"></i> <?php echo $val['CHKOUT_EMAIL']; ?> </h6>
                                                    <h6 class="card-title font-14"><i class="feather icon-map-pin"></i> <?php echo $val['CHKOUT_LOCATION']; ?> </h6>
                                                    <h6 class="card-title font-14"><i class="feather icon-calendar"></i> <?php echo $val['CHKOUT_ORDERDATE']; ?> <?php echo $val['CHKOUT_ORDERTIME']; ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12 text-left">
                                                        <p style="margin-bottom: 0; padding-bottom: 0;">Cart 
                                                                <span style="float: right;font-weight: bold;color: #54b32e;font-size: 1.4em;">₵<?php echo $val['CHKOUT_ORDERTOTAL']; ?></span>
                                                        </p>
                                                        <hr style="margin: 5px; margin-left: 0px;">
                                                        <h6 class="card-title font-14">Cart Items </h6>
                                                        
                                                        <?php
                                                            $rs = $val['CHKOUT_ITEMS'];
                                                            $rs = json_decode($rs, true);
                                                            $i = 1;
                                                            foreach ($rs as $val){
                                                                // var_dump($val); die();
                                                                $total = $val['item_quantity'] * $val['item_price'];

                                                                if($i <= 4){
                                                                    
                                                        ?>
                                                        
                                                            <h6 class="card-title font-14"><i class="feather icon-shopping-bag"></i><?php echo $val['item_name'] ?> at ₵<?php echo $total; ?></h6>
                
                                                        <?php                            
                                                                }

                                                                $i = $i + 1;
                                                            }
                                                        ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="font-13"> 
                                                <span class="badge badge-success">Status

                                                <?php if($val['CHKOUT_STATUS'] == "0"){ ?>
                                                    </span> : Request Cancelled </span>
                                                <?php
                                                    }else if($val['CHKOUT_STATUS'] == "1"){
                                                ?>
                                                    </span> : Request Pending </span>
                                                <?php
                                                    }else if($val['CHKOUT_STATUS'] == "2"){
                                                ?>
                                                    </span> : Request Accepted </span>
                                                <?php
                                                    }else if($val['CHKOUT_STATUS'] == "3"){
                                                ?>
                                                    </span> : Request Intransit </span>
                                                <?php
                                                    }else if($val['CHKOUT_STATUS'] == "4"){
                                                ?>
                                                    </span> : Request At Destination </span>
                                                <?php
                                                    }else if($val['CHKOUT_STATUS'] == "5"){
                                                ?>
                                                    </span> : Request Completed </span>
                                                <?php
                                                    } 
                                                ?>

                                                
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="submit" class="btn btn-primary-rgba" onclick="$('#pg').val('app_dashboard');$('#view').val('details');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();"> Details <i class="feather icon-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    
                    <?php
                                // $x= $x + 1;
                            }
                        }else{
                    ?>
                        <!-- Start col -->
                        <div class="col-lg-6 col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div style="text-align: center;">
                                        <b>No Data Found</b>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php
                        }
                    ?>

    </div>
    <!-- End row -->

</div>
<!-- End Contentbar -->



