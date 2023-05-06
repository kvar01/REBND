<?php
session_start();
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
            <a href="index.php#" class="logo">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="fa fa-desktop"></i>
                </div>
                <div class="header-title">
                    <h1>REBND Admin Dashboard</h1>
                </div>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidisable">
                            <div class="panel-heading">
                                <div class="btn-group" id="buttonexport">
                                    <a href="#">
                                        <h4>Order History</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>OID</th>
                                                <th>invoice</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th>Customer</th>
                                                <th>date</th>
                                                <th>Status</th>
                                                <th>Vendor</th>
                                                <th>Issue Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            include('db_connection.php');
                                            $obUser    = $_SESSION['user'];
                                            $createdby = $obUser[2];
                                            $query_dt ="";
                                            if($obUser[0] == 3)
                                            {
                                                $query_dt = "SELECT
                                                tbl_orderitems.orderitemid,
                                                tbl_orderitems.invoice,
                                                tbl_items.itemname,
                                                tbl_orderitems.price,
                                                tbl_orderitems.qty,
                                                tbl_orderitems.amount,
                                                U.name as 'Customer',
                                                tbl_orderitems.orderitemdate,
                                                tbl_orderitems.status,
                                                shop.name as 'Shop',
                                                tbl_orderitems.ordercreateddate
                                                from tbl_orderitems
                                                INNER join tbl_users U on U.uid = tbl_orderitems.customerid
                                                INNER JOIN tbl_users shop on shop.uid = tbl_orderitems.ordergeneratedby
                                                INNER JOIN tbl_items on tbl_items.id = tbl_orderitems.itemid
                                                where tbl_orderitems.ordergeneratedby='".$obUser[2]."'";
                                            }
                                            else
                                            {
                                                $query_dt = "SELECT
                                                tbl_orderitems.orderitemid,
                                                tbl_orderitems.invoice,
                                                tbl_items.itemname,
                                                tbl_orderitems.price,
                                                tbl_orderitems.qty,
                                                tbl_orderitems.amount,
                                                U.name as 'Customer',
                                                tbl_orderitems.orderitemdate,
                                                tbl_orderitems.status,
                                                shop.name as 'Shop',
                                                tbl_orderitems.ordercreateddate
                                                from tbl_orderitems
                                                INNER join tbl_users U on U.uid = tbl_orderitems.customerid
                                                INNER JOIN tbl_users shop on shop.uid = tbl_orderitems.ordergeneratedby
                                                INNER JOIN tbl_items on tbl_items.id = tbl_orderitems.itemid";
                                            }
                                            $rows =  ExecuteQuery($query_dt);
                                            while ($cell = mysqli_fetch_array($rows)) {
                                                echo '<tr>
                                                                 <td>' . $cell[0] . '</td>
                                                                 <td>' . $cell[1] . '</td>
                                                                 <td>' . $cell[2] . '</td>
                                                                 <td>' . $cell[3] . '</td>
                                                                 <td>' . $cell[4] . '</td>
                                                                 <td>' . $cell[5] . '</td>
                                                                 <td>' . $cell[6] . '</td>
                                                                 <td>' . $cell[7] . '</td>
                                                                 <td>' . $cell[8] . '</td>
                                                                 <td>' . $cell[9] . '</td>
                                                                 <td>' . $cell[10] . '</td>
                                                        </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal1 -->
                <!-- /.modal -->
                <!-- delete user Modal2 -->
                <div class="modal fade" id="delt" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5"></i> Delete task</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <div class="col-md-12 form-group user-form-group">
                                                    <label class="control-label">Delete task</label>
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-danger btn-sm">NO</button>
                                                        <button type="submit" class="btn btn-success btn-sm">YES</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
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
