<h1>
    <?php
    session_start();
    include('db_connection.php');
    $obUser    = $_SESSION['user'];
    $createdby = $obUser[2];
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
     <link rel="shortcut icon" href="../images/log2.png" type="image/x-icon">
        <?php
        include('HeaderNavigationLinks.php');
        ?>
        <script>
            function Delete(CusId) {
                var arr = CusId.split(',');
                document.getElementById('customer_id').value = arr[0];
                document.getElementById('customer_info').innerHTML = arr[1] + '<br>' + arr[2];
                $('#delt').show('show');
            }
            function DeleteCustomer() {
                var ajax = new XMLHttpRequest();
                var cid = document.getElementById('customer_id').value;
                ajax.open("GET", "deleteCustomer.php?q=" + cid, true);
                ajax.onreadystatechange = function() {
                    alert(ajax.responseText);
                }
                ajax.send();
                location.reload();
            }
            function CallImagePreview(title) {
                document.getElementById("pre_img").src = title;
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
                                            <h4>Customer List <!--of (<?php echo $obUser[3] ?>)--></h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                            <thead style="font-size:12px">
                                                <tr class="info">
                                                    <th>uid</th>
                                                    <th>UserType</th>
                                                    <th>Customer Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px">
                                                <?php
                                             
                                                $query_dt ="";
                                                    $query_dt ="SELECT tbl_users.uid, tbl_role.name as 'UserType', tbl_users.name as 'CustomerName', tbl_users.email, tbl_users.contact, tbl_users.username, tbl_users.picture, tbl_users.status, tbl_users.createddate 
                                                    from tbl_role 
                                                    inner join tbl_users on tbl_users.role_id = tbl_role.rid 
                                                    where tbl_role.name='Customer'
                                                   ";
                                                $rows =  ExecuteQuery($query_dt);
                                                while ($cell = mysqli_fetch_array($rows)) {
                                                    $cus_info = $cell[0].','.$cell[2].','.$cell[3];
                                                // <td valign="middle"><img src="Profiles/'.$cell[6].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="Profiles/'.$cell[6].'" onClick="CallImagePreview(this.title)"></td>
                                                    echo '
                                                <tr>
                                                    <td valign="middle">' . $cell[0] . '</td>
                                                    <td valign="middle">' . $cell[1] . '</td>
                                                    <td valign="middle">' . $cell[2] . '</td>
                                                    <td valign="middle">' . $cell[3] . '</td>
                                                    <td valign="middle">' . $cell[4] . '</td>
                                                    <td valign="middle">' . $cell[5] . '</td>
                                                    <td valign="middle">' . $cell[7] . '</td>
                                                    <td valign="middle">' . $cell[8] . '</td>
                                                    <td valign="middle">
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt" title='.$cus_info.' onclick="Delete(this.title)"><i class="fa fa-trash-o"></i> </button>
                                                    </td>
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
                                    <h3><i class="fa fa-user m-r-5"></i> Delete</h3>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal">
                                                <fieldset>
                                                    <div class="col-md-12 form-group user-form-group">
                                                        <label class="control-label">Delete Customer</label>
                                                        <h5 id="customer_info"></h5>
                                                        <input type="hidden" id="customer_id">
                                                        <div class="pull-right">
                                                            <button type="submit" class="btn btn-success btn-sm" onclick="DeleteCustomer()">YES</button>
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
                      
                        </div>
                  
                    </div>
      
                </section>
                <div class="modal fade" id="update_pre" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-dropbox m-r-5"></i>Customer Profile</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="#" id="pre_img" width="560" height="450">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-danger pull-left " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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
</h1>
