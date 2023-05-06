<?php
session_start();
$_SESSION["url"] = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['cart'])) {
    //print_r($_SESSION['cart']);
}
// unset($_SESSION['cart']);
include("dashboard/db_connection.php");
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
        margin-top: 80px;
        align-items: center;
        justify-content: center;
        float: left;
    }
</style>
<script>
    function hello() {
        window.location.replace("http://localhost/Rebnd/product-single.php")
    }
</script>

<head>
    <meta charset="UTF-8" />
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

</head>

<body style="background-color:white">
    <header class="header-part" style="background-color:white; padding-top: 20px; padding-bottom: 20px;">
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
                  echo '<span style="color:black; margin-left:5px; font-weight:bold"><a href="dashboard/signout.php" style="color:black;">Signout</a>';
              ?>
                    </span>
                    <?php
              } else {
                ?>
                    <a href="dashboard/login.php"> <span class="text"
                            style="color:black;  font-weight:normal">Account</span></a>
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

    <?php
?>

    <section class="banner-part" style="background-color:white; margin-top:-40px; ">
        <div class="container">
            <div class="row" style="width:100%">
                <div class="col-lg-12" style="width:100%;">
                    <img src="wallpapers/hdr2.jpeg" alt="product"
                        style="height:500px; width:80%; margin-left:100px; box-shadow:0px 0px 5px 4px lightgray" />
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Featured Products section -->
    <section class="promo-part" style="background-color:white; margin-top:30px; margin-bottom:25px">
        <div class="container" style="text-align:center; font-size:25px; font-weight:bold">
            Featured Products
        </div>
    </section>
    <section class="product-part" style="background-color:white; border:solid 0px; margin-top:-10px;">
        <div class="container" style="background-color:white; border:solid 0px; width:60%">
            <div class="row" style="background-color:white; border:solid 0px;width: 100%;">
                <div class="row"
                    style="background-color:white; border:solid 0px;width: 100%;justify-content:space-between">
                    <?php
                    $query = "select * from tbl_items 
                    where qty>0 and category_id IN(select tbl_category.id from tbl_category) and 
                    id<((select COUNT(id) from tbl_items)-4)  
                    order by RAND() LIMIT 4;";

                    $rows = mysqli_query($con, $query);
                    while ($cell = mysqli_fetch_array($rows)) {

                        $shop = $item_id = $cell[0] . ',' . $cell[1] . ',' . $cell[2] . ',' . $cell[3] . ',1,' . $cell[5] . ',' . $cell[6] . ',' . str_replace(',', '_', $cell[9]);
                        echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="background-color:white; border:solid 0px;text-align:center; color:black;padding: auto; width: 100%">
            					<div class="">
                				   <div class="product-label-group">
                  					
                				   </div>
                					<a class="product-image" href="product_detail.php?q=' . $item_id . '">
			              			<img src="dashboard/item/' . $cell[5] . '" alt="product" style="height:280px"/></a>
              						<div class="product-content">
		                				<h5 class="product-name">
                		  					<a href="product_detail.php?q=' . $item_id . '">' . $cell[2] . '</a>
                						</h5>
                    				<h5 class="product-price" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                  						<span>$' . $cell[3] . '</span></h5>
			              			
                					</div>
           			 		  </div>
          					</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Recently Added section -->
    <section class="promo-part" style="background-color:white; margin-top:30px; margin-bottom:30px">
        <div class="container" style="text-align:center; font-size:25px; font-weight:bold">
            Recently Added
        </div>
    </section>
    <section class="product-part" style="background-color:white; border:solid 0px; margin-top:-10px;">
        <div class="container" style="background-color:white; border:solid 0px; width:60%">
            <div class="row" style="background-color:white; border:solid 0px; width: 100%;">
                <div class="row"
                    style="background-color:white; border:solid 0px; width: 100%; justify-content:space-between">
                    <?php
                    $query = "select * from tbl_items where qty>0 order by id desc LIMIT 4";

                    $rows = mysqli_query($con, $query);
                    while ($cell = mysqli_fetch_array($rows)) {

                        $shop = $item_id = $cell[0] . ',' . $cell[1] . ',' . $cell[2] . ',' . $cell[3] . ',1,' . $cell[5] . ',' . $cell[6] . ',' . $cell[9];
                        echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="background-color:white; border:solid 0px;text-align:center; color:black; width: auto;padding: auto;">
            					<div class="">
                				   <div class="product-label-group">
                  					
                				   </div>
                					<a class="product-image" href="product_detail.php?q=' . $item_id . '">
			              			<img src="dashboard/item/' . $cell[5] . '" alt="product" style="height:280px"/></a>
              						<div class="product-content">
                						
		                				<h5 class="product-name">
                		  					<a href="product_detail.php?q=' . $item_id . '">' . $cell[2] . '</a>
                						</h5>
                            <h5 class="product-price" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                  						<span>$' . $cell[3] . '</span></h5>
                    					
			              			
                					</div>
           			 		  </div>
          					</div>';
                    }
                    ?>
                </div>
                <div class="row"
                    style="background-color:white; display: flex; align-items: center; justify-content: center; width: 100%">
                    <div class="col-lg-12">

                        <?php
                        include('webfooter.php');
                        ?>

                    </div>
                    <div class="row" style="background-color:white">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="mobile-check">
        <button class="check-btn">
            <span class="check-item"><i class="icofont-basket"></i><span>0 items</span></span><span
                class="check-price">$00.00</span>
        </button>
    </div>
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