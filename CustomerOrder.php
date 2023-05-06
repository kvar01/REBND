<?php
    // code to check if user session alive
    session_start();
    include('dashboard/db_connection.php');
    $uri = $_SESSION["url"];
    if(!isset($_SESSION['customer']))
    {
        header("location:dashboard/login.php");
    }
    else
    {
        if(isset($_SESSION['cart']))
        {
            $amount     = $_SESSION['total'];
            $orderdate  = date("Y-m-d");
            $invoice    = NewInvoice();
            $status     = 'Ordered'; 
            $query_order= "insert into tbl_order values(null,'$orderdate','$invoice','cash','$amount','$status')";
            $IsSuccess  = InsertQuery($query_order);
            // update customer address for deliver
            $deladdress = $_GET['del_address'];
            $del_apt = $_GET['del_apt'];
            $del_city = $_GET['del_city'];
            $del_state = $_GET['del_state'];
            $del_zip = $_GET['del_zip'];
            
            InsertQuery("insert into tblorderdeliveryaddress values(null,'$invoice','$deladdress','$del_apt','$del_city','$del_state','$del_zip')");
            echo $IsSuccess;
            if($IsSuccess>0)
            {
                $item_list = $_SESSION['cart'];
                $flag = false;
                foreach($item_list as $obj)
                {
                    $data               = explode(',',$obj);
                    $itemid             = $data[0];
                    $price              = $data[3];
                    $qty                = $data[4];
                    $amount             = ($data[3]*$data[4]);
                    $customerid         = $_SESSION['customer'][2];
                    $orderitemdate      = $orderdate;
                    $ordergeneratedby   = $data[6];
                    $item_size          = $data[7];
                    $ordercreateddate   = $orderdate;
                    $query_orderitems = "INSERT INTO tbl_orderitems VALUES(null,'$invoice','$itemid','$price','$qty','$amount','$customerid','$orderitemdate','Ordered','$ordergeneratedby','$ordercreateddate','$item_size')";
                    $IsSuccess  = InsertQuery($query_orderitems); 
                    if($IsSuccess>0)
                    {
                        // update quantity 
                       $qtyQuery = ExecuteQuery("select qty from tbl_items where id='$itemid'");
                       $php_rows = mysqli_fetch_array($qtyQuery);
                       $previos_qty = $php_rows[0];
                       $previos_qty = ($previos_qty-$qty);
                       $updateQty = "update tbl_items set qty='$previos_qty' where id='$itemid'";
                       InsertQuery($updateQty); 
                        $flag = true;
                    }
                }
                if($flag == true)
                {
                    $_SESSION["cart"] = array();
                    $_SESSION["total"] = '0';
                    $_SESSION['invoice_code'] = $invoice;
                    header("location:orderlist.php");
                }
            }
            else
            {
                echo "Invoice Issue";
            }
        }
        else
        {
            echo "cart empty";
        }
    }
?>