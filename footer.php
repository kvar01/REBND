<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>REBND_Footer</title>
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
                <h><a href="Index.php" style="color:white;">REBND</a></h>
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

