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
    <script>
        function SetupRider(title) {
            document.getElementById('OI_Customer').value = title;
            document.getElementById('dialog_title').innerHTML = '<i class="fa fa-plus m-r-5"></i>Accept Order';
            document.getElementById('btnAccept').style.display = "block";
            document.getElementById('btnDelivered').style.display = "none";
            document.getElementById('btnCancelled').style.display = "none";
            document.getElementById('btnRecieved').style.display = "none";
        }
        function DeliveredOrdered(title) 
        {
            document.getElementById('OI_Customer').value = title;
            document.getElementById('dialog_title').innerHTML = '<i class="fa fa-plus m-r-5"></i>Deliver Order';
            document.getElementById('btnAccept').style.display = "none";
            document.getElementById('btnDelivered').style.display = "block";
            document.getElementById('btnCancelled').style.display = "none";
            document.getElementById('btnRecieved').style.display = "none";
          
        }

        function RecievedOrdered(title) {
            document.getElementById('OI_Customer').value = title;
            document.getElementById('dialog_title').innerHTML = '<i class="fa fa-plus m-r-5"></i>Recieve Order';
            document.getElementById('btnAccept').style.display = "none";
            document.getElementById('btnDelivered').style.display = "none";
            document.getElementById('btnCancelled').style.display = "none";
            document.getElementById('btnRecieved').style.display = "block";
        }

        function CancelledOrdered(title) {
            document.getElementById('OI_Customer').value = title;
            document.getElementById('btnAccept').style.display = "none";
            document.getElementById('btnDelivered').style.display = "none";
            document.getElementById('btnCancelled').style.display = "block";
            document.getElementById('btnRecieved').style.display = "none"
            document.getElementById('btnRecieved').style.display = "none";
        }

        function SetupCancel(title) {
            //document.getElementById('invoice_id').value = title;
            alert(title);
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "OrderCancelByVendor.php?invoice=" + title, true);
            ajax.onreadystatechange = function() {
                document.getElementById("re").innerHTML = ajax.responseText;
            }
            ajax.send();
        }

        function GetRiderOrderCustomerDetail(title) 
        {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "RiderOrderCustomer.php?invoice=" + title, true);
            ajax.onreadystatechange = function() {
                document.getElementById("fieldset_rider_order_info").innerHTML = ajax.responseText;
            }
            ajax.send();
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
            <a href="index.php" class="logo">
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
                                        <h4>Orders List</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>Order Id </th>
                                                <th>Order Date</th>
                                                <th>Invoice</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="re">
                                            <?php
                                                include('db_connection.php');
                                                $obUser    = $_SESSION['user'];
                                                $query_dt ="";
                                                if($obUser[0]==3)
                                                {
                                                    $query_dt ="SELECT tbl_order.orderid , tbl_order.orderdate, tbl_order.invoice, tbl_order.amount, tbl_orderitems.amount as 'TAmount', tbl_order.status 
                                                    from tbl_order 
                                                    INNER JOIN tbl_orderitems on tbl_orderitems.invoice = tbl_order.invoice 
                                                    where tbl_orderitems.ordergeneratedby='".$obUser[2]."'
                                                    ORDER by invoice DESC";
                                                }
                                                else
                                                {
                                                    $query_dt = "SELECT tbl_order.orderid , tbl_order.orderdate, tbl_order.invoice, tbl_order.amount, tbl_orderitems.amount as 'TAmount', tbl_order.status 
                                                    from tbl_order 
                                                    INNER JOIN tbl_orderitems on tbl_orderitems.invoice = tbl_order.invoice 
                                                    ORDER by invoice DESC
                                                    ";
                                                }
                                                $rows =  ExecuteQuery($query_dt);
                                                while ($cell = mysqli_fetch_array($rows))
                                                {
                                                $order_detail = $cell[2];
                                                if($cell[5] == "Accepted")
                                                {
                                                    echo '<tr>
                                                    <td>' . $cell['orderid'] . '</td>
                                                    <td>' . $cell['orderdate'] . '</td>
                                                    <td>' . $cell['invoice'] . '</td>
                                                    <td>' . $cell['TAmount'] . '</td>
                                                    <td>' . $cell['status'] . '</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addtask" title="'.$cell[2].'" onclick="DeliveredOrdered(this.title)">Deliver Order to Customer</a>
                                                        </td>
                                                   </tr>';
                                                }
                                                if($cell[5] == "Delivered")
                                                {
                                                    echo '<tr>
                                                    <td>' . $cell[0] . '</td>
                                                    <td>' . $cell[1] . '</td>
                                                    <td>' . $cell[2] . '</td>
                                                <!--    <td>' . $cell[3] . '</td>-->
                                                    <td>' . $cell[4] . '</td>
                                                    <td>' . $cell[5] . '</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addtask" title="'.$cell[2].'" onclick="RecievedOrdered(this.title)">Recieved Order</a>
                                                    </td>
                                                   </tr>';
                                                }
                                                if($cell[5] == "Recieved")
                                                {
                                                    echo '<tr>
                                                    <td>' . $cell[0] . '</td>
                                                    <td>' . $cell[1] . '</td>
                                                    <td>' . $cell[2] . '</td>
                                                <!--    <td>' . $cell[3] . '</td>-->
                                                    <td>' . $cell[4] . '</td>
                                                    <td> Customer ' . $cell[5] . '</td>
                                                    <td>
                                                        Success | 
                                                        <a data-toggle="modal" data-target="#viewrider" title='.$cell[2].' onclick="GetRiderOrderCustomerDetail(this.title)" href="#">View</a>
                                                    </td>
                                                   </tr>';
                                                }
                                                else if($cell[5] == "Ordered")
                                                {
                                                    $order_detail_cancel = $cell[2]; 

                                                    echo '<tr>
                                                    <td>' . $cell[0] . '</td>
                                                    <td>' . $cell[1] . '</td>
                                                    <td>' . $cell[2] . '</td>
                                                <!--    <td>' . $cell[3] . '</td>-->
                                                    <td>' . $cell[4] . '</td>
                                                    <td>' . $cell[5] . '</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-xs" title="'.$cell[2].'" data-toggle="modal" data-target="#addtask" onclick="SetupRider(this.title)">Accept Order</a>
                                                        <a href="#" class="btn btn-primary btn-xs" title="'.$cell[2].'" data-toggle="modal" data-target="#addtask" onclick="CancelledOrdered(this.title)">Cancel Order</a>
                                                    </td>
                                                   </tr>';
                                                }
                                                else if($cell[5] == "Cancelled")
                                                {
                                                    echo '<tr>
                                                    <td>' . $cell[0] . '</td>
                                                    <td>' . $cell[1] . '</td>
                                                    <td>' . $cell[2] . '</td>
                                                <!--    <td>' . $cell[3] . '</td>-->
                                                    <td>' . $cell[4] . '</td>
                                                    <td>' . $cell[5] . '</td>
                                                    <td>
                                                        <a href="#">Order was Cancelled</a>
                                                    </td>
                                                   </tr>';
                                                }
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
                <div class="modal fade" id="addtask" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="dialog_title"><i class="fa fa-plus m-r-5"></i>Accept Order</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="order_option.php" method="POST">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Order Invoice</label>
                                                    <input type="text" readonly id="OI_Customer" name="OI_Customer" class="form-control">
                                                </div>
                                                <div class="col-md-12 form-group user-form-group">
                                                    <div class="pull-right">
                                                        <button type="submit" name="btnAccept" id="btnAccept" class="btn btn-add btn-sm" style="display:none">Accept Order</button>
                                                        <button type="submit" name="btnDelivered" id="btnDelivered" class="btn btn-add btn-sm">Deliver Order</button>
                                                        <button type="submit" name="btnRecieved" id="btnRecieved" class="btn btn-add btn-sm">Recieved Order</button>

                                                        <button type="submit" name="btnCancelled" id="btnCancelled" class="btn btn-danger btn-sm">Cancel Order</button>

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
                <!-- Modal1 -->
                <div class="modal fade" id="update" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5"></i> Update Info</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Task Name</label>
                                                    <input type="text" placeholder="Task Name" class="form-control">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Due date</label>
                                                    <input type="number" placeholder="Due title" class="form-control">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" placeholder="Description" class="form-control">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Assign to</label>
                                                    <input type="text" placeholder="Assign to" class="form-control">
                                                </div>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">status</label>
                                                    <input type="text" placeholder="status" class="form-control">
                                                </div>
                                                <div class="col-md-12 form-group user-form-group">
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                        <button type="submit" class="btn btn-add btn-sm">Update</button>
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
                <div class="modal fade" id="viewrider" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5"></i>Customer and Invoice Information</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="add_category.php" method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="table-responsive">
                                                    <table id="fieldset_rider_order_info" class="table table-bordered table-striped table-hover">
                                                    </table>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
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
