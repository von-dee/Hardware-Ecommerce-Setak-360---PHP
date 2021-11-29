        <!-- Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="<?php echo $nav->navigate('app_dashboard')?>" class="logo logo-large"><img src="media/images/logo.png" class="img-fluid" alt="logo"></a>
                    <a href="<?php echo $nav->navigate('app_dashboard')?>" class="logo logo-small"><img src="media/images/logo.png" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li>
                            <a href="<?php echo $nav->navigate('app_dashboard')?>">
                              <img src="media/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $nav->navigate('app_insight')?>">
                                <img src="media/images/svg-icon/chart.svg" class="img-fluid" alt="basic"><span>Insight</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $nav->navigate('app_store')?>">
                                <img src="media/images/svg-icon/ecommerce.svg" class="img-fluid" alt="chart"><span>Store</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $nav->navigate('app_store','checkout')?>">
                                <img src="media/images/svg-icon/components.svg" class="img-fluid" alt="advanced"><span>Checkout</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?php //echo $nav->navigate('app_requests','add')?>">
                                <img src="media/images/svg-icon/maps.svg" class="img-fluid" alt="advanced"><span>Create Order</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?php echo $nav->navigate('app_requests')?>">
                              <img src="media/images/svg-icon/tables.svg" class="img-fluid" alt="apps"><span>All Orders</span>
                            </a>
                        </li>
<!-- 
                        <li>
                            <a href="javaScript:void();">
                              <img src="media/images/svg-icon/form_elements.svg" class="img-fluid" alt="dashboard"><span>History</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="<?php echo $nav->navigate('app_history','')?>">Completed Orders</a></li>
                                <li><a href="<?php echo $nav->navigate('app_history','list_transactions','list_transactions')?>">Transactions</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo $nav->navigate('app_riders')?>">
                                <img src="media/images/svg-icon/widgets.svg" class="img-fluid" alt="icons"><span>Customers</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php //echo $nav->navigate('app_staff')?>">
                                <img src="media/images/svg-icon/user.svg" class="img-fluid" alt="icons"><span>Staff</span>
                            </a>
                        </li>

                        <li>
                            <a href="javaScript:void();">
                              <img src="media/images/svg-icon/email.svg" class="img-fluid" alt="report"><span>Messages</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="<?php //echo $nav->navigate('app_messages','inbox','lists_inbox')?>">Inbox</a></li>
                                <li><a href="<?php //echo $nav->navigate('app_messages','compose')?>">Compose</a></li>
                                <li><a href="<?php //echo $nav->navigate('app_messages','trash')?>">Trash</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javaScript:void();">
                              <img src="media/images/svg-icon/layouts.svg" class="img-fluid" alt="report"><span>Finances</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>                                                   
                            <ul class="vertical-submenu">
                                <li><a href="<?php //echo $nav->navigate('app_finances','paymentdefaulters','list_paymentdefaulters')?>">Transactions</a></li>
                                <li><a href="<?php //echo $nav->navigate('app_finances','transactions','list_transactions')?>">Invoices</a></li>
                                <li><a href="<?php //echo $nav->navigate('app_finances','profits','list_profits')?>">Profits</a></li>
                                <li><a href="<?php //echo $nav->navigate('app_finances','expenses','list_expenses')?>">Expenses</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javaScript:void();">
                              <img src="media/images/svg-icon/pages.svg" class="img-fluid" alt="report"><span>Report</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                
                                <li>
                                    <a href="javaScript:void();">Financial Reports<i class="feather icon-chevron-right pull-right"></i></a>
                                    <ul class="vertical-submenu">
                                        <li><a href="<?php //echo $nav->navigate('app_reports','profitloss_filter')?>">Profit & Loss</a></li>
                                        <li><a href="<?php //echo $nav->navigate('app_reports','expenses_filter')?>">Expenses</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javaScript:void();">General Reports<i class="feather icon-chevron-right pull-right"></i></a>
                                    <ul class="vertical-submenu">
                                        <li><a href="<?php //echo $nav->navigate('app_reports','trips_filter')?>">All Trips</a></li>
                                        <li><a href="<?php //echo $nav->navigate('app_reports','riders_filter')?>">All Riders</a></li>
                                        <li><a href="<?php //echo $nav->navigate('app_reports','clients_filter')?>">All Clients</a></li>
                                        <li><a href="<?php //echo $nav->navigate('app_reports','completed_trips_filter')?>">Completed Trips</a></li>
                                        <li><a href="<?php //echo $nav->navigate('app_reports','cancelled_trips_filter')?>">Cancelled Trips</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="<?php //echo $nav->navigate('app_contactus')?>">
                                <img src="media/images/svg-icon/apps.svg" class="img-fluid" alt="tables"><span>Contact Us</span>
                            </a>
                        </li>                                                       -->
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->

