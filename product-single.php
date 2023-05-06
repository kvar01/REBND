<?php
session_start();
$_SESSION["url"] = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['cart'])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
include('ClientHeaderTitle.php');
?>
  <script>
    function AddCart(item) {
      var ajax = new XMLHttpRequest();
      ajax.open("GET", "additem_list.php?item=" + item, true);
      ajax.onreadystatechange = function () {
        document.getElementById("item_list_display").innerHTML = ajax.responseText;
      }
      ajax.send();
      location.reload();
    }
  </script>
</head>

<body style="background-color:white">
  <header class="header-part" style="background-color:white">
    <div class="container">
      <div class="header-left" style="margin-left:-0px;">
        <div class="header-icon-group" style="background-color: white;">
          <button class="icon-nav"><i class="icofont-align-left"></i></button>
          <a class="header-logo" href="./index.php">
            <img src="images/log2.png" alt="logo" style="" />
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
         if (isset($_SESSION['customer'])) {
           echo '<span style="color:black; margin-left:5px; font-weight:bold"><a href="dashboard/signout.php"  style="color:black;">Signout</a>';
         ?></span>
          <?php
         } else {
                    ?>
          <a href="dashboard/login.php"> <span class="text" style="color:black;  font-weight:normal">Account</span></a>
          <?php
         } ?>
        </div>
        <div class="header-icon-group" style="background-color:white; margin-left:300px">
          <button class="icon-check">
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
        </div>
      </div>
    </div>
  </header>

  <div style="background-color:white; margin-top:20px">
    <div style="background-color:white">
      <div>
      </div>
      <?php
            if (isset($_SESSION['cart'])) {
              $item_list = $_SESSION['cart'];
              $total_amount = 0;
              echo '<div class="check-header">
			          		<button class="check-close"><i class="icofont-close"></i></button>
        			  	<div class="cart-total">
            				<i class="icofont-basket"></i>
            				<h5><span>Total Items </span><span>(' . count($item_list) . ')</span></h5>
          				</div>
        		</div>
        				<ul class="cart-list">';
              foreach ($item_list as $obj) {

                $data = explode(',', $obj);

                //0 productId 1-cat_id 2-itemname 3-price 4-quantity 5-picture 6-createdby
                $total_amount += ($data[3] * $data[4]);
                echo '
          <li class="cart-item alert fade show">
        			    <div class="cart-image">
              				<a href="#"><img src="dashboard/item/' . $data[5] . '" alt="product"/></a>
            			</div>
 			            <div class="cart-info">
                        <input type="hidden" value="' . $data[2] . '" name="pname" readonly>
        			      <h5><a id=' . $data[1] . '>' . $data[2] . '</h5>
              				<h6>' . '$' . $data[3] . '</h6>
                            <span>Item Size: ' . $data[7] . '</span>
              				<div class="product-action">
                				<button class="action-minus" title="Quantity Minus" style="display:none">
                				  <i class="icofont-minus"></i></button>
		  				            <input class="action-input" title="Quantity Number" type="number" name="quantity" value="' . $data[4] . '"/>
						              <button class="action-plus" title="Quantity Plus" style="display:none">
                  				  <i class="icofont-plus"></i>
                				  </button>
              				</div>
            			    </div>
                      <form action="removeitem.php" method="GET">
                      <a href="removeitem.php?pname=' . $data[2] . '" class="btn btn-sm btn-danger">X</a>
                      <input type="submit" value="X" style="background-color: red; padding: 10px; border-radius: 15px; display:none">
                      </form>
			    </li>';
              }
              echo '</ul> 
					<div class="check-footer" style="width: 100%;align-items: center; justify-content: center; display: flex;">
					<a href="checkout.php" class="check-btn"
          style="width: 250px;"><span class="check-title">checkout</span
						><span class="check-price">' . $total_amount . '</span></a>
					</div>
          <div class="check-footer" style="width: 100%;align-items: center; justify-content: center; display: flex;">
          <a href="cancel.php" class="check-btn" style="width: 250px; align-items: center; justify-content: center;"><span class="check-title">Cancel All</span></a>
          </div>
				</div>';
            } else {
              echo '<div class="check-header" style="background-color:white">
                  <button class="check-close"><i class="icofont-close"></i></button>
                <div class="cart-total">
                  <i class="icofont-basket"></i>
                  <h5><span>total item</span><span>(0)</span></h5>
                </div>
              </div>';
            }
            ?>
    </div>
  </div>
  <section class="related-part" style="background-color:white">
    <div class="container" style="background-color:white">
      <div class="row">
        <div class="col-lg-12">
          <div class="related-title">
            <?php
            $shop_id = 0;
            if (isset($_GET['shop'])) {
              $arr = preg_split('/\,/', $_GET['shop']);
              $shop_id = $arr[0];
            }
            ?>
            </h3>
          </div>
        </div>
      </div>
      <div class="row" style="background-color:white">
        <?php
       include("dashboard/db_connection.php");
       $query = "SELECT * FROM `tbl_items` WHERE category_id='$shop_id'";
       $rows = mysqli_query($con, $query);
       while ($cell = mysqli_fetch_array($rows)) {
         $item_id = $cell[0] . ',' . $cell[1] . ',' . $cell[2] . ',' . $cell[3] . ',1,' . $cell[5] . ',' . $cell[6] . ',' . $cell[9];
         echo '          <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3">
            <div class="">
                <div class="product-label-group">
                  <label class="product-label label-new">new</label>
                </div>
                		<a class="product-image" href="product_detail.php?q=' . $item_id . '">
			              <img src="dashboard/item/' . $cell[5] . '" alt="product" style="height:280px"/></a>
              <div class="product-content">
                <h5 class="product-price">
                  <span>$' . $cell[3] . '<small>/' . $cell[4] . '</small></span
                  ><span>Per Item</span>
                </h5>
                <h5 class="product-name">
                  <a href="product_detail.php?q=' . $item_id . '">' . $cell[2] . '</a>
                </h5>
                    <a href="product_detail.php?q=' . $item_id . '" class="btn action-cart">View Item</a>
			              <input type="button" class="action-cart" title="' . $item_id . '" value="View Item" onclick="AddCart(this.title)" style="display:none">
                </div>
            </div>
          </div>';
       }
       ?>
      </div>
    </div>
  </section>
  <div class="mobile-check">
    <button class="check-btn">
      <span class="check-item"><i class="icofont-basket"></i><span>0 items</span></span><span
        class="check-price">$00.00</span>
    </button>
  </div>
  <?php
    include('webfooter.php');
    ?>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/vendor/popper.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/custom/header-part.js "></script>
  <script src="js/custom/product-part.js "></script>
  <script src="js/custom/product-view.js "></script>
  <script src="js/custom/select-option.js"></script>
  <script src="js/custom/dropdown.js"></script>
  <script src="js/vendor/slick.min.js"></script>
  <script src="js/custom/slick.js"></script>
  <script src="js/custom/main.js"></script>
  <script>
    document.getElementById("delete").addEventListener("click", myfunction);
    function myfunction() {
            <?php
            if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $key => $value) {
                echo '<h1>hii</h1>';
              }
            }
            ?>
      }
  </script>
</body>

</html>