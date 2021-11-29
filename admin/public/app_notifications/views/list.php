
<?php //echo "LIST ";
$rs= $paging->paginate();
?>

<style>
    


</style>


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Notifications</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_notifications')?>">Notifications</a></li>
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
                        
                        <div class="col-sm-12 col-md-2">
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

                        <div class="col-sm-12 col-md-2">
                        </div>	

                        <div class="col-sm-12 col-md-1">
                            <label style="float: right;">Sort:</label>
                        </div>

                        <div class="col-sm-12 col-md-2">
                            
                            <select class="form-control" id="feed_subject" name="feed_subject">
                                <option value="Defult">Select Subject</option>
                                <option value="Customer Issue">All</option>
                                <option value="Order Issue">Read</option>
                                <option value="System Error">Unread</option>
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
        ?>

            <!-- Start col -->
            <div class="col-lg-6 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-1">
                                        <span class="action-icon badge <?php echo $val['NOTI_TYPE']; ?> mr-0"><i class="<?php echo $val['NOTI_ICON']; ?>"></i></span>
                                    </div>
                                    




                                    <div class="col-11 text-left">
                                        <p style="margin-bottom: 0; padding-bottom: 0;"><?php echo $val['NOTI_TITLE']; ?></p>
                                        <hr style="margin: 5px; margin-left: 0px;">
                                        <h6 class="card-title font-14"><?php echo $val['NOTI_MESSAGE']; ?></h6>
                                        <span class="font-13"> <span class="badge badge-success"><?php echo $val['NOTI_DATE']; ?></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                
                            </div>
                            <div class="col-4 text-right">
                                <!-- <span class="badge badge-primary" style="width: 7em;height: 2.2em; padding-top: 0.6em;">Details <i class="feather icon-arrow-right"></i></span> -->
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
                           <b>No Notifications Found</b>
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



