<?php
session_start();
$User = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    ?>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
    <?php
    require('HeaderNavigationLinks.php');
    ?>
    <script>
        var loadFile = function (event) {
            var image = document.getElementById('uploading');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function ChangeAddress(address) {
            if (newpass == retypepass) {
                // code
                var url = "edit_profile.php?old=" + oldpass + "&np=" + newpass + "&rp=" + retypepass;
                var ajax = new XMLHttpRequest();
                ajax.open("GET", url, true);
                ajax.onreadystatechange = function () {
                    document.getElementById("msg_pass").innerHTML = ajax.responseText;
                }
                ajax.send();

            } else {
                alert('Password not Matched');
            }
        }

    </script>


</head>

<body class="hold-transition sidebar-mini">
    <!--preloader-->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="index-2.html" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <img src="assets/dist/img/mini-logo.png" alt="">
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
                <div class="header-icon">
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="header-title">
                    <h1>REBND Admin Dashboard</h1>
                </div>
            </section>
            <!-- Main content -->



            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-headshot">
                                    <img src="Profiles/<?php echo $User[7]; ?>" class="img-circle" width="81"
                                        height="81" alt="<?php echo $obUser[7]; ?>""></a>
                                </div>
                            </div>
                            <div class=" card-content">
                                    <div class="card-content-member text-center">
                                        <h4 class="m-t-0"><?php echo $User[3]; ?></h4>
                                        <p class="m-t-0"><?php echo $User[4]; ?></p>
                                    </div>
                                    <div class="card-content-languages">
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Mobile:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>
                                                        <?php echo $User[5]; ?>
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Date:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li> <?php echo $User[9]; ?></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content-summary">
                                        <p>Address : <?php echo $User[10]; ?></p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <?php
                        if ($obUser[1] == "admin" || $obUser[1] == "Admin") {
                        } else if ($obUser[1] == "vendor" || $obUser[1] == "Vendor") {
                        ?>

                    </div>
                    <?php
                        }
                        ?>
                </div>
            </section>
        </div>

        <?php
        include('webfooter.php');
        ?>

        <!-- Start Core Plugins
         =====================================================================-->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- jquery-ui -->
        <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- lobipanel -->
        <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <!-- Pace js -->
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">
        </script>
        <!-- FastClick -->
        <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- CRMadmin frame -->
        <script src="assets/dist/js/custom.js" type="text/javascript"></script>
        <!-- End Core Plugins
         =====================================================================-->
        <!-- Start Page Lavel Plugins
         =====================================================================-->
        <!-- ChartJs JavaScript -->
        <script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
        <!-- Counter js -->
        <script src="assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <!-- Monthly js -->
        <script src="assets/plugins/monthly/monthly.js" type="text/javascript"></script>
        <!-- End Page Lavel Plugins
         =====================================================================-->
        <!-- Start Theme label Script
         =====================================================================-->
        <!-- Dashboard js -->
        <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
        <!-- End Theme label Script
         =====================================================================-->

</body>



</html>