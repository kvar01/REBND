<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:index.php");
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
    <meta charset="UTF-8" />
    <?php
  include('../ClientHeaderTitle.php');
  ?>
    <link rel="icon" href="../images/log2.png" />
    <link rel="stylesheet" href="../fonts/icofont/icofont.min.css" />
    <link rel="stylesheet" href="../fonts/flaticon/grocery/flaticon.css" />
    <link rel="stylesheet" href="../css/vendor/slick.css" />
    <link rel="stylesheet" href="../css/vendor/bootstrap.css" />
    <link rel="stylesheet" href="../css/custom/main.css" />
    <link rel="stylesheet" href="../css/custom/index.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script language=javascript></script>
    <script>
        function PassStrength(p) {
            CheckPassword(p);
        }
        function CheckPassword(inputtxt) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (inputtxt.value.match(passw)) {
                alert('Correct, try another...')
                return true;
            } else {
                alert('Wrong...!')
                return false;
            }
        }
     
    </script>
</head>

<body style="background-color:white; height: 100vh">
    <header class="header-part" style="background-color:white; height: 10vh;">
        <div class="container">
            <div class="header-left" style="margin-left:-350px;">
                <div class="header-icon-group" style="background-color: white;">
                    <button class="icon-nav"><i class="icofont-align-left"></i></button>
                    <a class="header-logo" href="../index.php">
                        <img src="../images/log2.png" alt="logo" style="" />
                    </a>
                    <button class="icon-cross"><i class="icofont-close"></i></button>
                </div>
            </div>
            <div class="header-right" style="background-color:white; text-align:center; margin-left:300px">
                <div class="header-icon-group" style="margin-right:0px;">
                    <a href="../index.php" style="color:black">Home</a>
                </div>
                <div class="header-icon-group" style="overflow: hidden; float: left;">
                    <a href="../product.php" style="color:black">Products</a>
                    <div class="dropdown-content">
                        <a href="../tops.php">Tops</a>
                        <a href="../bottoms.php">Bottoms</a>
                        <a href="../footwear.php">Footwear</a>
                        <a href="../accessories.php">Accessories</a>
                    </div>
                </div>
                <div class="header-icon-group" style="margin-right:0px ;">
                    <a href="../Contact.php" style="color:black">Contact</a>
                </div>
               <div class="header-icon-group" style="margin-right:0px ;">
                    <a href="login.php" style="color:black">Account</a>
                </div>
                            
                </div>
        </div>
    </header>
    <section class="promo-part" style="background-color:white; text-align:center; align-items: center; justify-content:center;">
        <div class="container" style="text-align:center; font-size:25px; font-weight:bold; width:100vw; height:90vh; display:flex;align-items: center; justify-content: center; flex-direction: column;">
            <div class="row" style="width:100%; height:100%; align-items: center; justify-content:center;">
                <div class="col-4"></div>
                <div class="col-4">
                    <table cellpadding="50" cellspacing="100" style="width:100%">
                        <form action="IsLogin.php" method="POST" id="loginForm" novalidate>
                            <tr>
                                <td>
                                    <h1 style="margin-bottom:20px">Login</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="user" placeholder="Email" style="border-radius:2px;border:solid 1px; padding-left:5px; padding-bottom:7px; box-shadow:3px 5px 1px 1px gray; font-size:16px; width:100%; margin-top:10px; margin-bottom:10px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" id="pass" name="pass" placeholder="Password" style="border-radius:2px;border:solid 1px; padding-left:5px; padding-bottom:7px; box-shadow:3px 5px 1px 1px gray; font-size:16px; width:100%; margin-top:10px; margin-bottom:10px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Login" style="background-color:black; color:white; padding-left:15px; padding-right:15px; border-radius:20px; font-size:15px; margin-top:10px; margin-bottom:10px">
                                </td>
                            </tr>
                        </form>
                        <tr>
                            <td>
                                <a href="register.php"><button style="background-color:black; color:white; padding-left:15px; padding-right:15px; border-radius:20px; font-size:15px; margin-top:10px; margin-bottom:10px">Create Account<button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="admin.php" method="post">
                                    <input type="submit" value="Admin Login" title="admin" style="background-color:black; color:white; padding-left:15px; padding-right:15px; border-radius:20px; font-size:15px; margin-top:10px; margin-bottom:10px">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span id="msg">
                 <?php
                  if (isset($_GET['q'])) {
                    echo $_GET['q'];
                  }
                  ?>
                               </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4"></div>
                <?php
        include('webfooter.php');
        ?>
            </div>
        </div>

    </section>
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
