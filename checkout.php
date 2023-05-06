<?php
	session_start();
  $_SESSION["url"] =  $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <?php 
        include('ClientHeaderTitle.php'); 
    ?>
  </head>
  <body style="background-color:white"> 
    <header class="header-part" style="background-color:white">
      <div class="container">
        <div class="header-left" style="margin-left:-0px;">
          <div class="header-icon-group" style="background-color: white;">
            <button class="icon-nav"><i class="icofont-align-left"></i></button>
		<a class="header-logo" href="index.php">
			<img src="images/log2.png" alt="logo" style=""/>
		</a>
	    <button class="icon-cross"><i class="icofont-close"></i></button>
          </div>
        </div>
        <div class="header-right" style="background-color:white; text-align:center; margin-left:300px">
        <div class="header-icon-group" style="margin-right:0px;">
          <a href="index.php" style="color:black">Home</a>
          </div>
        <div class="header-icon-group" style="">
	        <a href="product.php" style="color:black">Products</a>
        </div>
          <div class="header-icon-group" style="margin-right:0px ;">
          <a href="Contact.php" style="color:black">Contact</a>
          </div>
	 <div class="header-icon-group" style="margin-right:0px;">
       <?php
	            if(isset($_SESSION['customer']))
	            {
            		
            	?>
            	<?php
            		}
	            	else
	            	{
	            	?>
	            	  <a href="dashboard/login.php"> <span class="text" style="color:black;  font-weight:normal">Account</span></a>
	            	<?php
	            	}?>
          </div>
          <div class="header-icon-group" style="background-color:white; margin-left:300px">
           <button class="icon-check">
              <i class="icofont-shopping-cart"></i><span style="color:black">
              <?php
                  if(isset($_SESSION['cart']))
                  {
                    $item_list = $_SESSION['cart'];
                    $total_amount = 0;
                    foreach($item_list as $obj)
                    {
                      $data = explode(',',$obj);
                      $total_amount+= ($data[3]*$data[4]);
                    }
                  }	
                  else
                  {
                    echo '<span style="color:black">00.00</span>';
                  }	
              ?>
              </span><sup style="color:white; background-color:black">
          <?php
              if(isset($_SESSION['cart']))
	            {
            		$item_list_arr = $_SESSION['cart'];
                echo count($item_list_arr);
              }
              else
              {
                    echo '0';
              }
          ?>
              </sup>
            </button>
          </div>
        </div>
      </div>
    </header>

    <section class="checkout-part">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="alert-info">
              <p>
                <?php
                  if(isset($_SESSION['customer']))
                  {
                        echo 'Customer : '.$_SESSION['customer'][3];
                  }
                  else
                  {
                    echo 'Returning customer? <a href="dashboard/login.php">Click here to login</a>';
                  }
                ?>
              </p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="account-card">
              <div class="account-title"><h4>Your Order:</h4></div>
              <div class="account-content">
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
      if(isset($_SESSION['cart']))
      {
				$item_list = $_SESSION['cart'];
				$total_amount = 0;
				$sno = 0;
				foreach($item_list as $obj)
				{
					$data = explode(',',$obj);
        
					$total_amount+= ($data[3]*$data[4]);
					$sno++;
					echo '
                      <tr>
                        <td><h5>'.$sno.'</h5></td>
                        <td>
                         <img src="dashboard/item/'.$data[5].'" alt="product"/>
                        </td>
                        <td><h5>'.$data[2].'</h5></td>
                        <td>'.$data[7].'</td>
                        <td>
                          <h5>'.'$'.$data[3].'</h5>
                        </td>
                        <td><h5>'.$data[4].'</h5></td>
                        <td><h5>'.'$'.($data[3]*$data[4]).'</h5></td>
                        <td style="display:none">
                          <ul class="table-action">
                            <li>
                              <a class="view" Href="#" title="View This Item" data-toggle="modal" data-target="#product-view"><i class="icofont-eye-alt">
                              </i></a>
                            </li>
                            <li>
                              <a class="trash" href="#" title="Remove This Item" ><i class="icofont-trash"></i></a>
                            </li>
                          </ul>
                        </td>
                      
                      </tr>';
				}
        $_SESSION["total"] = $total_amount;
      }
			?>
 </tbody>
                  </table>
                </div>
                <div class="checkout-charge">
                  <ul>
                    <li><span>Grand Total</span><span>
                    <?php 
                      if(isset($total_amount))
                      {
                         echo '$'.$total_amount; }?></span></li>
                  <?php 
                      if(isset($total_amount))
                      {
                        echo $total_amount; }?></span>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
	  <div class="col-lg-12" style="margin-top:-120px">
            <div class="account-card mb-0">
         <div class="checkout-check">
                 
                </div>
              
                <?php
                if(isset($_SESSION['customer']))
                {
                  ?>
                <table style="margin:top:-100px; width:100%">
                  <tr >
                    <td style="background-color:lightblue; padding:10px; text-align:center; font-size:bold; font-size:25px; color: black;"> <label>Please Provide Delivery Information Below: </label> </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" class="form-control" name="del_address" id="del_address" placeholder="Street" style="margin-bottom:5px;margin-top:5px; background-color:white; border:outset 3px blue">
                    </td>
                  </tr>
                
                  <tr>
                    <td>
                      <input type="text" class="form-control" name="del_apt" id="del_apt" placeholder="Apt #" style="margin-bottom:5px;margin-top:5px; background-color:white; border:outset 3px blue" >
                    </td>
                  </tr>
                 
                  <tr>
                    <td>
                      <input type="text" class="form-control" name="del_city" id="del_city" placeholder="City" style="margin-bottom:5px;margin-top:5px; background-color:white; border:outset 3px blue">
                    </td>
                  </tr>
                 
                  <tr>
                    <td>
                      <input type="text" class="form-control" name="del_state" id="del_state" placeholder="State" style="margin-bottom:5px;margin-top:5px; background-color:white; border:outset 3px blue">
                    </td>
                  </tr>
                 
                  <tr>
                    <td>
                      <input type="text" class="form-control" name="del_zip" id="del_zip" placeholder="Zip Code" style="margin-bottom:5px;margin-top:5px; background-color:white; border:outset 3px blue">
                    </td>
                  </tr>
                </table>
                <?php } ?>
                <div class="checkout-proced" id="proceedtocheckout" style="display:block; color:black; text-align:center;">
                  <a class="btn btn-inline" onclick="processOrderNow()">Proceed to checkout</a>
                  <br>
                  <span id="spmsg" style="color:red; text-align:center; font-weight:bold"></span>
                </div>
	 </div>
	 </div>
        </div>
      </div>
    </section>
    <?php
        include('webfooter.php');
    ?>
  <script>
    function processOrderNow()
    {
      var deladdress  = document.getElementById('del_address').value;
      var del_apt     = document.getElementById('del_apt').value;
      var del_city    = document.getElementById('del_city').value;
      var del_state   = document.getElementById('del_state').value;
      var del_zip     = document.getElementById('del_zip').value;
      if(deladdress=="")  
      {
        document.getElementById('del_address').style.border="solid 2px red";
        document.getElementById('del_address').focus();
        return;
      
      }
      else if(del_apt=="")
      {
        document.getElementById('del_address').style.border="solid px";
        document.getElementById('del_apt').style.border="solid 2px red";
        document.getElementById('del_apt').focus();
        return;
      }
      else if(del_city=="")
      {
        document.getElementById('del_apt').style.border="solid px";

        document.getElementById('del_city').style.border="solid 2px red";
        document.getElementById('del_city').focus();
        return;
       
      }
      else if(del_state=="")
      {
        document.getElementById('del_city').style.border="solid px";
        document.getElementById('del_state').style.border="solid 2px red";
        document.getElementById('del_state').focus();
        return;
      }
      else if(del_zip=="")
      {
        document.getElementById('del_state').style.border="solid px";
        document.getElementById('del_zip').style.border="solid 2px red";
        document.getElementById('del_zip').focus();
        return;
        
      }
      else
      {

        document.getElementById('del_address').style.border="solid 0px ";
        document.getElementById('del_apt').style.border="solid 0px ";
        document.getElementById('del_city').style.border="solid 0px ";
        document.getElementById('del_state').style.border="solid 0px ";
        document.getElementById('del_zip').style.border="solid 0px ";
        
        window.location.href="CustomerOrder.php?del_address="+deladdress+"&del_apt="+del_apt+"&del_city="+del_city+"&del_state="+del_state+"&del_zip="+del_zip;
      }
    }
    function deliveryaddress(deliveryaddress)
    {
      if(deliveryaddress.length>1)
      {
        document.getElementById('proceedtocheckout').style.display="block";
      }
      else       {
        document.getElementById('proceedtocheckout').style.display="none";
      }

    }
  </script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/custom/header-part.js "></script>
    <script src="js/custom/product-view.js "></script>
    <script src="js/custom/select-option.js"></script>
    <script src="js/custom/dropdown.js"></script>
    <script src="js/vendor/slick.min.js"></script>
    <script src="js/custom/slick.js"></script>
    <script src="js/custom/main.js"></script>
  </body>
</html>
