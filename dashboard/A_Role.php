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
        function editRole(roleInfo) {
            var arr = roleInfo.split(',');
            document.getElementById('cid').value = arr[0];
            document.getElementById('cname').value = arr[1];
        }

        function AddRole() {
            document.getElementById('cid').value = "";
            document.getElementById('cname').value = "";
            $('#addtask').show();
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
                                <div class="btn-group" id="buttonexport">
                                    <a href="#">
                                        <h4>Role List</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="btn-group">
                                    <div class="buttonexport">
                                        <a href="#" class="btn btn-add" data-toggle="modal" data-target="#addtask" onclick="AddRole()"><i class="fa fa-plus"></i> Create Role</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>Role Id</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('db_connection.php');
                                            $rows =  ExecuteQuery("SELECT * FROM tbl_role where name!='Admin' or name!='admin'");
                                            while ($cell = mysqli_fetch_array($rows)) {
                                                $roleinfo = $cell[0].','.$cell[1];
                                                echo '<tr>
                                                        <td>' . $cell[0] . '</td>
                                                        <td>' . $cell[1] . '</td>
                                                        <td>
                                                            <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#addtask" title='.$roleinfo.' onclick="editRole(this.title)"><i class="fa fa-pencil"></i> Action</button>
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
                <div class="modal fade" id="addtask" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5"></i><span id="lbltitle"> User RoleType</span></h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="add_Role.php" method="POST">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Role Id</label>
                                                    <input type="text" name="cid" class="form-control" id="cid" readonly>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Role Name</label>
                                                    <input type="text" name="cname" class="form-control" id="cname">
                                                </div>

                                                <div class="col-md-12 form-group user-form-group ">
                                                    <div class="pull-right ">
                                                        <input type="submit" value="Create" class="btn btn-primary" id="btnAdd" name="btnAdd">
                                                        <button type="submit " class="btn btn-add btn-sm" id="btnupdate" name="btnupdate">Update</button>
                                                        <button type="submit " class="btn btn-danger btn-sm" id="btnDelete" name="btnDelete">Delete</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include('webfooter.php');
        ?>
    </div>
    <script src="assets/plugins/jQuery/jquery-1.12.4.min.js " type="text/javascript "></script>
    <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js " type="text/javascript "></script>
    <script src="assets/bootstrap/js/bootstrap.min.js " type="text/javascript "></script>
    <script src="assets/plugins/lobipanel/lobipanel.min.js " type="text/javascript "></script>
    <script src="assets/plugins/pace/pace.min.js " type="text/javascript "></script>
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js " type="text/javascript ">
    </script>
    <script src="assets/plugins/fastclick/fastclick.min.js " type="text/javascript "></script>
    <script src="assets/dist/js/custom.js " type="text/javascript "></script>
    <script src="assets/plugins/chartJs/Chart.min.js " type="text/javascript "></script>
    <script src="assets/plugins/counterup/waypoints.js " type="text/javascript "></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js " type="text/javascript "></script>
    <script src="assets/plugins/monthly/monthly.js " type="text/javascript "></script>
    <script src="assets/dist/js/dashboard.js " type="text/javascript "></script>
</body>
</html>
