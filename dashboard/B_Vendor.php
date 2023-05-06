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
    <link rel="shortcut icon" href="../images/log2.png" type="image/x-icon">
    <?php
    include('HeaderNavigationLinks.php');
    ?>
    <script>
        function editRole(uid) 
        {
            var vendor = document.getElementById("sp_id_"+uid).innerHTML;
            var arr = vendor.split(',');
            document.getElementById('uid').value = arr[0];
            document.getElementById('user').value = arr[1];
            document.getElementById('email').value = arr[2];
            document.getElementById('contact').value = arr[3];
            document.getElementById('uname').value =  arr[2];
            document.getElementById('password').value = arr[4];
            document.getElementById('address').value = arr[5];
            // show Update btn
            document.getElementById('Update').style.display="block";
            document.getElementById('Register').style.display="none";
        }
        function AddRole() 
        {
            document.getElementById('uid').value = "";
            document.getElementById('user').value = "";
            document.getElementById('email').value = "";
            document.getElementById('contact').value = "";
            document.getElementById('uname').value = "";
            document.getElementById('password').value = "";
            document.getElementById('address').value = "";
            $('#addtask').show();
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
                            <div class="buttonexport">
                                        <a href="#" class="btn btn-add" data-toggle="modal" data-target="#addtask"><i class="fa fa-plus">
                                        </i> Create Vendor</a>
                                    </div>
                                <div class="btn-group" id="buttonexport">
                                    <a href="#">
                                        <h4>Vendor List</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                    <button style="display:none" class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Download List</button>
                                </div>
                                <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>uid</th>
                                                <th>Role</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Username</th>
                                                <th>Profile</th>
                                                <th>Logo</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('db_connection.php');
                                            $rows =  ExecuteQuery("SELECT 
                                                  tbl_role.rid,
                                                  tbl_role.name,
                                                  tbl_users.uid,
                                                  tbl_users.name,
                                                  tbl_users.email,
                                                  tbl_users.contact,
                                                  tbl_users.username,
                                                  tbl_users.password,
                                                  tbl_users.address,
                                                  tbl_users.picture,
                                                  tbl_users.logo,
                                                  tbl_users.status,
                                                  tbl_users.createddate
                                                  from tbl_role
                                                  inner join tbl_users on tbl_users.role_id = tbl_role.rid
                                                  where tbl_role.name = 'vendor' and tbl_users.status='active'");
                                            while ($cell = mysqli_fetch_array($rows)) {
                                            //$roleinfo = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[6].','.$cell[7].','.$cell[8].','.$cell[9].','.$cell[10].','.$cell[11].','.$cell[12];
                                           $roleinfo = $cell['uid'].','.$cell['name'].','.$cell['email'].','.$cell['contact'].','.$cell['password'].','.$cell['address'];
                                           echo '<span id="sp_id_'.$cell['uid'].'" style="display:none">'.$roleinfo.'</span><tr>
                                                        <td>' . $cell[2] . '</td>
                                                        <td>' . $cell[1] . '</td>
                                                        <td>' . $cell[3] . '</td>
                                                        <td>' . $cell[4] . '</td>
                                                        <td>' . $cell[5] . '</td>
                                                        <td>' . $cell[6] . '</td>
                                                        <td><img src="Profiles/'.$cell['picture'].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="Profiles/'.$cell[9].'" onClick="CallImagePreview(this.title)"></td>
                                                        <td><img src="Profiles/'.$cell['logo'].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="logo" onClick="CallImagePreview(this.title)"></td>
                                                        <td>' . $cell['status'] . '</td>
                                                        <td>' . $cell['createddate'] . '</td>
                                                        <td>
                                                            <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#addtask" title='.$roleinfo.' onclick="editRole('.$cell['uid'].')"><i class="fa fa-pencil"></i> Edit</button>
                                                            <a href="delete_vendor.php?q='.$cell[2].'" class="btn btn-add btn-xs"><i class="fa fa-pencil"></i> Delete</a>
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
                <div class="modal fade" id="addtask" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <div class="panel-heading">
                                    <div class="view-header">
                                        <div class="header-icon">
                                            <i class="pe-7s-unlock"></i>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <div class="header-title">
                                            <h3 id="">Register</h3>

                                            <small><strong>Please enter vendor data to register.</strong></small>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 0px;" class="container-center lg">
                                    <div class="login-area">


                                        <div class="panel-body">

                                            <form action="Vendor_CustomerRegister.php" id="loginForm" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label>Select</label>
                                                        <select class="form-control" name="rid">
                                                            <?php
                                  
                                                                $rows = mysqli_query($con, "select * from tbl_role where name='Vendor' or name='vendor'");
                                                                while ($c = mysqli_fetch_array($rows)) {
                                                                    echo '<option   value=' . $c[0] . '>' . $c[1] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                        <span class="help-block small"></span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Name</label>
                                                        <input type="text" value="" id="user" name="user" class="form-control">
                                                        <span class="help-block small">Vendor Name </span>

                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label>Email</label>
                                                        <input type="text" value="" id="email" name="email" class="form-control" required>
                                                        <span class="help-block small">Vendor email address </span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Contact</label>
                                                        <input type="number" value="" id="contact" class="form-control" name="contact"><span id="error_name"></span>
                                                        <span class="help-block small">Vendor contact number</span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>User Name</label>
                                                        <input type="text" name="uname" id="uname" class="form-control" required>
                                                        <span class="help-block small">Vendor username for login</span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label> Password</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <span class="help-block small">Vendor password for login</span>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Address</label>
                                                        <input type="text" name="address" id="address" class="form-control" required>
                                                        <span class="help-block small">Vendor Address</span>
                                                        <input type="hidden" name="uid" id="uid" class="form-control">
                                                    </div>
                                                    <div style="clear:both">

                                                    </div>
                                                    <div style="text-align: center">
                                                        <input style="margin-left: 20px ;" type="submit" value="Register" name="Register" id="Register" class="btn btn-primary">
                                                        <input style="margin-left: 20px ;display:none" type="submit" value="Update" id="Update" name="Update" class="btn btn-success" >
                                                        <input style="margin-left: 20px ;display:none" type="submit" value="Delete" name="Delete" class="btn btn-danger">
                                                    </div>
                                                    <br>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>


                   <!--Update-->                                                 

                   <div class="modal fade" id="updateaddtask" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <div class="panel-heading">
                                    <div class="view-header">
                                        <div class="header-icon">
                                            <i class="pe-7s-unlock"></i>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <div class="header-title">
                                            <h3 id="">Update Vendor</h3>

                                            <small><strong>Update Vendor Information.</strong></small>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 0px;" class="container-center lg">
                                    <div class="login-area">


                                        <div class="panel-body">

                                            <form action="Vendor_CustomerRegister.php" id="loginForm" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label>Select</label>
                                                        <select class="form-control" name="rid">
                                                            <?php
                                  
                                                                $rows = mysqli_query($con, "select * from tbl_role where name='Vendor' or name='vendor'");
                                                                while ($c = mysqli_fetch_array($rows)) {
                                                                    echo '<option   value=' . $c[0] . '>' . $c[1] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                        <span class="help-block small"></span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Name</label>
                                                        <input type="text" value="" id="user" name="user" class="form-control">
                                                        <span class="help-block small">Vendor Name </span>

                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label>Email</label>
                                                        <input type="text" value="" id="email" name="email" class="form-control" required>
                                                        <span class="help-block small">Vendor email address </span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Contact</label>
                                                        <input type="number" value="" id="contact" class="form-control" name="contact"><span id="error_name"></span>
                                                        <span class="help-block small">Vendor contact number</span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>User Name</label>
                                                        <input type="text" name="uname" id="uname" class="form-control" required>
                                                        <span class="help-block small">Vendor username for login</span>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label> Password</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <span class="help-block small">Vendor password for login</span>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Address</label>
                                                        <input type="text" name="address" id="address" class="form-control" required>
                                                        <span class="help-block small">Vendor Address</span>
                                                        <input type="hidden" name="uid" id="uid" class="form-control">
                                                    </div>
                                                    <div style="clear:both">

                                                    </div>
                                                    <div style="text-align: center">
                                                        <input style="margin-left: 20px ;" type="submit" value="Register" name="Register" class="btn btn-primary">
                                                        <input style="margin-left: 20px ;display:none" type="submit" value="Update" name="Update" class="btn btn-success" >
                                                        <input style="margin-left: 20px ;display:none" type="submit" value="Delete" name="Delete" class="btn btn-danger">
                                                    </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

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

            <div class="modal fade" id="update_pre" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-dropbox m-r-5"></i>Vendor Profile</h3>
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
                </div>
            </div>
        </div>
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
