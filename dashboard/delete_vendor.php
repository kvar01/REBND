<?php
    session_start();
    include('db_connection.php');
    $cid    = $_REQUEST['q'];
    $query  = "update tbl_users  set status='deleted' where uid='$cid'";
    $row    = DeleteQuery($query);
    if ($row == true) 
    {
            header("location:B_Vendor.php");
    }
    else
    {
        header("location:B_Vendor.php?q=deleting vendor query issue.");
    }
?>