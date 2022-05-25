<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'rebnd';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
//Template header

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device=width, initial-scale=1.0">
            <title$title</title>
            <link rel="stylesheet" href="CSS/REBND_CSS.css">
            <script src="cart.js"></script>
        </head>
        <div class="header">
            <div class="container">
                <div class="navBar">
                    <div class="logo">
                        <h1><a href="Index.php" style="color: #000">REBND</a></h1>
                    </div>
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="index.php?page=products">Products</a></li>
                            <li><a href="index.php?page=contact">Contact</a></li>
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
            </div>
        </div>
        
    EOT;

}

//Template footer
function template_footer() {
    echo <<<EOT
    <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device=width, initial-scale=1.0">
            <link rel="stylesheet" href="css/REBND_CSS.css">
            <script src="cart.js"></script>
        </head>

        <div class="container">
            <div class="footer">
                <div class="footerContainer">
                    <div class="footerRow">
                        <div class="footer-col-shop">
                            <h3>Shop</h3>
                            <ul>
                                <li><a href="REBND_ProductPage.php">All Brands</a></li>
                                <li><a href="Tops.php">Tops</a></li>
                                <li><a href="Bottoms.php">Bottoms</a></li>
                                <li><a href="Footwear.php">Footwear</a></li>
                                <li><a href="Accessories.php">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="footer-col-social">
                            <h3>Social</h3>
                            <ul>
                                <li><a href="">Instagram</a></li>
                                <li><a href="">Facebook</a></li>
                                <li><a href="">Twitter</a></li>
                                <li> </li>
                                <li> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-REBND">
                        <h><a href="REBND_Home.php" style="color:white;">REBND</a></h>
                    </div>
                    <hr>
                    <p class="footer-copyright">&copy 2020 REBND</p>
                </div>
            </div>
        </div>
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
    EOT;
    }
?>