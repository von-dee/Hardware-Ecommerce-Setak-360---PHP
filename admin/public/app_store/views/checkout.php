<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Checkout</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $nav->navigate('app_store')?>">Checkout</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-dark"
                    onclick="$('#pg').val('app_store');$('#view').val('');$('#class_call').val('');$('#keys').val('');document.myform.submit();">
                    <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
                &nbsp; &nbsp;
                <button class="btn btn-success-rgba"
                    onclick="$('#pg').val('app_store');$('#view').val('add');$('#class_call').val('add');$('#keys').val('');document.myform.submit();"><i
                        class="feather icon-check-square"></i> &nbsp; Submit</button>
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
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Steps Checkout</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-10 col-xl-10">
                            <div id="basic-form-wizard">
                                <div>
                                    <h3>Cart Items</h3>
                                    <section>
                                        <h4 class="text-center font-22 mb-5">Cart Items</h4>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="cart-container">
                                                    <div class="cart-head">
                                                        <div class="table-responsive">
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
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td><img src="media/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                                                        <td>Apple iPhone</td>
                                                                        <td>
                                                                            <div class="form-group mb-0">
                                                                                <input type="number" class="form-control cart-qty" name="cartQty2" id="cartQty2" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>$20</td>
                                                                        <td class="text-right">$200</td>
                                                                        <td><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="cart-body">
                                                        <div class="row">
                                                            <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                                                <div class="order-note">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <input type="search" class="form-control" placeholder="Coupon Code" aria-label="Search" aria-describedby="button-addonTags">
                                                                                <div class="input-group-append">
                                                                                    <button class="input-group-text" type="submit" id="button-addonTags">Apply</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="specialNotes">Special Note for this order:</label>
                                                                            <textarea class="form-control" name="specialNotes" id="specialNotes" rows="3" placeholder="Message here"></textarea>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                                <div class="order-total table-responsive ">
                                                                    <table class="table table-borderless text-right">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Sub Total :</td>
                                                                                <td>$1000.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Shipping :</td>
                                                                                <td>$0.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tax(18%) :</td>
                                                                                <td>$180.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="f-w-7 font-18"><h4>Amount :</h4></td>
                                                                                <td class="f-w-7 font-18"><h4>$1180.00</h4></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </section>
                                    <h3>Billing</h3>
                                    <section>
                                        <h4 class="text-center font-22 mb-5">Billing Address</h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="billingFirstName">First Name</label>
                                                <input type="text" class="form-control" id="billingFirstName">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="billingLastName">Last Name</label>
                                                    <input type="text" class="form-control" id="billingLastName">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="billingFirstName">Phone Number</label>
                                                <input type="text" class="form-control" id="billingFirstName">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="billingLastName">E-mail</label>
                                                    <input type="text" class="form-control" id="billingLastName">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="billingAddress">DeliveryAddress</label>
                                                <!-- <input type="text" class="form-control" id="billingAddress"> -->
                                                <input class="form-control" style="margin-bottom: 0px !important;" id="location_fromname" name="location_fromname" placeholder="eg. Accra" onkeyup="geocodeAddress('location_fromname', 'location_fromid', this.value)"> <br>
                                                <span id="location_from_msg" class="location_msg">Location Not Known</span>
                                                <input type="hidden" id="location_fromid" name="location_fromid" value="">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="shippingCheck">
                                                    <label class="custom-control-label" for="shippingCheck">Shipping Address is same as above</label>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>Pay</h3>
                                    <section>
                                        <h4 class="text-center font-22 mb-5">Make Payment</h4>
                                        <ul class="nav nav-pills justify-content-center custom-tab-button mb-3" id="pills-tab-button" role="tablist">
                                            <li class="nav-item mr-0">
                                                <a class="nav-link border active" id="pills-cash-tab-button" data-toggle="pill" href="#pills-cash-button" role="tab" aria-controls="pills-cash-button" aria-selected="false"><span class="tab-btn-icon"><i class="mdi mdi-cash-multiple"></i></span>Cash</a>
                                            </li>
                                            <li class="nav-item mr-0">
                                                <a class="nav-link border" id="pills-paypal-tab-button" data-toggle="pill" href="#pills-paypal-button" role="tab" aria-controls="pills-paypal-button" aria-selected="false"><span class="tab-btn-icon"><i class="mdi mdi-cellphone-android"></i></span>Mobile Money</a>
                                            </li>
                                            <li class="nav-item mr-1">
                                                <a class="nav-link border" id="pills-card-tab-button" data-toggle="pill" href="#pills-card-button" role="tab" aria-controls="pills-card-button" aria-selected="true"><span class="tab-btn-icon"><i class="feather icon-credit-card"></i></span>Card</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent-button">
                                            
                                            <div class="tab-pane fade show active" id="pills-cash-button" role="tabpanel" aria-labelledby="pills-cash-tab-button">
                                                <button type="button" class="btn btn-primary btn-lg btn-block py-2 mt-5 font-18">Pay via Cash</button>
                                            </div>
                                            <div class="tab-pane fade" id="pills-paypal-button" role="tabpanel" aria-labelledby="pills-paypal-tab-button">
                                                <div class="card-form">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="cardnumber">Network</label>
                                                            <select class="form-control" id="sel1">
                                                                <option>MTN</option>
                                                                <option>Vodafone</option>
                                                                <option>AirtelTigo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="cardfullname">Momo Number</label>
                                                            <input type="text" class="form-control" name="cardfullname" id="cardfullname">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary btn-lg btn-block py-2 font-18">Pay Now</button>
                                                    </div>
                                                </div>                                                            
                                            </div>
                                            <div class="tab-pane fade" id="pills-card-button" role="tabpanel" aria-labelledby="pills-card-tab-button">
                                                <div class='card-wrapper'></div>
                                                <div class="card-form">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="cardnumber">Card Number</label>
                                                            <input type="text" class="form-control" name="cardnumber" id="cardnumber">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="cardfullname">Full Name</label>
                                                            <input type="text" class="form-control" name="cardfullname" id="cardfullname">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="cardexpiry">Expiry Date</label>
                                                            <input type="text" class="form-control" name="cardexpiry" id="cardexpiry">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="cardcvc">CVC</label>
                                                            <input type="text" class="form-control" name="cardcvc" id="cardcvc">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary btn-lg btn-block py-2 font-18">Pay Now</button>
                                                    </div>
                                                </div>                                                            
                                            </div>
                                        </div>
                                    </section>
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
<!-- End Contentbar -->


<!-- Start js -->        
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALAxH03G0Wzl7nM4hc3Or_pAllfxtddD0&libraries=places&callback=initAutocomplete"
         async defer></script>

  <script>


    //////////////////////////// START OF GOOGLE CODES ///////////////////////////////////////// 
    function initAutocomplete() {
        ////////////// FREIGHT REQUEST MAP ///////////
        
        // document.getElementById("location_to_msg").style.display = "none";

        //---------- To Request
        var input = document.getElementById('locationname');
        var searchBox_to = new google.maps.places.SearchBox(input);
    
        searchBox_to.addListener('places_changed', function() {
            var address = document.getElementById('locationname').value;
            console.log(address);

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': address}, function(results, status) {
            
                if (status === 'OK') {
                    var loc_code = results[0].place_id;
                    document.getElementById('locationid').value = loc_code;
                } else {
                    document.getElementById("location_to_msg").style.display = "block";
                    document.getElementById('locationid').value = "";
                }
            });

        });


        if(document.getElementById('location_fromname') !=null){
            
            document.getElementById("location_from_msg").style.display = "none";
            
            //----------- From Request
            var input = document.getElementById('location_fromname');
            var searchBox_from = new google.maps.places.SearchBox(input);
        
            searchBox_from.addListener('places_changed', function() {
                var address = document.getElementById('location_fromname').value;
                console.log(address);

                var geocoder = new google.maps.Geocoder();

                geocoder.geocode({'address': address}, function(results, status) {
                
                    if (status === 'OK') {
                        var loc_code = results[0].place_id;
                        document.getElementById('location_fromid').value = loc_code;
                    } else {
                        document.getElementById("location_from_msg").style.display = "block";
                        document.getElementById('location_fromid').value = "";
                    }
                
                });

            });
        }

      }


      function geocodeAddress(main_input, hidden_input, address) {

        if(document.getElementById('location_fromname') !=null){
            document.getElementById("location_from_msg").style.display = "none";
        }
        // document.getElementById("location_to_msg").style.display = "none";

        var address = document.getElementById(main_input).value;
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': address}, function(results, status) {
        
            if (status === 'OK') {
                var loc_code = results[0].place_id;
                document.getElementById(hidden_input).value = loc_code;
            } else {
                if(main_input == "location_fromname"){
                    document.getElementById("location_from_msg").style.display = "block";
                }else if(main_input == "locationname"){
                    document.getElementById("location_to_msg").style.display = "block";
                }
                document.getElementById(hidden_input).value = "";
            }
        
        });

      }
    //////////////////////////// END OF GOOGLE CODES ///////////////////////////////////////// 



  </script>