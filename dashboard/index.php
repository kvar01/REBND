<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location:login.php");
}
include('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        include('headerTitle.php');
    ?>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../images/log2.png" type="image/x-icon">
    <?php
    include('HeaderNavigationLinks.php');
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!--preloader-->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="#" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <img src="assets/rebndlogo.png" alt="">
                </span>
                <span class="logo-lg">

                    <img src="assets/dist/img/logo.png" alt="">
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="pe-7s-angle-left-circle"></span>
                </a>
                <!-- searchbar-->
                <div class="navbar-custom-menu">
                    <?php
                    include("profileheader.php");
                    ?>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
                <!-- sidebar menu -->

                <?php
                include('SideNavigation.php');
                ?>
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon"  style="color: black;">
                    <i class="fa fa-desktop"></i>
                </div>
                <div class="header-title">
                    <h1>REBND Admin Dashboard</h1>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox1">
                            <div class="statistic-box">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalOrders();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Orders</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div id="cardbox2">
                            <div class="statistic-box">
                                <i class="fa fa-user-plus fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalCustomers();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Customers</h3>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox4">
                            <div class="statistic-box">
                                <i class="fa fa-user fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalVendors();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Vendors</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox4">
                            <div class="statistic-box">
                                <i class="fa fa-list-ul fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalItemategories();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Categories</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox4">
                            <div class="statistic-box">
                                <i class="fa fa-plus-circle fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalProducts();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Products</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox4">
                            <div class="statistic-box">
                                <i class="fa fa-files-o fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalDelivered();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3> Delivered Orders</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div id="cardbox4">
                            <div class="statistic-box">
                                <i class="fa fa-files-o fa-3x"></i>
                                <div class="counter-number pull-right">
                                    <span class="count-number"><?php echo TotalRecieved();?></span>
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                </div>
                                <h3>Recieved Orders</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include('webfooter.php');
     ?>
    </div>
    <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="assets/dist/js/custom.js" type="text/javascript"></script>
    <script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
    <script src="assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="assets/plugins/monthly/monthly.js" type="text/javascript"></script>
    <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
</body>


</html>
