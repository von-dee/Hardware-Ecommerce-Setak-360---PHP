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
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block ">
              <!-- bg-login-image -->
                <img src="media/images/loginbg.png" style="width: 100%;margin: 2em 0em;" alt="">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <form class="user" action="index.php?action=index&pg=1" method="post" enctype="application/x-www-form-urlencoded" name="myform" id="loginForm" autocomplete="off">
                    
                    <?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?>
                    <input id="token" name="token" value="<?php echo $token ; ?>" type="hidden" />  

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="uname">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pwd">
                    </div>

                    <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />
                    
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="javascript:void(0);" onclick="document.myform.submit();" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index.php?action=register">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  
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
