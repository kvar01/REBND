<?php
    session_start();
    include('db_connection.php');
    $cid    = $_REQUEST['q'];
    $query  = "delete from tbl_users where uid='$cid'";
    $row    = DeleteQuery($query);
    if ($row == true) 
    {
        $query  = "delete from tbl_orderitems where customerid='$cid'";
        $row    = DeleteQuery($query);
        if($row == true)
        {
            $query  =   "SELECT DISTINCT invoice FROM `tbl_orderitems` WHERE customerid='$cid'";
            $rows   = ExecuteQuery($query);
            while($cid = mysqli_fetch_array($rows))
            {
                $query  = "delete from tbl_order where invoice='$cid[0]'";
                DeleteQuery($query);
                DeleteQuery("delete from tbl_orderitems where invoice='$cid[0]'");
            }
            echo 'Deleted Customer ';
        }
        else
        {
            echo 'Customer cant be deleted';
        }
    }
?>