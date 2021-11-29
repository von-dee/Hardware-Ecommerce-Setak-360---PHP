<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>StockAdmin</title>

  <!-- Custom fonts for this template-->
  <link href="media/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="media/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >

    <?php if(isset($attempt_in)){?>
        <div class="alert-danger">
            <?php
                    if($attempt_in < 3){
                        $msg =  'Invalid user name or password.';
                    }else if($attempt_in =='11'){
                        $msg = 'Invalid Code entered.';
                    }else if($attempt_in =='120'){
                        $msg = 'Suspended account.';
                    }else if($attempt_in =='140'){
                        $msg = 'Locked. Wait for 5min and try again.';
                    }else if($attempt_in =='110'){
                        $msg = 'User account locked.';
                    }
                    ?>   
        </div>
    <?php }  $token= generateFormToken(); ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 8em !important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
            <form class="user" action="#" method="post" enctype="application/x-www-form-urlencoded" name="myform" id="loginForm" autocomplete="off">
              
              <div class="row" style="padding: 4em 4em;">

                  <div class="col-lg-12">
                    <h1 class="h4 text-gray-900 mb-4" style="text-align: center">Set Up Account!</h1>
                    
                    <?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?>
                    <input id="token" name="token" value="<?php echo $token ; ?>" type="hidden" />  

                  </div>
                  
                  <div class="col-lg-12" id="admin_pg" style="display: block;">

                    <h6 class="h6 text-gray-900 mb-6" style="text-align: center">Administrator's Details</h6>
                    <br>
                    
                    <div class="row">
                  
                      <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">First Name <span>*</span></label>
                            <input type="email" class="form-control form-control-user" id="admin_fname" aria-describedby="emailHelp" name="admin_fname">
                          </div>

                          <div class="form-group">
                            <label for="">Email <span>*</span></label>
                            <input type="text" class="form-control form-control-user" id="admin_email" name="admin_email">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Password <span>*</span></label>
                            <input type="password" class="form-control form-control-user" id="admin_pwd" name="admin_pwd">
                          </div>
                          
                          
                      </div>

                      <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">Last Name <span>*</span></label>
                            <input type="email" class="form-control form-control-user" id="admin_lname" aria-describedby="emailHelp" name="admin_lname">
                          </div>


                          <div class="form-group">
                            <label for="">Phone Number <span>*</span></label>
                            <input type="number" class="form-control form-control-user" id="admin_phone" name="admin_phone">
                          </div>

                          <div class="form-group">
                            <label for="">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control form-control-user" id="admin_cpwd" name="admin_cpwd">
                          </div>


                      </div>

                      <div class="col-lg-12" style="text-align: center;">
                        <a href="javascript:void(0);" onclick="toggle_div()" class="btn btn-primary btn-user btn-block" style="background: none;width: 10em;float: right;color: #333;">
                          Next &#8594;
                        </a>
                      </div>
                    
                    </div>
                  
                  </div>


                  <div class="col-lg-12" id="comp_pg" style="display: none;">
                    
                    <h6 class="h6 text-gray-900 mb-6" style="text-align: center">Company Information</h6>
                    <br>

                    <div class="row">
                  
                      <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">Company Name<span>*</span></label>
                            <input type="text" class="form-control form-control-user" id="comp_name" aria-describedby="emailHelp" name="comp_name">
                          </div>

                          <div class="form-group">
                            <label for="">Company Email <span></span></label>
                            <input type="email" class="form-control form-control-user" id="comp_email" aria-describedby="emailHelp" name="comp_email">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Company City <span></span></label>
                            <input type="text" class="form-control form-control-user" id="comp_city" name="comp_city">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Company Description <span></span></label>
                            <textarea  class="form-control form-control-user" name="comp_description" id="comp_description" cols="30" rows="2"></textarea>
                          </div>
                          
                      </div>

                      <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">Company Phone <span>*</span></label>
                            <input type="number" class="form-control form-control-user" id="comp_phone" name="comp_phone">
                          </div>

                          <div class="form-group">
                            <label for="">Company Website <span></span></label>
                            <input type="text" class="form-control form-control-user" id="comp_website" name="comp_website">
                          </div>

                          <div class="form-group">
                            <label for="">Company Location <span></span></label>
                            <input type="text" class="form-control form-control-user" id="comp_location" name="comp_location">
                          </div>


                      </div>

                      <div class="col-lg-6" style="text-align: center;">
                        <a href="javascript:void(0);" onclick="toggle_div()" class="btn btn-primary btn-user btn-block" style="background: none;width: 10em;float: left;color: #333;">
                          &#8592; Previous
                        </a>
                      </div>

                      <div class="col-lg-6" style="text-align: center;">
                        <a href="javascript:void(0);" onclick="document.myform.submit();" class="btn btn-primary btn-user btn-block" style="width: 10em; float: right;">
                          Submit &#8594;
                        </a>
                      </div>
                    
                    </div>
                  
                  </div>

              </div>
            </form>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script>

    
    function toggle_div() {
      

        var admin_pg = document.getElementById("admin_pg");
        var comp_pg = document.getElementById("comp_pg");									

        if (admin_pg.style.display === "block" && comp_pg.style.display === "none") {
            admin_pg.style.display = "none";
            comp_pg.style.display = "block";
            // document.getElementById('customer_btn').innerHTML = "Old Customer";
        } else if(admin_pg.style.display === "none" && comp_pg.style.display === "block") {
            admin_pg.style.display = "block";
            comp_pg.style.display = "none";
            // document.getElementById('customer_btn').innerHTML = "New Customer";
        }
        
    }
  
  </script>



  <?php
    
    
    
    if(!empty($admin_fname) && !empty($admin_email) && !empty($admin_pwd) && !empty($admin_lname) && !empty($admin_phone) && !empty($admin_cpwd)){
      
      if($admin_pwd == $admin_cpwd){
        $crypt = new Crypt();
        $password = $crypt->loginPassword($admin_email,$admin_pwd);
      
        $query = "SELECT USR_ID, USR_CODE, USR_FIRSTNAME, USR_PHOTO, USR_ACCESS_LEVEL, USR_COMPANY_CODE, USR_BRANCH_CODE, USR_STATUS, USR_LASTLOGIN_DATE, USR_LOGIN_STATUS, USR_EMAIL, USR_USERNAME, USR_COUNTRY, USR_GENDER, USR_OTHERNAME FROM app_users WHERE USR_STATUS='1' AND USR_USERNAME=".$sql->Param('a')." AND USR_PASSWORD=".$sql->Param('b')."";
        
        $stmt = $sql->Prepare($query);
        $stmt = $sql->Execute($stmt,array($admin_email,$password));
        print $sql->ErrorMsg();


        if($stmt->RecordCount() == 0){
          $dateAdded = date("Y-m-d H:s:m" );
          
          $engine = new Engine();
          $gen_user_code =  $engine->generateCode_SQL("app_users", "USR", "USR_CODE", "USR_ID");
          $gen_user_comp_code =  $engine->generateCode_SQL("app_users", "USR", "USR_COMPANY_CODE", "USR_ID");
          $gen_user_brance_code =  $engine->generateCode_SQL("app_users", "USR", "USR_BRANCH_CODE", "USR_ID");
          $gen_comp_code =  $engine->generateCode_SQL("app_companies", "CMP", "COMP_CODE", "COMP_ID");

          $stmt_insert =$sql->Execute($sql->Prepare("INSERT INTO app_users (USR_CODE, USR_FIRSTNAME, USR_PHOTO, USR_ACCESS_LEVEL, USR_COMPANY_CODE, USR_BRANCH_CODE, USR_STATUS, USR_LASTLOGIN_DATE, USR_LOGIN_STATUS, USR_PHONE, USR_EMAIL, USR_USERNAME, USR_COUNTRY, USR_GENDER, USR_OTHERNAME, USR_PASSWORD, USR_DATE_ADDED, USR_ACTOR_ID, USR_ACTOR_COMPCODE) VALUES(".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').")"),array($gen_user_code, $admin_fname, "", 2, $gen_user_comp_code, $gen_user_brance_code, "1", $dateAdded, "0", $admin_phone, $admin_email, $admin_email, "Ghana", null, $admin_lname, $password, $dateAdded, $gen_user_code, $gen_comp_code));
          print $sql->ErrorMsg();

          if($stmt_insert == true){
          
          
            $stmt_comp =$sql->Execute($sql->Prepare("INSERT INTO app_companies (COMP_CODE, COMP_NAME, COMP_EMAIL, COMP_PHONE, COMP_LOCATION, COMP_DESCRIPTION, COMP_ADDRESS, COMP_STATUS, COMP_WEBSITE, COMP_ACTORID) VALUES(".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').",".$sql->Param('a').")"),array($gen_comp_code, $comp_name, $comp_email, $comp_phone, $comp_location, $comp_description, $comp_city, "1", $comp_website, $gen_user_code));
            print $sql->ErrorMsg();

            if($stmt_comp == true){
              header('Location: index.php?action=index&pg=dashboard');
              echo '<script language="javascript">';
              echo 'window.location.href = "http://localhost/victorstock/index.php?action=login";';
              echo '</script>';
            }else{
              echo '<script language="javascript">';
              echo 'alert("Try again: Couldn\'t save Company Details ")';
              echo '</script>';
            }

          }else{
            echo '<script language="javascript">';
            echo 'alert("Try again: Couldn\'t save Your Details ")';
            echo '</script>';
          }

        }else{
            echo '<script language="javascript">';
            echo 'alert("User already exists ")';
            echo '</script>';
        }


			}else{
            echo '<script language="javascript">';
            echo 'alert("passwords not the same")';
            echo '</script>';
			}
			
		    

    }else{     
      // echo '<script language="javascript">';
      // echo 'alert("Required Fields are empty")';
      // echo '</script>';
    }

  ?>


  
  <?php $session->set('1_token', $token);  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="media/vendor/jquery/jquery.min.js"></script>
  <script src="media/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="media/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="media/js/sb-admin-2.min.js"></script>

</body>

</html>
