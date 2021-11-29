<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jul 2020 16:39:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Setak</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="media/images/favicon.png">
    <!-- Start css -->
    <link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="media/css/icons.css" rel="stylesheet" type="text/css">
    <link href="media/css/style_main.css" rel="stylesheet" type="text/css">
    <link href="media/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">

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



    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <form action="#"> -->
                                    <form class="user" action="index.php?action=index&pg=1" method="post" enctype="application/x-www-form-urlencoded" name="myform" id="loginForm" autocomplete="off">
                    
                                        <?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?>
                                        <input id="token" name="token" value="<?php echo $token ; ?>" type="hidden" />  

                                        <div class="form-head">
                                            <a href="index.html" class="logo"><img src="media/images/favicon.png" class="img-fluid" alt="logo"></a>
                                        </div>                                        
                                        <h4 class="text-primary my-4">Log in !</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="uname" placeholder="Enter Username here" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="pwd" placeholder="Enter Password here" required>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox text-left">
                                                  <input type="checkbox" class="custom-control-input" id="rememberme">
                                                  <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                                </div>                                
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="forgot-psw"> 
                                                <a id="forgot-psw" href="user-forgotpsw.html" class="font-14">Forgot Password?</a>
                                              </div>
                                            </div>
                                        </div>            

                                        <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />


                                      <button type="submit"  onclick="document.myform.submit();" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>

                                    <!-- 
                                        <div class="login-or">
                                            <h6 class="text-muted">OR</h6>
                                        </div>
                                        <div class="social-login text-center">
                                            <button type="submit" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook mr-2"></i>Facebook</button>
                                            <button type="submit" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google mr-2"></i>Google</button>
                                        </div> 
                                    -->

                                    <p class="mb-0 mt-3"> Don't have a account? <a href="index.php?action=register">Sign up</a></p>

                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->

    <?php $session->set('1_token', $token);  ?>


    <!-- Start js -->        
    <script src="media/js/jquery.min.js"></script>
    <script src="media/js/popper.min.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
    <script src="media/js/modernizr.min.js"></script>
    <script src="media/js/detect.js"></script>
    <script src="media/js/jquery.slimscroll.js"></script>
    <!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jul 2020 16:39:36 GMT -->
</html>