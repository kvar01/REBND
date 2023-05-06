<?php
session_start();
$_SESSION["url"] =  $_SERVER['REQUEST_URI'];
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
        margin-top: 50px;
        align-items: center;
        justify-content: center;
        float: left;
    }

</style>
<head>
    <?php
      include('ClientHeaderTitle.php');
  ?>
    <script>
        function AddCart(item) {
            //alert(item);
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "additem_list.php?item=" + item, true);
            ajax.onreadystatechange = function() {
                document.getElementById("item_list_display").innerHTML = ajax.responseText;
            }
            ajax.send();
            window.reload();
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
                    <a href="./index.php" style="color:black">Home</a>
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
                    <a href="dashboard/login.php"> <span class="text" style="color:black;  font-weight:normal">Account</span></a>
                    <?php
                    } ?>
                </div>
                <?php
        ?>
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

    <section class="related-part" style="background-color:white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <div class="related-title">
                        <h1>CONTACT US</h1>
                        <hr>
                        <div class="">
                            <h3>ADDRESS</h3>
                            <hr>
                            <div>
                                <h5>51 Market st. Lowell, MA 01852</h3><br>
                                    <div class="">
                                        <h3>EMAIL US</h3>
                                        <hr>
                                        <div>
                                            <h5>REBNDShop@gmail.com</h3><br>
                                                <div class="">
                                                    <h3>CALL US</h3>
                                                    <hr>
                                                    <div>
                                                        <h5>978-123-4567</h3><br>
                                                            <div class="">
                                                                <h2>HOURS OF OPERATION</h2>
                                                                <hr>
                                                                <div>
                                                                    <h5>Monday - Thursday: 10AM to 7PM</h5><br>
                                                                    <div>
                                                                        <h5>Friday - Saturday: 10AM to 9PM</h5><br>
                                                                        <div>
                                                                            <h5>Sunday: Closed</h5><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
    </section>

    <div class="mobile-check">
        <button class="check-btn">
            <span class="check-item"><i class="icofont-basket"></i><span>0 items</span></span><span class="check-price">$00.00</span>
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
