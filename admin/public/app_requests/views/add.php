
<?php //echo "LIST ";
$rs= $paging->paginate();
?>



<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 100;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        margin-top: 10em;
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


    .icon_car {
        height: 3em;
        margin-right: 2em;
    }

    .text_car {
        font-size: 1.2em;
        margin-left: 1.1em;
    }

    .list_item {
        border-bottom: 1.5px solid #eaeaea;
    }

    .radio_style {
        height: 1em;
        width: 1em;
        display: inline;
    }



    ///?///////////////// tabs //////////////////
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        display: none;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

    .back_btn {
        background: transparent;
        border: none;
        color: red;
        border: 1px solid red;
        padding: 0em 1em;
        border-radius: 3px;
    }

    .width_input {
        border: none;
        border-bottom: 3px solid #ebebeb;
        width: 10em;
    }

    .text_area {
        height: 50px;
        width: 30em;
        border: none;
        border-bottom: 1px solid #333;
    }

    .cont_container {
        text-align: center;
    }

    .cont_text {
        font-size: 1em;
        background: transparent;
        border: 1px solid #333;
        margin-top: 1em;
        padding: 0.5em 2em;
    }


    .sum_text {
        font-weight: 600;
    }








    /* //////////////////////////// CUSTOM ////////////////////////////////// */

    /* Style the form */
    #regForm {
        background-color: #ffffff;
        /* margin: 100px auto; */
        padding: 10px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */
    input {
        padding: 10px;
        padding-top: 0;
        width: 100%;
        font-size: 15px;
        border: 1px solid #aaaaaa;
        border: none;
        border-bottom: 1px solid #333;
        width: 20em;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .input_style {
        border: none;
        border-bottom: 1px solid #333;
        width: 20em;
    }

    .lab_text {
        margin-top: 2em;
        margin-bottom: 0.5em;
    }

    .nextbtn {
        background: white;
        border: 1px solid #333 !important;
        border-radius: 5px;
        padding: 0em 2em !important;
        margin-top: 1em;
        font-weight: 600;
    }

    .table_content {
        margin-top: 0em;
    }


    .item_select_h {
        margin-top: 1em;
    }

    .dest_color {
        color: #696ffb;
    }

    .location_msg{
        display: none;
        padding-left: 0.8em;
        color: #e27e7e;
        font-size: 0.8em;
    }
</style>


<input type="hidden" name="add_type" id="add_type" value="add_freight">


<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Create Requests</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Requests</a></li>
					<li class="breadcrumb-item"><a href="#">New</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-success-rgba"><i class="feather icon-check-square"></i> &nbsp; Submit</button>
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
                    
                

                <div id="regForm" action="">

                            <div class="tab">
                                <h5>Where are you moving the package</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="lab_text" for=""><i class="mdi mdi-arrow-up-bold-hexagon-outline"></i> Pickup (from)
                                        </label>
                                        <p>
                                            <input class="input_style" id="location_fromname" name="location_fromname" placeholder="eg. Accra" onkeyup="geocodeAddress('location_fromname', 'location_fromid', this.value)"
                                                oninput="this.className = ''"> <br>
                                            <span id="location_from_msg" class="location_msg">Location Not Known</span>
                                        </p>
                                        <input type="hidden" id="location_fromid" name="location_fromid" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="lab_text" for=""><i class="mdi mdi-arrow-down-bold-hexagon-outline dest_color"></i>
                                            Destination (to)</label>
                                        <p>
                                            <input class="input_style" id="locationname" name="locationname"  placeholder="eg. Kumasi" onkeyup="geocodeAddress('locationname', 'locationid', this.value)"
                                                oninput="this.className = ''">
                                            <span id="location_to_msg"  class="location_msg">Location Not Known</span>
                                        </p>
                                        <input type="hidden" id="locationid" name="locationid" value="">
                                    </div>
                                </div>
                                
                                <br><br>
                                
                                

                            </div>
                            

                            <div class="tab">
                                <h5>What item are you moving?</h5>

                                <div>
                                    <b>Select Item Type</b>
                                </div>
                                <div class="cc-selector-2">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <input class="img_selector" id="document" type="radio" name="itemtype" value="Documents" />
                                            <label class="drinkcard-cc visa" for="document"></label>
                                        </div>
                                        <div class="col-lg-2">
                                            <input class="img_selector" id="parcel" type="radio" name="itemtype" value="Parcel" />
                                            <label class="drinkcard-cc mastercard"for="parcel"></label>
                                        </div>
                                        <div class="col-lg-2">
                                            <input class="img_selector" id="both" type="radio" name="itemtype" value="Both Document and Parcel" />
                                            <label class="drinkcard-cc bothtypesimg"for="both"></label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label class="lab_text" for=""> 
                                        <b>Number of Items</b>
                                    </label>
                                    <p>
                                        <input type="number" id="itemquantity" name="itemquantity" placeholder="eg. 2" > 
                                        <input type="hidden" id="totalamount" name="totalamount"  value="10.00"> 
                                    </p>
                                </div>


                            </div>




                            <div class="tab">
                                <h5>What are the customer's Details?</h5>

                                <div class="col-lg-6">
                                    <label class="lab_text" for=""> 
                                        <b>Customer's Fullname</b>
                                    </label>
                                    <p>
                                        <input type="text" id="requestorname" name="requestorname" placeholder="eg. Vondee Selasie" > 
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <label class="lab_text" for=""> 
                                        <b>Customer's Phone Number</b>
                                    </label>
                                    <p>
                                        <input type="text" id="requestorphone" name="requestorphone" placeholder="eg. 233555883284" > 
                                    </p>
                                </div>


                            </div>


                            <div class="tab">

                                    <h5>Set pickup Date, Time and Description?</h5>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-calendar"></i> Date</p>
                                                <input type="date" name="pickupdate" id="pickupdate" value="" />
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-clock-fast"></i> Time</p>
                                                <input type="text" name="pickuptime" id="pickuptime" value="" class="timepicker" />
                                            </div>
                                        </div>                                    
                                    </div>

                                    <br>

                                    <div>
                                        <p class="title_p" style="margin-top: 5px;">Description</p>
                                        <textarea class="text_area" name="description" id="description" cols="300" rows="2"></textarea>
                                    </div>

                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;margin-right: 4.4em;">
                                    <button class="nextbtn" type="button" id="prevBtn"
                                        onclick="nextPrev(-1)">Previous</button>
                                    <button class="nextbtn" type="button" id="nextBtn"
                                        onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
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




<!-- //////////////////////////////////////////////////////// MODAL ITEMS //////////////////////////////////////////////////////////////////////// -->


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div>
            <span class="close">&times;</span>
        </div>

        <div>
            <div class="row">
                <div class="col-lg-4">
                    <h1> Select Item </h1>
                </div>
                <div class="col-lg-6">
                    <input class="search" type="text" name="" placeholder="Search Item">
                </div>
            </div>
        </div>

        <div>
            <!-- Tab links -->
            <div  style="display: none;">
                <button type="button" class="tablinks" onclick="openCity(event, 'List')">List</button>
                <button type="button" class="tablinks" onclick="openCity(event, 'Details')">Details</button>
            </div>

            <!-- Tab content -->
            <div id="List" class="tabcontent">
            </div>


            <div id="Details" class="tabcontent">

                <div>
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="back_btn"> <span onclick="openCity(event, 'List')"> &larr; Back</span>
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <h4 id="selected_item_show"> Cement</h4>
                        </div>
                    </div>
                    <input type="hidden" name="serv_code" id="serv_code">
                    <input type="hidden" name="serv_name" id="serv_name">
                </div>


                <h6 class="item_select_h">Number of Items</h6>
                <input class="input_style" type="text" name="serv_quantity" id="serv_quantity">

                <h6 class="item_select_h">Item Size</h6>
                <div class="form-flex">
                    <input class="width_input" type="text" name="serv_lenght" id="serv_lenght" placeholder="Len">
                    <input class="width_input" type="text" name="serv_breadth" id="serv_breadth" placeholder="Bre">
                    <input class="width_input" type="text" name="serv_height" id="serv_height" placeholder="Hei">
                </div>


                <h6 class="item_select_h">Item weight</h6>
                <input class="radio_style" type="radio" id="X" name="serv_weight" value="0Kg - 200Kg">
                <label class="label_style_" for="X">0Kg - 200Kg</label>
                <input class="radio_style" type="radio" id="Y" name="serv_weight" value="201Kg - 300Kg">
                <label class="label_style_" for="Y">201Kg - 300Kg</label>
                <input class="radio_style" type="radio" id="Z" name="serv_weight" value="Over 301Kg">
                <label class="label_style_" for="Z">Over 301Kg</label>

                <h6 class="item_select_h">Note</h6>
                <textarea class="text_area" name="serv_note" id="serv_note" cols="10" rows="5"></textarea>

                <div class="cont_container">
                    <button type="button" class="cont_text" onclick="addservlist()"> Continue </button>
                </div>
            </div>



        </div>

    </div>
</div>





<!-- //////////////////////////////////////////////////////// MODAL TRUCKS //////////////////////////////////////////////////////////////////////// -->

<!-- The Modal -->
<div id="myModaltruck" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <div>
            <span class="close">&times;</span>
        </div>

        <div>
            <div class="row">
                <div class="col-lg-4">
                    <h1> Car Type </h1>
                </div>
                <div class="col-lg-6">
                    <input class="search" type="text" name="" placeholder="Search Car">
                </div>
            </div>
        </div>

        <div id="trucklist">

        </div>
    </div>

</div>





