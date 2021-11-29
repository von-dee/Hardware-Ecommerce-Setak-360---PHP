
<?php //echo "LIST ";
$rs= $paging->paginate();
?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Store</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_store')?>">store</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba" onclick="$('#pg').val('app_store');$('#view').val('checkout');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> Checkout &nbsp; <i class="feather icon-shopping-cart"></i></button>
                
                <button class="btn btn-primary-rgba" onclick="$('#pg').val('app_store');$('#view').val('add');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> Add New &nbsp; <i class="feather icon-plus-square"></i></button>
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
        <div class="col-lg-4 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Categories</h5>
                        </div>
                        <div class="col-3">
                            <ul class="list-inline-group text-right mb-0 pl-0">
                                <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="all" checked="">
                        <label class="custom-control-label" for="all">All</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="accessories">
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
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Tags</h5>
                        </div>
                        <div class="col-3">
                            <ul class="list-inline-group text-right mb-0 pl-0">
                                <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="badge-list">
                        <a href="#" class="badge badge-seondary-inverse">New</a>
                        <a href="#" class="badge badge-seondary-inverse">Latest</a>
                        <a href="#" class="badge badge-seondary-inverse">Featured</a>
                        <a href="#" class="badge badge-seondary-inverse">Popular</a>
                        <a href="#" class="badge badge-seondary-inverse">Trending</a>
                        <a href="#" class="badge badge-seondary-inverse">Sale</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-8 col-xl-9">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Products</h5>
                </div>
                <div class="card-body">
                    <!-- Start row -->
                    <div class="row align-items-center ecommerce-sortby">
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-4">                                       
                            <select class="form-control" id="productSortBy">
                                <option>Price - Low to High</option>
                                <option>Price - High to Low</option>
                                <option>Newest</option>
                                <option>Popularity</option>
                                <option>Average Rating</option>
                            </select>
                        </div>
                        <!-- End col -->
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-8">
                            <div class="button-list">
                                <button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-grid"></i></button>
                                <button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-list"></i></button>
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
                                // var_dump($val); die();
                    ?>

                        <!-- Start col -->
                        <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="#"><img src="media/upload/<?php echo $val['PROD_PICTUREURL'] ?>" class="img-fluid" alt="product"></a>
                                        <p><span class="badge badge-primary font-14">New</span></p>
                                    </div>                                            
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">
                                                    <?php 
                                                    
                                                        if(!empty($val['PROD_CATEGORY_NAME'])){
                                                            echo $val['PROD_CATEGORY_NAME']; 
                                                        }else{
                                                            echo "General";
                                                        }
                                                    
                                                    ?>
                                                    
                                                    </span>
                                                </div>
                                                <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3"><?php echo $val['PROD_NAME'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">₵</sup><?php echo $val['PROD_SALESPRICE'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="submit" onclick="$('#pg').val('app_store');$('#view').val('edit');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();" class="btn btn-primary-rgba font-18"><i class="feather icon-edit"></i></button>
                                                    <button type="submit" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End col -->

                    <?php
                                $x= $x + 1;
                            }

                        }else{
                    ?>
                        <div class="col-lg-12 col-xl-12">
                            <p style="text-align: center;"><span class="badge badge-primary font-14">No Products Added</span></p>
                        </div>
                    <?php
                        }

                    ?>


                    </div>
                    <!-- Start row -->
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body ecommerce-pagination">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6">
                            <p>Showing 1 to 2 of 12 entries</p>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mb-0">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>


