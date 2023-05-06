<?php
    include('db_connection.php');
    $invoice = $_POST['OI_Customer'];

    $query='';
    $IsModified=false;
    $OrderInvoice = $invoice;
    $OrderTime = date("h:i:sa");
    $OrderDate = date("Y-m-d");
    if(isset($_POST['btnAccept']))
    {
        // Accept Query
        $query = "UPDATE tbl_order set status='Accepted' where invoice='$invoice'";
        $IsModified = UpdateQuery($query);
        if($IsModified==true)
        {
            $OrderStatus = 'Accepted';
            $query = "insert into tbl_orderstatus values(null,'$OrderInvoice','$OrderStatus','$OrderDate',' $OrderTime')";
            InsertQuery($query);
            echo $query;
            header("location:G_order.php?return_msg=Order Accepted by this Invoice No ".$invoice);
        }
        else{
            header("location:G_order.php?return_msg=Server Issue");
        }
    }
    else if(isset($_POST['btnDelivered']))
    {
        // Delivered Query
        $query = "UPDATE tbl_order set status='Delivered' where invoice='$invoice'";
        $IsModified = UpdateQuery($query);
        if($IsModified==true)
        {
            $OrderStatus = 'Delivered';
            $query = "insert into tbl_orderstatus values(null,'$OrderInvoice','$OrderStatus','$OrderDate',' $OrderTime')";
            InsertQuery($query);
          
            header("location:G_order.php?return_msg=Order Delivered by this Invoice No ".$invoice);
        }
        else{
            header("location:G_order.php?return_msg=Server Issue");
        }
    }
    else if(isset($_POST['btnReceived']))
    {
        // Received Query
        $query = "UPDATE tbl_order set status='Received' where invoice='$invoice'";
        $IsModified = UpdateQuery($query);
        if($IsModified==true)
        {
            $OrderStatus = 'Received';
            $query = "insert into tbl_orderstatus values(null,'$OrderInvoice','$OrderStatus','$OrderDate',' $OrderTime')";
            InsertQuery($query);
        
            header("location:G_order.php?return_msg=Order Received by this Invoice No ".$invoice);
        }
        else{
            header("location:G_order.php?return_msg=Server Issue");
        }
    }
    else if(isset($_POST['btnCancelled']))
    {
        // Cancelled Query
        $query = "UPDATE tbl_order set status='Cancelled' where invoice='$invoice'";
        $IsModified = UpdateQuery($query);
        if($IsModified==true)
        {
            $OrderStatus = 'Cancelled';
            $query = "insert into tbl_orderstatus values(null,'$OrderInvoice','$OrderStatus','$OrderDate',' $OrderTime')";
            InsertQuery($query);
           
            header("location:G_order.php?return_msg=Order Cancelled by this Invoice No ".$invoice);
        }
        else{
            header("location:G_order.php?return_msg=Server Issue");
        }
    }

?>