<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>REBND - Home</title>
    <link rel="stylesheet" href="CSS/REBND_CSS.css">
    <script src="cart.js"></script>
</head>

<div class="header">
    <div class="container">
        <div class="navBar">
            <div class="logo">
                <h1><a href="REBND_Home.php" style="color: #000">REBND</a></h1>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="REBND_ProductPage.php">Products</a></li>
                    <li><a href="REBND_ContactPage.php">Contact</a></li>
                    <?php
                        if (isset($_SESSION["useremail"])){
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                        }
                        else if (isset($_SESSION["adminemail"])){
                            echo "<li><a href='Manage_Product.php'>Manage</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php'>Account</a></li>";
                        }
                    ?>
                    <li><a href="">Search</a></li>
                </ul>
            </nav>
            <div class="cart">
                <a href="cart.php">
                    <img src="Images/Icons/Cart.png" width="30px" height="30px"></a>
            </div>
            <div class="menu">
                <img src="Images/Icons/Menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
        <div class="row">
            <img src="Images/Store.png">
        </div>
    </div>
</div>

</html>
