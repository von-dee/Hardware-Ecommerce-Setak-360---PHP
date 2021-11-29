
// var url = "http://localhost/setak360/api/api.php";
// var url_media = "http://localhost/setak360/admin/media/upload/";

var url = "http://setak360.com/api/api.php";
var url_media = "http://setak360.com/admin/media/upload/";




var selected_foods_string = localStorage.getItem("foodsselected");
var selected_foods = JSON.parse(selected_foods_string);

if(selected_foods == null || selected_foods == undefined || selected_foods == ""){
  var selected_foods = [];
}

var totalitems = 0;
var totalamount = 0;


function Generator() {};

Generator.prototype.rand =  Math.floor(Math.random() * 26) + Date.now();

Generator.prototype.getId = function() {
   return this.rand++;
};

var idGen =new Generator();

// localStorage.setItem("key","value");

// localStorage.getItem("key"); 



$("p").click(function(){
  // action goes here!!
  // this is the id of the form
});

  


$("#myForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    // var url = form.attr('action');
    
    console.log("data");

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            $('form-control').val("");

            console.log(data);

            if(data.msg == "success"){
              
              sweetalert_success(data.msg_head,data.msg_body);   

              if($("input[name*='actions']").val() == "push_cartcheckout"){
                clearstorage();
                // location.reload(true); 
              }
              
            }else if(data.msg == "error"){
              sweetalert_error(data.msg_head,data.msg_body)
            }
        }
    });

});

function clearstorage(){
  localStorage.clear();
}

function sweetalert_success(head,body_txt) {
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: head,
    footer: '<a href>'+body_txt+'</a>'
  })   
};

function sweetalert_error(head,body_txt) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: head,
    footer: '<a href>'+body_txt+'</a>'
  })
};


function add_to_cart(code_,url_,name_,price_,quantity_) {
    code_ = idGen.getId();

    var obj = {
        item_code: code_.toString(),
        item_name: name_,
        item_url: url_,
        item_price: price_,
        item_quantity: quantity_
    } 

    selected_foods.push(obj);

    var totalamount = 0;
    var totalitems = 0;

    $("#cartitems").empty();

    $.each(selected_foods, function(index, value){

        $("#cartitems").append('<div class="cart_item"><div class="cart_img"><a href="#"><img src="'+ url_media +value.item_url+'" alt=""></a></div><div class="cart_info"><a href="#">'+ value.item_name  +'</a><span class="quantity">Qty: 1</span><span class="price_cart">₵'+  value.item_price  +'.00</span></div><div class="cart_remove"><a href="javascript:void(0)"  onclick="remove_from_cart(\''+  value.item_code +'\');"><i class="ion-android-close"></i></a></div></div>');

        
        totalamount = parseFloat(totalamount) + (parseFloat(value.item_price) * parseFloat(value.item_quantity));
        totalamount = parseFloat(totalamount).toFixed(2);
        document.getElementById("totalamount").value = totalamount;
        document.getElementById("total_text").innerHTML = "₵"+totalamount.toString();
        document.getElementById("subtotal_val").innerHTML = "₵"+totalamount.toString();
        document.getElementById("subtotal").value = totalamount.toString();
        
        
        totalitems = totalitems + 1;
        document.getElementById("total_id").innerHTML = totalitems;

    });

    var selected_foods_var = JSON.stringify(selected_foods);
    document.getElementById("foodsselected").value = selected_foods_var;
    localStorage.setItem("foodsselected",selected_foods_var);
    
    document.getElementById("totalitems").value = totalitems;

    sweetalert_success("Added Product","Successfully Added product to Cart");   

    

};


function remove_from_cart(item) {
  
    const indiceABorrar = selected_foods.findIndex(q => q.item_code === item);


    if (-1 != indiceABorrar) {
        selected_foods.splice(indiceABorrar, 1);
        totalitems = totalitems - 1;
        document.getElementById("totalitems").value = totalitems;
        
        $("#cartitems").empty();
        var totalamount = 0;
        var totalitems = 0;

        $.each(selected_foods, function(index, value){

          $("#cartitems").append('<div class="cart_item"><div class="cart_img"><a href="#"><img src="'+ url_media +value.item_url+'" alt=""></a></div><div class="cart_info"><a href="#">'+ value.item_name  +'</a><span class="quantity">Qty: 1</span><span class="price_cart">₵'+  value.item_price  +'.00</span></div><div class="cart_remove"><a href="javascript:void(0)"  onclick="remove_from_cart(\''+  value.item_code +'\');"><i class="ion-android-close"></i></a></div></div>');
          
          totalamount = parseFloat(totalamount) + (parseFloat(value.item_price) * parseFloat(value.item_quantity));
          totalamount = parseFloat(totalamount).toFixed(2);
          document.getElementById("totalamount").value = totalamount;
          document.getElementById("total_text").innerHTML = totalamount.toString();
          document.getElementById("subtotal_val").innerHTML = totalamount.toString();
          document.getElementById("subtotal").value = totalamount.toString();
          
          
          totalitems = totalitems + 1;
          document.getElementById("total_id").innerHTML = totalitems;
        });

        if(totalitems == 0){
          document.getElementById("total_id").innerHTML = 0;
          document.getElementById("totalamount").value = "₵00.00";
          document.getElementById("total_text").innerHTML = "₵00.00";
          document.getElementById("subtotal_val").innerHTML = "₵00.00";
          document.getElementById("subtotal").value = "00.00";
          
          
          $("#cartitems").append('<li class="cart-item"><div class="cart__item-content"><h6 class="cart__item-title">No Items In Cart</h6><div class="cart__item-detail"></div></div></li>');
        }
        
        var selected_foods_var = JSON.stringify(selected_foods);
        document.getElementById("foodsselected").value = selected_foods_var;
        localStorage.setItem("foodsselected",selected_foods_var);
        
        document.getElementById("totalitems").value = totalitems;

        
        sweetalert_success("Removed Product","Successfully Removed Product");
        
    }
  
};


function load_cart() {

  var selected_foods_string = localStorage.getItem("foodsselected");
  var selected_foods = JSON.parse(selected_foods_string);

  var totalamount = 0;
  var totalitems = 0;

  $("#cartitems").empty();
  $("#cartitems_checkout").empty();

  $.each(selected_foods, function(index, value){

    
      $("#cartitems").append('<div class="cart_item"><div class="cart_img"><a href="#"><img src="'+ url_media +value.item_url+'" alt=""></a></div><div class="cart_info"><a href="#">'+ value.item_name  +'</a><span class="quantity">Qty: 1</span><span class="price_cart">₵'+  value.item_price  +'.00</span></div><div class="cart_remove"><a href="javascript:void(0)"  onclick="remove_from_cart(\''+  value.item_code +'\');"><i class="ion-android-close"></i></a></div></div>');
      

      $("#cartitems_checkout").append('<tr><td><img style="height: 3em;" src="'+ url_media +value.item_url+'" alt=""></td><td>'+  value.item_name  +'<strong> </strong></td><td> ₵'+  value.item_price  +'</td><td><a href="javascript:void(0)"  style="float: left;margin-left: 1em;font-size: 2em;color: red;font-weight: bold;" onclick="remove_from_checkout(\''+  value.item_code +'\');">x</a></td></tr>>');


      

      // console.log(value.item_price);
      
      

      totalamount = parseFloat(totalamount) + (parseFloat(value.item_price) * parseFloat(value.item_quantity));
      totalamount = parseFloat(totalamount).toFixed(2);
      document.getElementById("totalamount").value = totalamount;
      document.getElementById("total_text").innerHTML = "₵"+totalamount.toString();
      document.getElementById("subtotal_val").innerHTML = "₵"+totalamount.toString();
      document.getElementById("subtotal").value = totalamount.toString();
      
      var shipping_val = 10.00;
      var ordertotal_val =  parseFloat(shipping_val) + parseFloat(totalamount);
      shipping_val = parseFloat(shipping_val).toFixed(2);;
      ordertotal_val = parseFloat(ordertotal_val).toFixed(2);;
      document.getElementById("shipping").value = parseFloat(shipping_val);
      document.getElementById("ordertotal").value = parseFloat(ordertotal_val);
      document.getElementById("shipping_val").innerHTML = "₵"+shipping_val.toString();
      document.getElementById("ordertotal_val").innerHTML = "₵"+ordertotal_val.toString();
      
      
      totalitems = totalitems + 1;

      document.getElementById("total_id").innerHTML = totalitems;

  });

  var selected_foods_var = JSON.stringify(selected_foods);
  document.getElementById("foodsselected").value = selected_foods_var;
  localStorage.setItem("foodsselected",selected_foods_var);
  
  document.getElementById("totalitems").value = totalitems;

  if(totalitems == 0){
    document.getElementById("total_id").innerHTML = 0;
    document.getElementById("totalamount").value = "₵00.00";
    document.getElementById("total_text").innerHTML = "₵00.00";
    document.getElementById("subtotal_val").innerHTML = "₵00.00";
    document.getElementById("subtotal").value = "00.00";
    document.getElementById("subtotal").value = "00.00";
    
    

    $("#cartitems").append('<li class="cart-item"><div class="cart__item-content"><h6 class="cart__item-title">No Items In Cart</h6><div class="cart__item-detail"></div></div></li>');
  }
 

};


function load_products() {


  $.ajax({
      type: "POST",
      url: url,
      data: {
        actions: "get_products",
        apikey: "474869734c3363443561774939744159456434704e43375567327138786a75574f36626856654b6c54727950514a4258525a667a6b53306d6e6f4d314676"
      }, // serializes the form's elements.
      success: function(data)
      {
          console.log(data);
          if(data.msg == "success"){
            console.log(data.data);

            $("#productsList").empty();

            $.each(data.data, function(index, value){
              // cart.html
                $("#productsList").append('<div class="col-lg-4 col-md-4 col-12 "><div class="single_product"><div class="product_name grid_name"><h3><a href="product-details.html">'+ value.PROD_NAME +'</a></h3><p class="manufacture_product"><a href="#">Accessories</a></p></div><div class="product_thumb"><a class="primary_img" href="product-details.html"><img src="'+ url_media + value.PROD_PICTUREURL +'" alt=""></a><a class="secondary_img" href="product-details.html"><img src="'+ url_media + value.PROD_PICTUREURL +'" alt=""></a><div class="label_product"><span class="label_sale">-47%</span></div><div class="action_links"><ul><li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li><li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li><li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li></ul></div></div><div class="product_content grid_content"><div class="content_inner"><div class="product_ratings"><ul><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li></ul></div><div class="product_footer d-flex align-items-center"><div class="price_box"><span class="current_price">₵'+ value.PROD_SALESPRICE +'</span><span class="old_price">₵'+ parseFloat(value.PROD_SALESPRICE)*1.25 +'.00</span></div><div class="add_to_cart"><a href="javascript:void(0)" onclick="add_to_cart(\''+ value.PROD_CODE +'\',\''+ value.PROD_PICTUREURL +'\',\''+ value.PROD_NAME +'\',\''+ value.PROD_SALESPRICE +'\',\'1\')" title="add to cart"><span class="lnr lnr-cart"></span></a></div></div></div></div><div class="product_content list_content"><div class="left_caption"><div class="product_name"><h3><a href="product-details.html">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3></div><div class="product_ratings"><ul><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li><li><a href="#"><i class="ion-star"></i></a></li></ul></div><div class="product_desc"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p></div></div><div class="right_caption"><div class="text_available"><p>availabe: <span>99 in stock</span></p></div><div class="price_box"><span class="current_price">₵'+ value.PROD_SALESPRICE +'</span><span class="old_price">₵'+ parseFloat(value.PROD_SALESPRICE)*1.25 +'.00</span></div><div class="cart_links_btn"><a href="#" title="add to cart">add to cart</a></div><div class="action_links_btn"><ul><li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li><li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li><li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li></ul></div></div></div></div></div>');


            });
            
            
          }else if(data.msg == "error"){
            sweetalert_error(data.msg_head,data.msg_body)
          }
      }
  });


  
};


function remove_from_checkout(item) {
  var selected_foods_string = localStorage.getItem("foodsselected");
  var selected_foods = JSON.parse(selected_foods_string);

  const indiceABorrar = selected_foods.findIndex(q => q.item_code === item);


  if (-1 != indiceABorrar) {
      selected_foods.splice(indiceABorrar, 1);
      totalitems = totalitems - 1;
      document.getElementById("totalitems").value = totalitems;
      
      $("#cartitems").empty();
      $("#cartitems_checkout").empty();
      var totalamount = 0;
      var totalitems = 0;

      $.each(selected_foods, function(index, value){

        $("#cartitems").append('<div class="cart_item"><div class="cart_img"><a href="#"><img src="'+ url_media +value.item_url+'" alt=""></a></div><div class="cart_info"><a href="#">'+ value.item_name  +'</a><span class="quantity">Qty: 1</span><span class="price_cart">₵'+  value.item_price  +'.00</span></div><div class="cart_remove"><a href="javascript:void(0)"  onclick="remove_from_cart(\''+  value.item_code +'\');"><i class="ion-android-close"></i></a></div></div>');
        
        $("#cartitems_checkout").append('<tr class="cart__product "><td class="cart__product-item"><div class="cart__product-remove" onclick="remove_from_cart(\''+  value.item_code +'\');"><i class="fa fa-close"></i></div><div class="cart__product-img"><img src="'+ url_media +value.item_url+'" alt="product" /></div><div class="cart__product-title"><h6>'+  value.item_name  +'</h6></div></td><td class="cart__product-price">₵'+  value.item_price  +'</td><td class="cart__product-total">₵'+  value.item_price  +'</td></tr>');
        
  
        totalamount = parseFloat(totalamount) + (parseFloat(value.item_price) * parseFloat(value.item_quantity));
        totalamount = parseFloat(totalamount).toFixed(2);
        document.getElementById("totalamount").value = totalamount;
        document.getElementById("total_text").innerHTML = "₵"+totalamount.toString();
        document.getElementById("subtotal_val").innerHTML = "₵"+totalamount.toString();
        document.getElementById("subtotal").value = totalamount.toString();
        
        var shipping_val = 10.00;
        var ordertotal_val =  parseFloat(shipping_val) + parseFloat(totalamount);
        shipping_val = parseFloat(shipping_val).toFixed(2);;
        ordertotal_val = parseFloat(ordertotal_val).toFixed(2);;
        document.getElementById("shipping").value = parseFloat(shipping_val);
        document.getElementById("ordertotal").value = parseFloat(ordertotal_val);
        document.getElementById("shipping_val").innerHTML = "₵"+shipping_val.toString();
        document.getElementById("ordertotal_val").innerHTML = "₵"+ordertotal_val.toString();
      
        
        totalitems = totalitems + 1;
        document.getElementById("total_id").innerHTML = totalitems;
  
    });
  
    if(totalitems == 0){
      document.getElementById("total_id").innerHTML = 0;
      document.getElementById("totalamount").value = "₵00.00";
      document.getElementById("total_text").innerHTML = "₵00.00";
      document.getElementById("subtotal_val").innerHTML = "₵00.00";
      document.getElementById("subtotal").value = "00.00";
      
      

      $("#cartitems").append('<li class="cart-item"><div class="cart__item-content"><h6 class="cart__item-title">No Items In Cart</h6><div class="cart__item-detail"></div></div></li>');

      $("#cartitems_checkout").append('<tr class="cart__product "><td class="cart__product-item"><div class="cart__product-img"></div><div class="cart__product-title"><h6>No Items In Cart</h6></div></td><td class="cart__product-price"></td><td class="cart__product-quantity"></td></tr>');

    }
    
    var selected_foods_var = JSON.stringify(selected_foods);
    document.getElementById("foodsselected").value = selected_foods_var;
    localStorage.setItem("foodsselected",selected_foods_var);
    
    document.getElementById("totalitems").value = totalitems;
  
      
  }

};





   




