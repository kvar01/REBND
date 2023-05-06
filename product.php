<?php
session_start();
$_SESSION["url"] = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['cart'])) {
    //print_r($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .dropdown-content {
        display: none;
        position: absolute;
        top: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 60px;
        align-items: center;
        justify-content: center;
        float: left;
    }

    .header-icon-group:hover .dropdown-content {
        display: block;
        background-color: white;
    }


    .dropdown-content a {
        padding: 20px;
    }
</style>


<head>

    <?php
    include('ClientHeaderTitle.php');
    ?>
    <link rel="icon" href="images/favicon.png" />
    <link rel="stylesheet" href="fonts/icofont/icofont.min.css" />
    <link rel="stylesheet" href="fonts/flaticon/grocery/flaticon.css" />
    <link rel="stylesheet" href="css/vendor/slick.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.css" />
    <link rel="stylesheet" href="css/custom/main.css" />
    <link rel="stylesheet" href="css/custom/product-single.css" />

    <script>
        function AddCart(item) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "additem_list.php?item=" + item, true);
            ajax.onreadystatechange = function () {
                document.getElementById("item_list_display").innerHTML = ajax.responseText;
            }
            ajax.send();
            alert('Added in cart List');
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
                    if (isset($_SESSION['customer'])) {
                        echo '<span style="color:black; margin-left:5px; font-weight:bold"><a href="dashboard/signout.php"  style="color:black;">Signout</a>';

                    ?></span>
                    <?php
                    } else {
                    ?>
                    <a href="dashboard/login.php"> <span class="text"
                            style="color:black;  font-weight:normal">Account</span></a>
                    <?php
                    } ?>
                </div>


                <div class="header-icon-group" style="background-color:white; margin-left:300px">
                    <a href="./product-single.php">
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

    <aside class="sidebar-check" style="background-color:white; margin-top:20px">
        <div class="check-container" id="item_list_display" style="background-color:white">
            <div class="check-header">
            </div>
            <?php
            if (isset($_SESSION['cart'])) {
                $item_list = $_SESSION['cart'];
                $total_amount = 0;
                echo '<div class="check-header">
			          		<button class="check-close"><i class="icofont-close"></i></button>
        			  	<div class="cart-total">
            				<i class="icofont-basket"></i>
            				<h5><span>total item</span><span>(' . count($item_list) . ')</span></h5>
          				</div>
        		</div>
        				<ul class="cart-list">';
                foreach ($item_list as $obj) {
                    $data = explode(',', $obj);
                    //0-productId 1-cat_id 2-itename 3-price 4-quantity 5-picture 6-createdby
                    $total_amount += ($data[3] * $data[4]);
                    echo '<li class="cart-item alert fade show">
			          
        			    <div class="cart-image">
              				<a href="#"><img src="dashboard/item/' . $data[5] . '" alt="product"/></a>
            			    </div>
 			            <div class="cart-info">
        			      <h5><a href="product-single.html">' . $data[2] . '</a></h5>
              				<span>PKR - ' . $data[3] . ' X 1<small>/ ' . $data[3] . ' </small></span>
              				<h6>' . $data[3] . '</h6>
              				<div class="product-action">
                				<button class="action-minus" title="Quantity Minus">
                				  <i class="icofont-minus"></i></button>
		  				  <input class="action-input" title="Quantity Number" type="text" name="quantity" value="' . $data[4] . '"/>
						  <button class="action-plus" title="Quantity Plus">
                  				  <i class="icofont-plus"></i>
                				  </button>
              				</div>
            			    </div>
			            <button class="cart-delete" data-dismiss="alert"><i class="icofont-bin"></i></button>
			           </li>';
                }
                echo '</ul> 
					<div class="check-footer">
					<a href="checkout.php" class="check-btn"
						><span class="check-title">checkout</span
						><span class="check-price">' . $total_amount . '</span></a
					>
					</div>
          <div class="check-footer">
          <a href="cancel.php" class="check-btn"><span class="check-title">Cancel All</span></a>
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
    </aside>
    <section class="related-part" style="background-color:white">
        <div class="container" style="background-color:white">
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-title">
                        <h3>All Products</h3>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color:white">
                <?php
                include("dashboard/db_connection.php");
                $query = "SELECT * FROM tbl_category";
                $rows = mysqli_query($con, $query);
                while ($cat = mysqli_fetch_array($rows)) {
                    $id = $cat[0];
                    echo '<div class="col-lg-12">
            					<div class="related-title"><h3>' . $cat[1] . '</h3>
	    					</div>
          				</div>
        				';
                    $query_items = "SELECT * FROM `tbl_items` WHERE qty>0 and category_id='$id'";
                    $rows_items = mysqli_query($con, $query_items);
                    while ($cell = mysqli_fetch_array($rows_items)) {
                        $item_id = $cell[0] . ',' . $cell[1] . ',' . $cell[2] . ',' . $cell[3] . ',1,' . $cell[5] . ',' . $cell[6] . ',' . $cell[9];
                        echo '<div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3">
            					<div class="">
                				   <div class="product-label-group">
                				   </div>
                					<a class="product-image" href="product_detail.php?q=' . $item_id . '">
			              			<img src="dashboard/item/' . $cell[5] . '" alt="product" style="height:280px"/></a>
              						<div class="product-content" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                						<h5 class="product-price">
                  						<span>$' . $cell[3] . '<small></small></span></h5>
		                				<h5 class="product-name">
                		  					<a href="product_detail.php?q=' . $item_id . '">' . $cell[2] . '</a>
                						</h5>
                					</div>
           			 		  </div>
          					</div>';
                    }
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
</body>

</html>