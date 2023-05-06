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
    <script type="text/javascript" src="jq.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnAddClick").click(function() {
                var cimag = $("#cimage").get(0).files;
                var cname = $("#cname").val();
                var vid = $("#vid").val();

                if (cname == "") {
                    return $("#error_name").html("Name REquired").css("color", "red");
                }
                var frm = new FormData();
                frm.append("cname", cname);
                frm.append("cimage", cimag[0]);
                frm.append("vid", vid);


                $.ajax({
                    url: "add_category.php",
                    data: frm,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        $("#tbl_rows").html(result);
                    },
                    error: function(error) {
                        $("#msg").html(error);
                    }
                });
            });

            // UpdateRow
            $("#btnchangeClick").click(function(e) {
                if (document.getElementById('chk').checked) {
                    var frm = new FormData();
                    var cimag = $("#uimage").get(0).files;
                    frm.append("cid", $('#uid').val());
                    frm.append("cname", $('#uname').val());
                    frm.append("cimage", cimag[0]);
                    frm.append("img_key", "yes");
                    frm.append("ddlvendor", $("#ddlvendor").val());
                    e.preventDefault();
                    $.ajax({
                        url: "update_category.php",
                        data: frm,
                        type: "POST",
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            $("#tbl_rows").html(result);
                            $('#uid').val();
                            $('#uname').val();
                            $('#update').modal('hide');

                            //alert('updated');
                        },
                        error: function(error) {
                            $("#umsg").html(error);
                        }
                    });
                } else {
                    var frm = new FormData();
                    var cimag = $("#uimage").get(0).files;
                    frm.append("cid", $('#uid').val());
                    frm.append("cname", $('#uname').val());
                    frm.append("cimage", cimag[0]);
                    frm.append("img_key", "No");
                    frm.append("ddlvendor", $("#ddlvendor").val());
                    e.preventDefault();
                    $.ajax({
                        url: "update_category.php",
                        data: frm,
                        type: "POST",
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            $("#tbl_rows").html(result);
                            $('#uid').val();
                            $('#uname').val();
                            $('#update').modal('hide');

                        },
                        error: function(error) {
                            $("#umsg").html(result);
                        }
                    });
                }
            });
        });
        function CallImagePreview(title) {
            document.getElementById("pre_img").src = title;
        }
        function Delete(title) {

            var IsDeleted = confirm("do you want to delete this (" + title + ") Row");
            if (IsDeleted == true) {
                var ajax = new XMLHttpRequest();
                ajax.open("GET", "delete_category.php?cid=" + title, true);
                //event used to access response from server
                ajax.onreadystatechange = function() {
                    $("#tbl_rows").html(ajax.responseText);
                }
                ajax.send();
            }
        }
        function Update(title) {
            var arr = title.split(',');
            $('#uid').val(arr[0]);
            $('#uname').val(arr[1]);
            $('#ddlvendor').val(arr[2]);
            $('#update').modal('show');
        }
        function SearchRecord(txt) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "search_category.php?search=" + txt, true);
            // now event used to access response from server
            ajax.onreadystatechange = function() {
                $("#tbl_rows").html(ajax.responseText);
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
    <!-- Site Wrapper -->
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
                                        <h4>Product Categories</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="btn-group">
                                    <div class="buttonexport">
                                        <a href="#" class="btn btn-add" data-toggle="modal" data-target="#addtask"><i class="fa fa-plus"></i> Create Category</a>
                                    </div>
                                </div>

                                <style>
                                    .active-cyan-4 input[type=text]:focus:not([readonly]) {
                                        border: 1px solid #4dd0e1;
                                        box-shadow: 0 0 0 1px #4dd0e1;
                                    }

                                </style>
                                 <div class="table-responsive">
                                    <span id="del_msg"></span>
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>Id</th>
                                                <th>Category Name</th>
                                                <th>Picture</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_rows">
                                            <?php

                                            include('db_connection.php');
                                                $obUser = $_SESSION['user'];
                                                $createdby = $obUser[2];

                                            $rows =  ExecuteQuery("SELECT * FROM tbl_category");
                                            while ($cell = mysqli_fetch_array($rows))
                                            {
                                                $cat = $cell[0].','.$cell[1].','.$cell[3];
                                                echo '<tr>
                                                        <td>' . $cell[0] . '</td>
                                                        <td>' . $cell[1] . '</td>
                                                        <td align="center"><img src="category/'.$cell[2].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="category/'.$cell[2].'" onClick="CallImagePreview(this.title)"><br>View</td>
                                                        <td>' . $cell[4] . '</td>

                                                        <td>
                                                            <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" class="btn btn-add btn-xs"><i class="fa fa-pencil"></i></button>

                                                            <button type="button" id="btnDeleteClick" title="'.$cell[0].'" onClick="Delete(this.title)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button>
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
                                <h3><i class="fa fa-plus m-r-5"></i> New Category</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="add_category.php" method="POST" enctype="multipart/form-data">
                                            <fieldset>

                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Category Id</label>
                                                    <input type="text" name="cid" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Vendor</label>
                                                    <select class="form-control" id="vid" name="vid">
                                                        <option>Select</option>
                                                        <?php
                                                            $rows =  ExecuteQuery("SELECT uid,name,email,contact FROM `tbl_users` WHERE role_id=3");
                                                            while ($cell = mysqli_fetch_array($rows))
                                                            {
                                                                $cat = $cell[0].','.$cell[1];
                                                                //$vendor = $cell[1].' ['.$cell[2].']'.' ['.$cell[3].']';
                                                                $vendor = $cell[1].' ['.$cell[2].']';
                                                                //$vendor = $cell[1];
                                                                echo '<option value="'.$cell[0].'">'.$vendor.'</option>';
                                                            }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Category Type</label>
                                                    <input type="text" id="cname" name="cname" class="form-control "><span id="error_name"></span>
                                                </div>
                                                <div class="col-md-6 form-group ">
                                                    <label class="control-label ">Image</label>
                                                    <input type="file" id="cimage" name="cimage" placeholder="status " class="form-control ">
                                                </div>
                                                <div class="col-md-12 form-group user-form-group ">
                                                    <div class="pull-right ">
                                                        <span id="msg">

                                                        </span>
                                                        <input type="button" value="Create" id="btnAddClick" class="btn btn-primary">
                                                        <button type="submit" name="btnUpdate" class="btn btn-add btn-sm ">Update</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
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
                <!-- /.modal -->
                <!-- Modal1 -->
                <div class="modal fade" id="update" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5"></i> Update Category</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="add_category.php" method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Vendor</label>
                                                    <select class="form-control" id="ddlvendor" name="ddlvendor">
                                                        <option>Select</option>
                                                        <?php
                                                            $rows =  ExecuteQuery("SELECT uid,name,email,contact FROM `tbl_users` WHERE role_id=3");
                                                            while ($cell = mysqli_fetch_array($rows))
                                                            {
                                                                $cat = $cell[0].','.$cell[1];
                                                                //$vendor = $cell[1].' ['.$cell[2].']'.' ['.$cell[3].']';
                                                                $vendor = $cell[1].' ['.$cell[2].']';
                                                                //$vendor = $cell[1];
                                                                echo '<option value="'.$cell[0].'">'.$vendor.'</option>';
                                                            }
                                                    ?>
                                                    </select>
                                                </div>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Category Id</label>
                                                    <input type="text" id="uid" name="uid" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">name</label>
                                                    <input type="text" id="uname" name="uname" class="form-control "><span id="uerror_name"></span>
                                                </div>
                                                <div class="col-md-6 form-group ">
                                                    <label class="control-label ">Image</label>
                                                    <input type="file" id="uimage" name="uimage" placeholder="status " class="form-control ">
                                                </div>
                                                <div class="col-md-6 form-group ">
                                                    <input type="checkbox" id="chk" name="chk" class="form-control-sm"> Do you want to change Image then Tick.
                                                </div>

                                                <div class="col-md-12 form-group user-form-group ">
                                                    <div class="pull-right ">
                                                        <span id="umsg">

                                                        </span>
                                                        <input type="button" onclick="UpdateQuery()" value="Update Now" id="btnchangeClick" class="btn btn-primary">

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

                <div class="modal fade" id="update_pre" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5"></i>Category Image Preview</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="#" id="pre_img" width="560" height="350">
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
