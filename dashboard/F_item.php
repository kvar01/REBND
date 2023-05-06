
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
    <link rel="shortcut icon" href="../images//log2.png" type="image/x-icon">
    <?php
    include('HeaderNavigationLinks.php');
    ?>
 
<script type="text/javascript" src="jq.js"></script>
<script>
    $(document).ready(function()
    {
        $("#btnAddClick").click(function()
        {
            var cimag = $("#iimage").get(0).files;
            var name = $("#iname").val();
            var price = $("#pname").val();
            var quantity = $("#qname").val();
            var status = $("#istatus").val();
            var cat_id = $("#cid").val();
            var vid_id = $("#vid").val();
            var i_desc = $("#desc").val();
            if(vid_id == "")
            {
                    return  $("#error_vendor").html("Vendor Required").css("color","red");
            }
            if(name == "")
            {
                    return  $("#error_name").html("Name REquired").css("color","red");
            }
            if(price == "")
            {
                    $("#error_name").hide();
                    return  $("#error_pname").html("Price Required").css("color","red");
            }
            if(quantity == "")
            {
                    $("#error_pname").hide();
                    return  $("#error_qname").html("Quantity Required").css("color","red");
            }
            if(i_desc=="")
            {
                $("#error_pname").hide();
                    return  $("#error_desc").html("Item Description required").css("color","red");
            }

            var frm = new FormData();
            frm.append("iname",name);
            frm.append("pname",price);
            frm.append("qname",quantity);
            frm.append("status",status); 
            frm.append("cid",cat_id);
            frm.append("iimage",cimag[0]);
            frm.append("vid_add",vid_id);            
            frm.append("i_desc",$("#desc").val());
            $.ajax(
                {
                    url:"add_item.php",
                    data:frm,
                    type:"POST",
                    processData:false,
                    contentType:false,
                    success:function(result)
                    {
                        $("#tbl_rows").html(result);
                        //$('#addtask').modal('hide');

                    },
                    error: function(error)
                    {
                        $("#msg").html(error);
                    }
                });
        });
        // UpDateRow after insert into database 
        $("#btnchangeClick").click(function(e)
        {
                if(document.getElementById('chk').checked)
                {
                    var frm = new FormData();
                    var cimag = $("#item_image").get(0).files;
                    frm.append("item_id",$('#item_id').val());
                    frm.append("item_name",$('#item_name').val());
                    frm.append("item_price",$('#item_price').val());
                    frm.append("item_qty",$('#item_qty').val());
                    frm.append("item_cid",$('#item_cid').val());
                    frm.append("item_status",$('#item_status').val());
                    frm.append("item_desc_",$('#item_desc_').val());
                    frm.append("vid_add",$("#vider").val());
                    frm.append("cimage",cimag[0]);
                    frm.append("img_key","yes");
                    e.preventDefault();
                    $.ajax(
                        {
                            url:"update_item.php",
                            data:frm,
                            type:"POST",
                            processData:false,
                            contentType:false,
                            success:function(result)
                            {
                                    $("#tbl_rows").html(result);
                                    $('#update').modal('hide');
                            },
                            error: function(error)
                            {
                                $("#umsg").html(error);
                            }
                        });
                }
                else{
                 var frm = new FormData();
                    var frm = new FormData();
                    var cimag = $("#item_image").get(0).files;
                    frm.append("item_id",$('#item_id').val());
                    frm.append("item_name",$('#item_name').val());
                    frm.append("item_price",$('#item_price').val());
                    frm.append("item_qty",$('#item_qty').val());
                    frm.append("item_cid",$('#item_cid').val());
                    frm.append("item_status",$('#item_status').val());
                    frm.append("item_desc_",$('#item_desc_').val());
                    frm.append("vid_add",$("#vider").val());
                    frm.append("cimage",cimag[0]);
                    frm.append("img_key","No");
                 
                    e.preventDefault();
                    $.ajax(
                        {
                            url:"update_item.php",
                            data:frm,
                            type:"POST",
                            processData:false,
                            contentType:false,
                            success:function(result)
                            {
                                $("#tbl_rows").html(result);
                                $('#update').modal('hide');
                            },
                            error: function(error)
                            {
                                $("#umsg").html(result);
                            }
                        });
                }
        });
    });
    function CallImagePreview(title)
    {
        document.getElementById("pre_img").src=title;
    }
    function Delete(title)
    {
        var IsDeleted = confirm("do you want to delete this ("+title+") Row");
        if(IsDeleted == true)
        {
                var ajax = new XMLHttpRequest();
                ajax.open("GET","delete_item.php?cid="+title,true);
                // now event used to access response from server
                ajax.onreadystatechange=function()
                {
                    $("#tbl_rows").html(ajax.responseText);
                }
                ajax.send();
        }
    }
    function Update(title)
    {
       var arr = title.split(',');
        $('#vider').val(arr[6]);
        $('#item_status').val(arr[7]);
        $('#item_id').val(arr[0]);
        $('#item_cid option[value='+arr[1]+']').attr('selected','selected');
        $('#item_name').val(arr[2]);
        $('#item_price').val(arr[3]);
        $('#item_qty').val(arr[4]);
        $('#item_desc_').val(arr[8]); //Qasim
        $('#item_image').val(arr[5]);
        $('#update').modal('show');
    }
    //search code here
    function SearchRecord(txt)
    {
            var ajax = new XMLHttpRequest();
                ajax.open("GET","search_item.php?search="+txt,true);
                // now event used to access response from server
                ajax.onreadystatechange=function()
                {
                    $("#tbl_rows").html(ajax.responseText);
                }
                ajax.send();
    }
    function CallImagePreview(title)
    {
        document.getElementById("pre_img").src=title;
    }
    function GetCategories(vid)
    {
        var ajax = new XMLHttpRequest();
        ajax.open("GET","access_category.php?search="+vid,true);
        ajax.onreadystatechange=function()
        {
            document.getElementById("bbbc").innerHTML = ajax.responseText;
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
                                        <h4>Product Inventory</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="btn-group">
                                    <div class="buttonexport">
                                        <a href="#" class="btn btn-add" data-toggle="modal" data-target="#addtask"><i class="fa fa-plus"></i> Create Item</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>Id</th>
                                                <th>Category Id</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Image</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_rows">
                                            <?php
                                            include('db_connection.php');
                                            $obUser    = $_SESSION['user'];
                                            $createdby = $obUser[2];
                                            $rows =  ExecuteQuery("SELECT

                                                                           tbl_items.id,
                                                                           tbl_items.category_id,
                                                                           tbl_items.itemname,
                                                                           tbl_items.price,
                                                                           tbl_items.qty,
                                                                           tbl_items.picture,
                                                                           tbl_items.createdby,
                                                                           tbl_items.createddate,
                                                                           tbl_items.status,
                                                                           tbl_items.description
                                                                        from tbl_items
                                                                        ");
                                            while ($cell = mysqli_fetch_array($rows))
                                            {
                                                //$cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[8];
                                                $cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[6].','.$cell[8].','.$cell[9];
                                                
                                                echo '<tr>
                                                                 <td>' . $cell[0] . '</td>
                                                                 <td>' . $cell[1] . '</td>
                                                                 <td>' . $cell[2] . '</td>
                                                                 <td>' . $cell[3] . '</td>
                                                                 <td>' . $cell[4] . '</td>
                                                                 <td><img src="item/'.$cell[5].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="item/'.$cell[5].'" onClick="CallImagePreview(this.title)"></td>
                                                                 <td>' . $cell[6] . '</td>
                                                                 <td>' . $cell[7] . '</td>
                                                                 <td>' . $cell[8] . '</td>

                                                        <td>
                                                            <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" data-toggle="modal" data-target="#update"  class="btn btn-add btn-xs"> <i class="fa fa-pencil"></i></button>

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
                                <h3><i class="fa fa-plus m-r-5"></i> New Item</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="col-md-6 form-group" style="display:block">
                                                    <label class="control-label">Vendor</label>
                                                    <select class="form-control" id="vid" name="vid" onchange="GetCategories(this.value)">
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
                                                    <span id="error_vendor"></span>
                                                </div>
                                                <div class="col-md-6 form-group" id="bbbc">
                                                    
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" id="cid" name="cid">
                                                        <option>Select</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Item</label>
                                                    <input type="text" name="iname" id="iname" class="form-control ">
                                                    <span id="error_name"></span>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label class="control-label">Price</label>
                                                    <input type="text" id="pname" name="pname" class="form-control ">
                                                    <span id="error_pname"></span>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label class="control-label">Quantity</label>
                                                    <input type="text" id="qname" name="qname" class="form-control ">
                                                    <span id="error_qname"></span>
                                                </div>

                                                <div class="col-md-6 form-group ">
                                                    <label class="control-label ">Image</label>
                                                    <input type="file" name="iimage" id="iimage" placeholder="status " class="form-control ">
                                                    <span id="error_image"></span>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" id="istatus">
                                                        <option>Select</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                    <span id="error_status"></span>
                                                </div>

                                                <div class="col-md-12 form-group">
                                                <label class="control-label ">Description</label>
                                                    <input type="text" name="desc" id="desc" placeholder="Description Required " class="form-control ">
                                                    <span id="error_desc"></span>
                                             </div>

                                                <div class="col-md-12 form-group user-form-group ">
                                                    <div class="pull-right ">
                                                        <input type="button" value="Create" class="btn btn-primary" id="btnAddClick">
                                                        <button type="submit " class="btn btn-add btn-sm ">Update</button>
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
                <div class="modal fade" id="update" tabindex="-1 " role="dialog">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header modal-header-primary ">
                                <button type="button " class="close " data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5 "></i> Update Items</h3>
                            </div>
                            <div class="modal-body ">
                                <div class="row ">
                                    <div class="col-md-12 ">
                                              <form class="form-horizontal" action="add_item.php" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Text input-->
                                                   <div class="col-md-6 form-group">
                                                    <label class="control-label" >ID</label>
                                                    <input type="text" id="item_id" name="item_id" class="form-control "  readonly="">
                                                    <span id="error_name"></span>
                                                </div>
                                                <div class="col-md-6 form-group" style="display:block">
                                                    <label class="control-label">Vendor</label>
                                                    <select class="form-control" id="vider" name="vider" onchange="GetCategories(this.value)">
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
                                                    <span id="error_vendor"></span>
                                                </div>

                                                <div class="col-md-6 form-group" id="ccccc">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" id="item_cid">
                                                        <option>Select</option>
                                                    <?php
                                                        $rows =  ExecuteQuery("SELECT * FROM tbl_category");
                                                        while ($cell = mysqli_fetch_array($rows))
                                                        {
                                                            $cat = $cell[0].','.$cell[1];
                                                            echo '<option value="'.$cell[0].'">'.$cell[1].'</option>';
                                                        }

                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Item</label>
                                                    <input type="text" id="item_name" name="item_name" class="form-control ">
                                                    <span id="error_name"></span>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Price</label>
                                                    <input type="text" id="item_price" class="form-control ">
                                                    <span id="error_pname"></span>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Quantity</label>
                                                    <input type="text" id="item_qty" class="form-control ">
                                                    <span id="error_qname"></span>
                                                </div>

                                                <div class="col-md-6 form-group ">
                                                    <label class="control-label ">Image</label>
                                                    <input type="file" id="item_image" name="item_image" class="form-control ">
                                                    <span id="error_image"></span>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" id="item_status">
                                                        <option>Select</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                    <span id="error_status"></span>
                                                </div>
                                                <div class="col-md-6 form-group ">
                                                    <input type="checkbox" id="chk" name="chk" class="form-control-sm"> Check box to change picture.
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" id="item_desc_" name="item_desc_" class="form-control ">
                                                    <span id="error_qdesc"></span>
                                                </div>

                                                <div class="col-md-12 form-group user-form-group ">
                                                    <div class="pull-right ">
                                                        <!-- <input type="button" value="Create" class="btn btn-primary" id="btnAddClick"> -->
                                                        <input type="button" value="Update Now" id="btnchangeClick" class="btn btn-primary">
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
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header modal-header-primary ">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5 "></i> Delete task</h3>
                            </div>
                            <div class="modal-body ">
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <form class="form-horizontal ">
                                            <fieldset>
                                                <div class="col-md-12 form-group user-form-group ">
                                                    <label class="control-label ">Delete task</label>
                                                    <div class="pull-right ">
                                                        <button type="button " class="btn btn-danger btn-sm ">NO</button>
                                                        <button type="submit " class="btn btn-success btn-sm ">YES</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                  <div class="modal fade" id="update_pre" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-plus m-r-5"></i>Item Image Preview</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="#" id="pre_img"  width="560" height="460">
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
    <!-- /.wrapper -->
    <!-- Start Core Plugins
         =====================================================================-->
    <!-- jQuery -->
    <script src="assets/plugins/jQuery/jquery-1.12.4.min.js " type="text/javascript "></script>
    <!-- jquery-ui -->
    <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js " type="text/javascript "></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js " type="text/javascript "></script>
    <!-- lobipanel -->
    <script src="assets/plugins/lobipanel/lobipanel.min.js " type="text/javascript "></script>
    <!-- Pace js -->
    <script src="assets/plugins/pace/pace.min.js " type="text/javascript "></script>
    <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js " type="text/javascript ">
    </script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js " type="text/javascript "></script>
    <!-- CRMadmin frame -->
    <script src="assets/dist/js/custom.js " type="text/javascript "></script>
    <!-- End Core Plugins
         =====================================================================-->
    <!-- Start Page Lavel Plugins
         =====================================================================-->
    <!-- ChartJs JavaScript -->
    <script src="assets/plugins/chartJs/Chart.min.js " type="text/javascript "></script>
    <!-- Counter js -->
    <script src="assets/plugins/counterup/waypoints.js " type="text/javascript "></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js " type="text/javascript "></script>
    <!-- Monthly js -->
    <script src="assets/plugins/monthly/monthly.js " type="text/javascript "></script>
    <!-- End Page Lavel Plugins
         =====================================================================-->
    <!-- Start Theme label Script
         =====================================================================-->
    <!-- Dashboard js -->
    <script src="assets/dist/js/dashboard.js " type="text/javascript "></script>
    <!-- End Theme label Script
         =====================================================================-->

</body>



</html>