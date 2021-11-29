<script>
    
    function delete_func(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                document.myform.submit();
            }
        })
    }


    

    $(document).ready(function () {

        if ($("#div_print")) {
            $("#div_print").click(function () {
                // window.print_out.print();

                var mywindow = window.open('', 'PRINT', 'height=768,width=1024');
                var elem = "print_area";

                mywindow.document.write('<html><head><link href="media/css/bootstrap.css" rel="stylesheet"><link href="public/thirdpartyded/scripts/print.css" rel="stylesheet">');
                mywindow.document.write('</head><body >');
                mywindow.document.write(document.getElementById(elem).innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();

                return true;
            });
        }


        function search_subject() {

            console.log("Harrietsa");
            // $('#pg').val('app_requests');
            // $('#view').val('list');
            // $('#class_call').val('list');    

            // document.getElementById("myform").submit();
        }


        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                
                $('#pg').val('appshipments');
                
                
                var add_type = document.getElementById("add_type").value;

            
                $('#view').val('add');
                $('#class_call').val('add');    

                // if(add_type == "add_construction"){
                //     $('#view').val('add_construction');
                //     $('#class_call').val('add_construction');    
                // }else if(add_type == "add_freight"){
                //     $('#view').val('add_freight');
                //     $('#class_call').val('add_freight');    
                // }
                
                document.getElementById("myform").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }



        $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '12:00am',
        maxTime: '11:00pm',
        defaultTime: '9',
        startTime: '01:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });


        //////////////////////////// PORTAL'S CODES ///////////////////////////////////////// 
        getItems();
        getTrucks();
        getHeavyTrucks();
            
    });




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



    //////////////////////////// PORTAL'S CODES START ///////////////////////////////////////// 

    var selected_items = [];
    var selected_trucks = [];
    var totalitems = 0;
    var totalamount = 0;

    function getItems() {
        

        if(document.getElementById('List') !=null){

            document.getElementById("List").style.display = "block";

            var data_parsed = {
                            actions: 'fetchservices'
                        }

            var response = apiPost(data_parsed);
            response.then(function(data) {
                if (data.data) {
                    console.log("My Data");
                    console.log(data);
                    $.each(data.data, function(index, value){
                        $("#List").append('<div class="list_item" onclick="openCity(event, \'Details\',\''+ value.SERV_CODE +'\',\''+ value.SERV_NAME +'\')"><span class="text_car">' + value.SERV_NAME + '</span></div>');
                        
                    });
                } else {
                    alert("No show");
                }
            })

        }

    }


    function addservlist(){

        var obj = {
            serv_code: document.getElementById("serv_code").value,
            serv_name: document.getElementById("serv_name").value,
            serv_quantity: document.getElementById("serv_quantity").value,
            serv_lenght: document.getElementById("serv_lenght").value,
            serv_breadth: document.getElementById("serv_breadth").value,
            serv_height: document.getElementById("serv_height").value,
            serv_weight: $("input[name=serv_weight]").val(),
            serv_note: document.getElementById("serv_note").value
        } 

        selected_items.push(obj);
        
        console.log(selected_items);

        document.getElementById("serv_code").value = "";
        document.getElementById("serv_name").value = "";
        document.getElementById("serv_quantity").value = "";
        document.getElementById("serv_lenght").value = "";
        document.getElementById("serv_breadth").value = "";
        document.getElementById("serv_height").value = "";
        document.getElementById("serv_note").value = "";

        $("#tditems").empty();

        $.each(selected_items, function(index, value){
            console.log(value.serv_name);

            $("#tditems").append('<tr><td  colspan="9">'+ value.serv_name +'</td><td colspan="2">'+  value.serv_quantity  +'</td><td colspan="1"><button type="button" onclick="remove_item(\''+  value.serv_code +'\');" style="background: transparent; border: none;"><span style="color: red;margin-left: 1em;font-size: 24px;"><i class="mdi mdi-delete"></i></span></button></td></tr>');
            
            totalamount = totalamount + (2.32 * parseFloat(value.serv_quantity));
            totalamount = parseFloat(totalamount).toFixed(2);
            document.getElementById("totalamount").value = totalamount;
            document.getElementById("total_id").innerHTML = totalamount;
            

        });

        document.getElementById("itemsselected").value = JSON.stringify(selected_items);

        totalitems = totalitems + 1;
        document.getElementById("totalitems").value = totalitems;

        var modal = document.getElementById("myModal");
        modal.style.display = "none";
       
    }


    function addTrucklist(){

        var obj = {
            truck_code: document.getElementById("truck_code").value,
            truck_name: document.getElementById("truck_name").value,
            truck_quantity: document.getElementById("truck_quantity").value,
            truck_type: $("input[name=truck_type]").val(),
            truck_note: document.getElementById("truck_note").value
        } 

        selected_trucks.push(obj);

        console.log(selected_trucks);

        document.getElementById("truck_code").value = "";
        document.getElementById("truck_name").value = "";
        document.getElementById("truck_quantity").value = "";
        document.getElementById("truck_note").value = "";

        $("#tditems").empty();

        $.each(selected_trucks, function(index, value){
            console.log(value.truck_name);

            $("#tditems").append('<tr><td  colspan="9">'+ value.truck_name +'</td><td colspan="2">'+  value.truck_quantity  +'</td><td colspan="2">'+  value.truck_type  +'</td><td colspan="1"><button type="button" onclick="remove_truck(\''+  value.truck_code +'\');" style="background: transparent; border: none;"><span style="color: red;margin-left: 1em;font-size: 24px;"><i class="mdi mdi-delete"></i></span></button></td></tr>');
            
            totalamount = totalamount + (2.32 * parseFloat(value.truck_quantity));
            totalamount = parseFloat(totalamount).toFixed(2);
            document.getElementById("totalamount").value = totalamount;
            // document.getElementById("total_id").innerHTML = totalamount;
            

        });

        document.getElementById("itemsselected").value = JSON.stringify(selected_trucks);

        totalitems = totalitems + 1;
        document.getElementById("totalitems").value = totalitems;


        var modal = document.getElementById("myModal");
        modal.style.display = "none";


        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById("Details").style.display = "none";

        document.getElementById("ListHeavyTruck").style.display = "block";
        // evt.currentTarget.className += " active";
    }


    
    function add_truck(truck_code,  truck_url, truck_name){

        console.log("tru");

        var modaltruck = document.getElementById("myModaltruck");
        modaltruck.style.display = "none";

        document.getElementById("truck_code").value = truck_code;
        document.getElementById("truck_name").value = truck_name;
        document.getElementById("truck_url").value = truck_url;


        $("#tr_div").empty();
        $("#tr_div").append('<button type="button" onclick="showtrucks()" class="car_btn" id="myBtntruck">Truck: <img class="icon_car" style="margin-left: 1em;margin-right: 1em;height: 3em;" src="http://127.0.0.1/movlog.api/uploads/car_icons/'+ truck_url +'" alt="">' +  truck_name  +'</button>');
                

    }



    function remove_item(item){

        console.log(item);
        const indiceABorrar = selected_items.findIndex(q => q.serv_code === item);
        console.log(indiceABorrar);

        if (-1 != indiceABorrar) {
            selected_items.splice(indiceABorrar, 1);
            totalitems = totalitems - 1;
            document.getElementById("totalitems").value = totalitems;
            
            $("#tditems").empty();

            $.each(selected_items, function(index, value){
                console.log(value.serv_name);

                $("#tditems").append('<tr><td  colspan="9">'+ value.serv_name +'</td><td colspan="2">'+  value.serv_quantity  +'</td><td colspan="1"><button type="button" onclick="remove_item(\''+  value.serv_code +'\');" style="background: transparent; border: none;"><span style="color: red;margin-left: 1em;font-size: 24px;"><i style="font-size:24px" class="fa">&#xf014;</i></span></button></td></tr>');
                
            });
            
        }

    }


    function remove_truck(truck){

        console.log(truck);
        const indiceABorrar = selected_trucks.findIndex(q => q.truck_code === truck);
        console.log(indiceABorrar);

        if (-1 != indiceABorrar) {
            selected_trucks.splice(indiceABorrar, 1);
            totalitems = totalitems - 1;
            document.getElementById("totalitems").value = totalitems;
            
            $("#tditems").empty();

            $.each(selected_trucks, function(index, value){
                console.log(value.truck_name);

                
                $("#tditems").append('<tr><td  colspan="9">'+ value.truck_name +'</td><td colspan="2">'+  value.truck_quantity  +'</td><td colspan="2">'+  value.truck_type  +'</td><td colspan="1"><button type="button" onclick="remove_truck(\''+  value.truck_code +'\');" style="background: transparent; border: none;"><span style="color: red;margin-left: 1em;font-size: 24px;"><i class="mdi mdi-delete"></i></span></button></td></tr>');
            
                
            });
            
        }

    }


    function getTrucks() {
        var fetch_type = "";
        var add_type = document.getElementById("add_type").value;

        if(add_type == "add_construction"){
            fetch_type = "fetchtrucks_construction";
        }else if(add_type == "add_freight"){
            fetch_type = "fetchtrucks_freight";
        }
        
        var data_parsed = {
                        actions: fetch_type
                    }

        var response = apiPost(data_parsed);
        response.then(function(data) {
            if (data.data) {
                $.each(data.data, function(index, value){
                    $("#trucklist").append('<div class="list_item" onclick="add_truck(\''+  value.TRUCK_CODE +'\',\''+ value.TRUCK_URL +'\',\''+ value.TRUCK_NAME +'\');" ><span> <img class="icon_car" src="http://127.0.0.1/movlog.api/uploads/car_icons/'+ value.TRUCK_URL +'" alt=""> <span class="text_car">' + value.TRUCK_NAME + '</span></span></div>');
                });
            } else {
                alert("No show");
            }
        })

    }


    function getHeavyTrucks() {
        
        if(document.getElementById('ListHeavyTruck') !=null){

            document.getElementById("ListHeavyTruck").style.display = "block";

            var data_parsed = {
                            actions: 'fetchtrucks_construction'
                        }



            var response = apiPost(data_parsed);
            response.then(function(data) {
                if (data.data) {
                    $.each(data.data, function(index, value){
                        $("#ListHeavyTruck").append('<div class="list_item" onclick="openTruckList(event, \'Details\',\''+ value.TRUCK_CODE +'\',\''+ value.TRUCK_NAME +'\',\''+ value.TRUCK_URL +'\')" ><span> <img class="icon_car" src="http://127.0.0.1/movlog.api/uploads/car_icons/'+ value.TRUCK_URL +'" alt=""> <span class="text_car">' + value.TRUCK_NAME + '</span></span></div>');                    
                    });
                } else {
                    alert("No show");
                }
            })
        }

       

    }



    ////////////////////////////////////////////////////////////
    var modaltruck = document.getElementById("myModaltruck");

    // Get the button that opens the modaltruck
    var btntruck = document.getElementById("myBtntruck");



    // Get the <span> element that closes the modaltruck
    var span = document.getElementsByClassName("close")[1];

    // When the user clicks on the button, open the modaltruck
   
    // When the user clicks on the button, open the modaltruck
    // btntruck.onclick = function() {
    //     modaltruck.style.display = "block";
    // }

    function showtrucks(){
        console.log("Hey");
        modaltruck.style.display = "block";
    }


    // When the user clicks on <span> (x), close the modaltruck
    // span.onclick = function() {
    //     modaltruck.style.display = "none";
    // }


    // When the user clicks anywhere outside of the modaltruck, close it
    window.onclick = function(event) {
        if (event.target == modaltruck) {
            modaltruck.style.display = "none";
        }
    }


    //////////////////////////////////////////////////////////



    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    // btn.onclick = function() {
    //     modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //     modal.style.display = "none";
    // }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    function openCity(evt, cityName, serv_code, serv_name) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        document.getElementById("serv_code").value = serv_code;
        document.getElementById("serv_name").value = serv_name;
        document.getElementById("selected_item_show").innerHTML = serv_name;

    }


    function openTruckList(evt, cityName, truck_code, truck_name, truck_url) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        document.getElementById("truck_code").value = truck_code;
        document.getElementById("truck_name").value = truck_name;
        document.getElementById("truck_url").value = truck_url;
        document.getElementById("selected_truck_show").innerHTML = truck_name;

    }


    function openListMain(evt, cityName){
        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }




    
    // $( function() {
    //     $( "#pickupdate" ).datepicker();
    // } );


    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '12:00am',
        maxTime: '11:00pm',
        defaultTime: '9',
        startTime: '01:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });



    
    function apiPost(data_parsed) {
                var default_data = {
                        apikey:'474869734c3363443561774939744159456434704e43375567327138786a75574f36626856654b6c54727950514a4258525a667a6b53306d6e6f4d314676',
                        actions: 'fetchservices',
                        cipher: 'EH.ZaehbjnFxs'
                    }

                var post_data = $.extend({}, default_data, data_parsed);

                return $.ajax({
                        url: 'http://127.0.0.1/movlog.api/api.php',
                        type: "POST",
                        data: $.param(post_data),    
                        processData: false,
                        headers: {          
                            Accept: "application/json, text/plain, */*"
                        },
                        success: function(data) {
                            console.log(data.data);
                            return data.data;                    
                        }        
                    });
            }



    //////////////////////////// PORTAL'S CODES END ///////////////////////////////////////// 





    //////////////////////////// PROGRESSIVE FORM START //////////////////////////////////////


        var currentTab = 0; // Current tab is set to be the first tab (0)
        // showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:

                $('#pg').val('appshipments');
               
                var add_type = document.getElementById("add_type").value;

                
                $('#view').val('add');
                $('#class_call').val('add');    

                // if(add_type == "add_construction"){
                //     $('#view').val('add_construction');
                //     $('#class_call').val('add_construction');    
                // }else if(add_type == "add_freight"){
                //     $('#view').val('add_freight');
                //     $('#class_call').val('add_freight');    
                // }

                document.getElementById("myform").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }




        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }

            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }




</script>