<?php
	session_start();
  include('dashboard/db_connection.php');
  $customer_id = $_SESSION['customer'][2];
  $order_list_query = ExecuteQuery(
  "SELECT 
  count(DISTINCT tbl_order.invoice)
  FROM tbl_orderitems
  inner join tbl_users ON tbl_users.uid = tbl_orderitems.customerid
  INNER join tbl_order ON tbl_order.invoice = tbl_orderitems.invoice
  INNER join tbl_users as shop on shop.uid = tbl_orderitems.ordergeneratedby
  where tbl_users.uid = '$customer_id' and tbl_order.status = 'Ordered'");
  $Total_Order_Count = mysqli_fetch_array($order_list_query);
  // query for multiple orders by customer  with status process-delivered
  $query_invoices = "select DISTINCT tbl_order.invoice,tbl_order.status from tbl_order
  INNER JOIN tbl_orderitems on tbl_order.invoice = tbl_orderitems.invoice
  where tbl_orderitems.customerid = '$customer_id' order by invoice desc";  
  $INVOICE_list_query = ExecuteQuery($query_invoices);
  $del_address = ExecuteQuery("select * from tblorderdeliveryaddress where invoice='$'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
    .dropdown-content {
        display: none;
        position: absolute;
        top: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 80px;
        align-items: center;
        justify-content: center;
        float: left;
    }
    .header-icon-group:hover .dropdown-content 
    {
        display: block;
        background-color: white;
    }
</style>
  <?php 
        include('ClientHeaderTitle.php'); 
  ?>
  </head>
  <body style="background-color:white">
  <header class="header-part" style="background-color:white; padding-top: 20px; padding-bottom: 20px;">
        <div class="container">
            <div class="header-left" style="margin-left:-0px;">
                <div class="header-icon-group" style="background-color: white;">
                    <button class="icon-nav"><i class="icofont-align-left"></i></button>
                    <a class="header-logo" href="http://localhost:80/Rebnd/index.php">
                        <img src="images/log2.png" alt="logo" style="" />
                    </a>
                    <button class="icon-cross"><i class="icofont-close"></i></button>
                </div>
            </div>
            <div class="header-right" style="background-color:white; text-align:center; margin-left:300px">
                <div class="header-icon-group" style="margin-right:0px;">
                    <a href="index.php" style="color:black">Home</a>
                </div>

                <div class="header-icon-group" style="overflow: hidden; float: left;">
                    <a href="product.php" style="color:black">Products</a>
                    <div class="dropdown-content">
                        <a href="./tops.php">Tops</a>
                        <a href="./bottoms.php">Bottoms</a>
                        <a href="./footwear.php">Footwear</a>
                        <a href="./accessories.php">Accessories</a>
                    </div>
                </div>
                <div class="header-icon-group" style="margin-right:0px ;">
                    <a href="Contact.php" style="color:black">Contact</a>
                </div>
                <div class="header-icon-group" style="margin-right:0px;">
            <?php
            if (isset($_SESSION['customer'])) 
            {
                echo '<span style="color:black; margin-left:5px; font-weight:bold"><a href="dashboard/signout.php" style="color:black;">Signout</a>';
            ?>
            </span>
            <?php
            } 
            else 
            {
            ?>
              <a href="dashboard/login.php"> <span class="text" style="color:black;  font-weight:normal">Account</span></a>
            <?php
            } 
            ?>
                </div>
                
                <div class="header-icon-group" style="background-color:white; margin-left:300px">
                    <a href="./product-single.php">
                        <button class="icon-check" onclick="hello();">
                            <i class="icofont-shopping-cart"></i>
             <?php
              if (isset($_SESSION['cart'])) {
                $item_list = $_SESSION['cart'];
                $total_amount = 0;
                foreach ($item_list as $obj) {
                  $data = explode(',', $obj);
                  $total_amount += ($data[3] * $data[4]);
                }
              } else {
              }
              ?>
              </span><sup style="color:white; background-color:black">
             <?php
                if (isset($_SESSION['cart'])) {
                  $item_list_arr = $_SESSION['cart'];
                  echo count($item_list_arr);
                } else {
                  echo '0';
                }
               ?>
               </sup>
              </button>
             </a>
            </div>
           </div>
        </div>
    </header>
    
<section class="orderlist-part">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="orderlist-filter">
              <h3>total orders <span>- (<?php echo $Total_Order_Count[0];?>)</span></h3>
            </div>
          </div>
        </div>
        <?php
            // multi-orders by customers 
            $order_no = 1;
            while($option = mysqli_fetch_array($INVOICE_list_query))
            {
                $query = "SELECT 
                tbl_items.id,
                tbl_items.itemname,
                tbl_items.picture,
                tbl_orderitems.invoice,
                tbl_orderitems.price,
                tbl_orderitems.qty,
                tbl_orderitems.amount,
                tbl_orderitems.orderitemdate,
                tbl_orderitems.item_size
                FROM tbl_orderitems
                INNER JOIN tbl_items on tbl_items.id = tbl_orderitems.itemid
                INNER join tbl_order on tbl_order.invoice = tbl_orderitems.invoice
                where tbl_orderitems.customerid = '$customer_id' and tbl_orderitems.invoice='$option[0]' and tbl_order.invoice='$option[0]'";
                //Item List Query;
                $rows = ExecuteQuery($query);

              $del_address_cus = ExecuteQuery("select * from tblorderdeliveryaddress where invoice='$option[0]'");
              $cus_del_add='';
              $da_row = mysqli_fetch_array($del_address_cus);
              $cus_del_add = $da_row[2];
              // Customer each Order detail
              $Order_detail_query = "SELECT 
              count(tbl_orderitems.orderitemid),
              tbl_order.orderid,
              tbl_orderitems.amount,
              tbl_order.invoice,
              tbl_order.orderdate,
              tbl_order.status,
              tbl_orderitems.ordercreateddate,
              tbl_users.address as 'cust_loc',
              shop.address      as 'from_loc',
              shop.name         as 'shop_name',
              shop.contact      as 'ctct_num',
              shop.email        as 'mail_num'
              FROM tbl_orderitems
              inner join tbl_users ON tbl_users.uid = tbl_orderitems.customerid
              INNER join tbl_order ON tbl_order.invoice = tbl_orderitems.invoice
              INNER join tbl_users as shop on shop.uid = tbl_orderitems.ordergeneratedby
              where tbl_users.uid = '$customer_id' and tbl_order.status = '$option[1]' and tbl_orderitems.invoice='$option[0]' and tbl_order.invoice='$option[0]'
              group by 
              tbl_orderitems.amount,
              tbl_order.invoice,
              tbl_order.orderdate,
              tbl_order.status,
              tbl_users.address,
              shop.address,
              shop.name,
              shop.contact,
              shop.email,
              tbl_order.orderid";
              $Order_detail_Row = ExecuteQuery($Order_detail_query);
              $ODR              = mysqli_fetch_array($Order_detail_Row); 
  ?>
       <div class="row">
          <div class="col-lg-12">
            <div class="orderlist">
              <div class="orderlist-head">
                <h4>order#<?php echo $order_no;?></h4>
                <h4>Order History</h4>
              </div>
              <div class="orderlist-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="order-track">
                      <ul class="order-track-list">
                          <li class="order-track-item active">
                            <i class="icofont-check"></i ><span>Order Status => <?php echo $ODR[5];?></span>
                           </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <table style="width:100%">
                      <tr>
                        <td style="width:20%; padding-left:40px"> <h5>Order ID</h5></td>
                        <td><?php echo $ODR[1];?></td>
                      </tr>
                      <tr>
                        <td style="width:20%; padding-left:40px"> <h5>Invoice</h5></td>
                        <td> 
                            <?php echo $option[0];?> | 
                            <a href="invoice_reports.php?invoice=<?php echo $option[0];?>" style="margin-bottom:10px;" class="btn-sm btn-success">View Invoice</a>
                            </td>
                      </tr>
                      <tr>
                        <td style="width:20%; padding-left:40px"> <h5>Order Date</h5></td>
                        <td><?php echo $ODR[4];?>
                               | <b>Sub Total</b> [<?php echo $ODR[2];?>]
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="width:100%">
                      </tr>
                    </table>
                  <table class="" style="width:100%">
                    <tr>
                      <td align="right" style="background-color:lightblue;font-weight:bold; padding:5px">Customer Delivery Address: </td>
                    </tr>
                    <tr>
                      <td align="right">
                        <?php echo ($da_row[2]) . ' Apt# ' . ($da_row[3]); ?>
                      </td>
                    </tr>
                    <tr>
                      <td align="right">
                        <?php echo ($da_row[4]) . ', ' . ($da_row[5]) . ' ' . ($da_row[6]); ?>
                      </td>
                    </tr>

                  </table>
                  </div>
                  <div class="col-lg-12">
                    <div class="table-scroll">
                      <table class="table-list">
                        <thead>
                          <tr>
                          <th scope="col">Item Number</th>
                          <th scope="col">Product</th>
                          <th scope="col">Name</th>
                          <th scope="col">Size</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php
              $sno = 0;
              while($data = mysqli_fetch_array($rows))
              {
                $sno++;
                echo '
                      <tr>
                        <td><h5>'.$sno.'</h5></td>
                        <td>
                         <img src="dashboard/item/'.$data[2].'" alt="product"/>
                        </td>
                        <td><h5>'.$data[1].'</h5></td>
                        <td>'.$data[8].'</td>
                        <td>
                          <h5>' .'$' .$data[4].'</h5>
                        </td>
                        <td><h5>'.$data[5].'</h5></td>
                        <td><h5>' .'$' .($data[4]*$data[5]).'</h5></td>
                      
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
          </div>
        </div>
<?php
            $order_no++;}?>
      </div>
    </section>
    <?php
        include('webfooter.php');
     ?>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/custom/header-part.js "></script>
    <script src="js/custom/select-option.js"></script>
    <script src="js/custom/dropdown.js"></script>
    <script src="js/custom/accordion.js"></script>
    <script src="js/custom/main.js"></script>
  </body>
</html>
