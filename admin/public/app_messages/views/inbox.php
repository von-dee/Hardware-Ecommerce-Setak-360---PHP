
<?php //echo "LIST ";
$rs= $result->paginate();
?>


<style>
a:visited {
    color: #f00;
}
</style>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Messages</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Messages</a></li>
                    <li class="breadcrumb-item"><a href="#">Inbox</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba" onclick="$('#pg').val('app_messages');$('#view').val('compose');$('#class_call').val('');$('#keys').val('');document.myform.submit();"> <i class="feather icon-edit"></i>  &nbsp; Compose Message </button>
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
        <?php include 'public/app_messages/views/sidemenu.php';?>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-9">
            <div class="email-rightbar">
                <div class="card m-b-30">
                    <div class="card-header">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="feather icon-square font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-download font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-alert-octagon font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-trash font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-clock font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-folder font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-tag font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-more-vertical- font-20"></i></a></li>
                            <li class="list-inline-item float-right"><a href="#"><i class="feather icon-settings font-20"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body">                                    
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">                                            
                                <tbody>

                                        <?php 

                                            if($result->total_rows > 0 ){

                                                $page = (empty($page))? 1:$page;
                                                $num = (isset($page))? ($list->limit*($page-1))+1:1;
                                                
                                                $x=1;

                                                foreach ($rs as $val){
                                                    $data =  $engine->getDataEncrypt($val);
                                                    // var_dump($val); die();
                                        ?>

                                        <tr class="
                                        <?php 
                                            if($val['MESG_STATUS'] == "1"){
                                                echo "email-unread";
                                            }
                                        ?>
                                        "  onclick="$('#pg').val('app_messages');$('#view').val('details');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();">                                                    
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="emailCheck1">
                                                    <label class="custom-control-label psn-abs" for="emailCheck1"></label>
                                                </div>
                                            </td>
                                            <td><i class="feather icon-star font-18"></i></td>
                                            <td><a href="#"><?php echo $val['MESG_SENDER_NAME']; ?></a></td>                             
                                            <td>
                                            <?php
                                            
                                                if($val['MESG_STATUS'] == "1"){
                                            ?>
                                                <span class="badge badge-success-inverse mr-2">New</span>
                                            <?php
                                                }else{
                                            ?>        
                                                <span class="badge badge-primary-inverse mr-2">Read</span>
                                            <?php
                                                }
                                            ?>
                                                <?php echo $val['MESG_SUBJECT']; ?>
                                                <p class="mt-1 mb-0 font-14"> <?php echo $val['MESG_BODY']; ?> </p></td>
                                            <td><?php echo $val['MESG_DATEADDED']; ?></td>
                                        </tr>

                                        
                                        <?php
                                                    $x= $x + 1;
                                                }

                                            }

                                        ?>

                                    


                                    <!-- <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck2">
                                                <label class="custom-control-label psn-abs" for="emailCheck2"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Google</a></td>                                 
                                        <td>Welcome to Google - Thank you for beign part of us <p class="mt-1 mb-0 font-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p></td>
                                        <td>08:20 AM</td>
                                    </tr> -->


                                    <!-- <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck3">
                                                <label class="custom-control-label psn-abs" for="emailCheck3"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Amazon</a></td>                                 
                                        <td>Register Now and Start Selling on Amazon.in</td>
                                        <td>Sep 05</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck4">
                                                <label class="custom-control-label psn-abs" for="emailCheck4"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Twitter</a></td>                                 
                                        <td>Welcome to Twitter - Thank you for beign part of us</td>
                                        <td>Sep 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck5">
                                                <label class="custom-control-label psn-abs" for="emailCheck5"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="#">Youtube</a></td>                                 
                                        <td><span class="badge badge-primary-inverse mr-2">Social</span> Welcome to Youtube - Thank you for beign part of us</td>
                                        <td>Sep 02</td>
                                    </tr>
                                    <tr>                                                    
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck6">
                                                <label class="custom-control-label psn-abs" for="emailCheck6"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">MaxBupa </a></td>                                 
                                        <td>Health Coverage upto 1 Crore.!</td>
                                        <td>Aug 26</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck7">
                                                <label class="custom-control-label psn-abs" for="emailCheck7"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">KredX </a></td>                                 
                                        <td>Introducing A Hassle-Free Working Capital Solution For Your Business</td>
                                        <td>Aug 09</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck8">
                                                <label class="custom-control-label psn-abs" for="emailCheck8"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="#">Swiggy</a></td>                                 
                                        <td>What’s Sunday without biryani? 😋</td>
                                        <td>July 22</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck9">
                                                <label class="custom-control-label psn-abs" for="emailCheck9"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Instant Approval</a></td>                                 
                                        <td><span class="badge badge-danger-inverse mr-2">Support</span> Need Quick Money? Get Loan up to 2 Lacs Today
                                            </td>
                                        <td>July 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck10">
                                                <label class="custom-control-label psn-abs" for="emailCheck10"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Pinterest </a></td>                                 
                                        <td>Save your ideas about Business Trip</td>
                                        <td>June 20</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 col-md-6 align-self-center">
                                <div class="email-show-label">
                                    <span> Show : 1 - 10 of 590</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 align-self-center">
                                <div class="email-pagination float-right">
                                    <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->                    
    </div>
    <!-- Start row -->
</div>
