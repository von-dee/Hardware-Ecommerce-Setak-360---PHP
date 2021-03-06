<style>

.live_icon{
    position: absolute;
    top: 3px;
    margin: 0px 10px;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 2px solid #ffffff;
    background-color: #0eaf56;
}

.live_icon_text{
    position: absolute;
    top: -10.8px;
    left: 3px;
    font-size: 9px;
    color: white;
}

</style>


<!-- Start Rightbar -->
<div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="index.html" class="mobile-logo"><img src="media/images/logo.svg" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="media/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="media/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="media/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="media/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                           <img src="media/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                           <img src="media/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="searchbar">
                                        <form>
                                            <div class="input-group">
                                              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                              <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><img src="media/images/svg-icon/search.svg" class="img-fluid" alt="search"></button>
                                              </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>



                        <?php

                            $actorcode = $session->get('actorid');
                            $actorname = $session->get('loginuserfulname');
                            $actorcompcode = $session->get('actor_compcode');

                            // Notification
                            $stmt_notifications = $sql->Execute($sql->Prepare("SELECT * FROM app_notifications WHERE NOTI_RECEIVER = 'USR000ALL' OR NOTI_RECEIVER = ".$sql->Param('a')."  ORDER BY NOTI_DATE DESC LIMIT 3"),array($actorcode));
                            $stmt_notifications = $stmt_notifications->getAll();

                            // var_dump($stmt_notifications); die();

                            print $sql->ErrorMsg();


                            $stmt_notifications_count = $sql->Execute($sql->Prepare("SELECT * FROM app_notifications WHERE NOTI_RECEIVER = 'USR000ALL' OR NOTI_RECEIVER = ".$sql->Param('a')." AND NOTI_STATUS= '1' "),array($actorcode));
                            $stmt_notifications_count = $stmt_notifications_count->RecordCount();
                            // var_dump($stmt_notifications_count); die();
                            print $sql->ErrorMsg();

                        ?>




                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="javascript:void(0)" class="infobar-icon">
                                            <img src="media/images/svg-icon/ecommerce.svg" class="img-fluid" alt="settings">
                                            <span class="live_icon"> <span class="live_icon_text">35</span> </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                            <img src="media/images/svg-icon/settings.svg" class="img-fluid" alt="settings">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="notifybar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="media/images/svg-icon/notifications.svg" class="img-fluid" alt="notifications">
                                            <span class="live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                                <div class="notification-dropdown-title">
                                                    <h4>Notifications</h4>                            
                                                </div>
                                                <ul class="list-unstyled">     


                                                <?php 
                                                    foreach ($stmt_notifications as $val){
                                                            $data =  $engine->getDataEncrypt($val);
                                                            // var_dump($val); die();
                                                ?>
                                                   
                                                
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge <?php echo $val['NOTI_TYPE']; ?>"><i class="<?php echo $val['NOTI_ICON']; ?>"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title"><?php echo $val['NOTI_MESSAGE']; ?></h5>
                                                            <p><span class="timing"><?php echo $val['NOTI_DATE']; ?></span></p>                            
                                                        </div>
                                                    </li>

                                                    <?php
                                                        }
                                                    ?>

                                                    <!-- <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-success-inverse"><i class="feather icon-file"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Project X prototype approved</h5>
                                                            <p><span class="timing">Yesterday, 01:40 PM</span></p>                            
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-danger-inverse"><i class="feather icon-eye"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">John requested to view wireframe</h5>
                                                            <p><span class="timing">3 Sep 2019, 05:22 PM</span></p>                            
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-warning-inverse"><i class="feather icon-package"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Sports shoes are out of stock</h5>
                                                            <p><span class="timing">15 Sep 2019, 02:55 PM</span></p>
                                                        </div>
                                                    </li> -->
                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo $nav->navigate('app_notifications')?>" class="profile-icon">All Notifications</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>                                
                                <!-- <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a>                                                
                                            </div>
                                        </div>
                                    </div>                                   
                                </li> -->
                                <li class="list-inline-item">
                                    <div class="profilebar">
                                        <div class="dropdown">
                                          <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="media/images/users/profile.svg" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                                <div class="dropdown-item">
                                                    <div class="profilename">
                                                      <h5>John Doe</h5>
                                                    </div>
                                                </div>
                                                <div class="userbox">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="media dropdown-item">
                                                            <a href="<?php echo $nav->navigate('app_profile')?>" class="profile-icon"><img src="media/images/svg-icon/user.svg" class="img-fluid" alt="user">My Profile</a>
                                                        </li>
                                                        <li class="media dropdown-item">
                                                            <a href="<?php echo $nav->navigate('app_messages')?>" class="profile-icon"><img src="media/images/svg-icon/email.svg" class="img-fluid" alt="email">Messages</a>
                                                        </li>    
                                                        <!-- <li class="media dropdown-item">
                                                            <a href="<?php //echo $nav->navigate('app_settings')?>" class="profile-icon"><img src="media/images/svg-icon/advanced.svg" class="img-fluid" alt="email">Settings</a>
                                                        </li>                                                         -->
                                                        <li class="media dropdown-item">
                                                            <a href="index.php?action=logout" class="profile-icon"><img src="media/images/svg-icon/logout.svg" class="img-fluid" alt="logout">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div> 
                <!-- End row -->
            </div>
            <!-- End Topbar -->